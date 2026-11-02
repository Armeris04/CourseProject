<?php
session_start();
include ("connect.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link rel="stylesheet" href="../style/common_elements.css">
    <link rel="stylesheet" href="../style/style_homepage.css">
</head>
<body>
    <div class="main-container">
        <p style = "font-size:50px; font-weight:bold">
            Hello <?php
            if (isset($_SESSION['id'])) {
            $id = $_SESSION['id'];

            $stmt = $conn->prepare(
            "SELECT firstName, lastName FROM users WHERE id = ?"
            );
            $stmt->bind_param("i", $id);
            $stmt->execute();

            $result = $stmt->get_result();
            $row = $result->fetch_assoc();

            if ($row) {
            echo htmlspecialchars($row['firstName'] . ' ' . $row['lastName']);
        }
    }
    $stmt->close();
            ?>
            :)
        </p>
        
        <div class="user-dashboard-links">
            <a href="my_tickets.php" class="btn">My tickets</a>
            <a href="submit_tickets_form.php" class="btn">Submit new ticket</a>
            <a href="logout.php" class="btn">Logout</a>
        </div>
    </div>

</body>
</html>