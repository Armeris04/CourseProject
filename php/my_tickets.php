<?php
session_start();
include ('connect.php')
?>
<!DOCTYPE html>
<html lang="lt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mano bilietai</title>
    <link rel = "stylesheet" href="../style/common_elements.css">
</head>
<body>
    <div class="main-container">
    <h1>Mano bilietai</h1>
    <?php
    if (!isset($_SESSION['naudotojo_id']))
    { 
        header("Location: homepage.php");
        exit();
    }

    $user_id =(int) $_SESSION['naudotojo_id'];

   
$sql = "SELECT
    b.problema,
    b.vietos_id,
    l.pastatas,
    l.aukstas,
    l.kabinetas
    FROM bilietai AS b
    JOIN vietos AS l ON b.vietos_id = l.vietos_id
    WHERE b.naudotojo_id = ?";

$stmt = $conn->prepare($sql);

$stmt->bind_param("i", $user_id);

if (!$stmt->execute()) {
    die("Query error: " . $stmt->error);
}

$result = $stmt->get_result();

if ($result->num_rows == 0) {
    echo "<p style='text-align: center; font-weight: bold; font-size: 18px;'>Bilietų nėra</p>";
}

while ($ticket = $result->fetch_assoc()) {
    echo "<div class='ticket-container'>";
    echo "<p>Problema: " . htmlspecialchars($ticket['problema']) . "</p>";
    echo "<p>Vieta: " . htmlspecialchars($ticket['pastatas']) . " pastatas, "
        . htmlspecialchars($ticket['aukstas']) . " aukštas, "
        . htmlspecialchars($ticket['kabinetas']) . " kabinetas</p>";
    echo "</div>";
}

$stmt->close();


    ?>

    
    
    <a href="submit_tickets_form.php" class="btn">Pateikti naują bilietą</a>
    <a href="homepage.php" class="btn">Grįžti</a>
    <a href="logout.php" class="btn">Atsijungti</a>

</div>
</body>
</html>