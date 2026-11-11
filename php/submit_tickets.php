
<?php
session_start();
include("connect.php");

if (!isset($_SESSION['naudotojo_id'])) {
    header('Location: index.php');
    exit();
}

$user_id = $_SESSION['naudotojo_id'];


$sql = "SELECT vardas, pavarde FROM naudotojai WHERE naudotojo_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();

$result = $stmt->get_result();
$user = $result->fetch_assoc();

if (!$user) {
    exit("Naudotojas nerastas.");
}

$firstName = $user['vardas'];
$lastName = $user['pavarde'];

$building = $_POST['pastatas'];
$floor = $_POST['aukstas'];
$room = $_POST['kabinetas'];
$issue = $_POST['problema'];

// 1. Check whether location already exists
$locationQuery = "SELECT vietos_id FROM vietos
                  WHERE pastatas = ? AND aukstas = ? AND kabinetas = ?";

$stmt = $conn->prepare($locationQuery);
$stmt->bind_param("sss", $building, $floor, $room);
$stmt->execute();

$result = $stmt->get_result();

if ($result->num_rows > 0) {

    // 2. Location already exists, retrieve its ID
    $location = $result->fetch_assoc();
    $location_id = $location['vietos_id'];

} else {

    $insertLocation = "INSERT INTO vietos (pastatas, aukstas, kabinetas)
                       VALUES (?, ?, ?)";

    $stmt = $conn->prepare($insertLocation);
    $stmt->bind_param("sss", $building, $floor, $room);
    $stmt->execute();

    // 4. Retrieve newly generated ID
    $location_id = $conn->insert_id;
}

$insertTicket = "INSERT INTO bilietai (naudotojo_id, problema, vietos_id)
                 VALUES (?, ?, ?)";

$stmt = $conn->prepare($insertTicket);
$stmt->bind_param("isi", $user_id, $issue, $location_id);
if ($stmt->execute()) {
    header("Location: alert.php");
    exit();
} else {
    echo "Klaida: " . $stmt->error;
}
?>
