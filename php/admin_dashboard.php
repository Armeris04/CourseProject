<?php 
    include("connect.php");
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboasrd</title>
    <link rel="stylesheet" href="../style/admin_style.css">
    <link rel = "stylesheet" href="../style/common_elements.css">
</head>
<body>
    
<div class="main-container">
    <p style = "font-size:50px; font-weight:bold">
        Hello Admin,
    <?php
            if(isset($_SESSION['id'])) {
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
    ?>
    </p>
    <div class="dashboard-links">
    
    <a href="view_all_tickets.php" class="btn"> View All Tickets </a>
    <a href="logout.php" class="btn"> Logout </a>
</div>
</div>


</body>
</html>