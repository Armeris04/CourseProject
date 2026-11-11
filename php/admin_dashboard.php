<?php 
    include("connect.php");
    session_start();
?>

<!DOCTYPE html>
<html lang="lt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administratoriaus skydelis</title>
    <link rel="stylesheet" href="../style/admin_style.css">
    <link rel = "stylesheet" href="../style/common_elements.css">
</head>
<body>
    
<div class="main-container">
    <p style = "font-size:50px; font-weight:bold">
        Sveiki administratoriau,
    <?php
            if(isset($_SESSION['naudotojo_id'])) {
            $id = $_SESSION['naudotojo_id'];

            $stmt = $conn->prepare(
            "SELECT vardas, pavarde FROM naudotojai WHERE naudotojo_id = ?"
            );
            $stmt->bind_param("i", $id);
            $stmt->execute();

            $result = $stmt->get_result();
            $row = $result->fetch_assoc();

            if ($row) {
                echo htmlspecialchars($row['vardas'] . ' ' . $row['pavarde']);
            }
        }
    ?>
    </p>
    <div class="dashboard-links">
    
    <a href="view_all_tickets.php" class="btn">Visi bilietai</a>
    <a href="view_completed_tickets.php" class="btn">Užbaigti bilietai</a>
    <a href="logout.php" class="btn">Atsijungti</a>
</div>
</div>


</body>
</html>