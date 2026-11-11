 <?php
    session_start();
    include('connect.php');
    ?>
<!DOCTYPE html>
<html lang="lt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visi bilietai</title>
    <link rel = "stylesheet" href="../style/common_elements.css">
    <link rel="stylesheet" href="../style/admin_style.css">
</head>
<body>
    <div class="main-container">
        <h1>Visi bilietai</h1>
        <?php
    include('connect.php');

    $ticketsQuery = "SELECT bilietai.bilieto_id, bilietai.naudotojo_id, naudotojai.vardas, naudotojai.pavarde, bilietai.problema, vietos.pastatas, vietos.aukstas, vietos.kabinetas FROM naudotojai, bilietai, vietos WHERE naudotojai.naudotojo_id = bilietai.naudotojo_id AND bilietai.vietos_id = vietos.vietos_id";
    $ticketsResult = $conn->prepare($ticketsQuery);
    $ticketsResult->execute();
    $tickets = $ticketsResult->get_result();

    

    if ($tickets->num_rows == 0) {
        echo "<p style='text-align: center;'>Bilietų nėra.</p>";
    }
    while ($ticket = $tickets->fetch_assoc()) {
        echo "<div class='ticket-container'>";
        echo "<p><strong>Bilieto ID:</strong> " . htmlspecialchars($ticket['bilieto_id']) . "</p>";
        echo "<p><strong>Naudotojo ID:</strong> " . htmlspecialchars($ticket['naudotojo_id']) . "</p>";
        echo "<p><strong>Vardas:</strong> " . htmlspecialchars($ticket['vardas']) . "</p>";
        echo "<p><strong>Pavardė:</strong> " . htmlspecialchars($ticket['pavarde']) . "</p>";
        echo "<p><strong>Problema:</strong> " . htmlspecialchars($ticket['problema']) . "</p>";
        echo "<p><strong>Vieta:</strong> " . htmlspecialchars($ticket['pastatas']) . " pastatas, " . htmlspecialchars($ticket['aukstas']) . " aukštas, " . htmlspecialchars($ticket['kabinetas']) . " kabinetas</p>";

        echo "<form method='POST' action='delete_ticket.php' onsubmit='return confirm(\"Ar tikrai norite pažymėti šį bilietą kaip užbaigtą?\");'>";
        echo "<input type='hidden' name='bilieto_id' value='" . htmlspecialchars($ticket['bilieto_id']) . "'>";
        echo "<button type='submit' name='done-btn' class='done-btn'>Pažymėti kaip užbaigtą</button>";
        echo "</form>";
        echo "</div>";
    }


?>
        <a href="admin_dashboard.php" class="btn">Grįžti į administratoriaus skydelį</a>
        <a href="logout.php" class="btn">Atsijungti</a>
    </div>
