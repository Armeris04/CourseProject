<?php
session_start();
include ("connect.php");
?>

<!DOCTYPE html>
<html lang="lt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagrindinis puslapis</title>
    <link rel="stylesheet" href="../style/common_elements.css">
    <link rel="stylesheet" href="../style/style_homepage.css">
</head>
<body>
    <div class="main-container">
        <p style = "font-size:50px; font-weight:bold">
            Sveiki, <?php
            if (isset($_SESSION['naudotojo_id'])) {
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
    $stmt->close();
            ?>
            :)
        </p>
        
        <div class="user-dashboard-links">
            <a href="my_tickets.php" class="btn">Mano bilietai</a>
            <a href="submit_tickets_form.php" class="btn">Pateikti naują bilietą</a>
            <a href="logout.php" class="btn">Atsijungti</a>
        </div>
    </div>

</body>
</html>