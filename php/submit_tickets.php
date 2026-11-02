
<?php
session_start();
include("connect.php");

if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit();
}

$user_id = $_SESSION['user_id'];

// Get the user's name
$sql = "SELECT firstName, lastName FROM users WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();

$result = $stmt->get_result();
$user = $result->fetch_assoc();

if (!$user) {
    exit("User not found.");
}

$firstName = $user['firstName'];
$lastName = $user['lastName'];

$issue = $_POST['issue'];
$location = $_POST['location'];

$insertQuery = "INSERT INTO user_tickets
                (user_id, firstName, lastName, issue, location)
                VALUES (?, ?, ?, ?, ?)";

$stmt = $conn->prepare($insertQuery);
$stmt->bind_param(
    "issss",
    $user_id,
    $firstName,
    $lastName,
    $issue,
    $location
);

if ($stmt->execute()) {
    header("Location: alert.php");
    exit();
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
