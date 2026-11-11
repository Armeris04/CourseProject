 <?php
    session_start();
    include('connect.php');
    ?>
<!DOCTYPE html>
<html lang="lt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peržiūrėti užbaigtus bilietus</title>
    <link rel = "stylesheet" href="../style/common_elements.css">
    <link rel="stylesheet" href="../style/admin_style.css">
</head>
<body>
    <div class="main-container">
        <h1>Užbaigti bilietai</h1>
        <?php
    include('connect.php');

   $ticketsQuery = "
    SELECT
        ct.bilieto_id,
        ct.naudotojo_id,
        u.vardas,
        u.pavarde,
        ct.problema,
        l.pastatas,
        l.aukstas,
        l.kabinetas
    FROM uzbaigti_bilietai AS ct
    JOIN naudotojai AS u ON ct.naudotojo_id = u.naudotojo_id
    JOIN vietos AS l ON ct.vietos_id = l.vietos_id
";

$ticketsResult = $conn->prepare($ticketsQuery);
$ticketsResult->execute();
$tickets = $ticketsResult->get_result();
    $ticketsResult->execute();
    $tickets = $ticketsResult->get_result();

    

    if ($tickets->num_rows == 0) {
        echo "<p style='text-align: center;'>Užbaigtų bilietų nėra.</p>";
    }
    while ($ticket = $tickets->fetch_assoc()) {
        echo "<div class='ticket-container'>";
        echo "<p><strong>Bilieto ID:</strong> " . htmlspecialchars($ticket['bilieto_id']) . "</p>";
        echo "<p><strong>Naudotojo ID:</strong> " . htmlspecialchars($ticket['naudotojo_id']) . "</p>";
        echo "<p><strong>Vardas:</strong> " . htmlspecialchars($ticket['vardas']) . "</p>";
        echo "<p><strong>Pavardė:</strong> " . htmlspecialchars($ticket['pavarde']) . "</p>";
        echo "<p><strong>Problema:</strong> " . htmlspecialchars($ticket['problema']) . "</p>";
        echo "<p><strong>Vieta:</strong> " . htmlspecialchars($ticket['pastatas']) . " pastatas, " . htmlspecialchars($ticket['aukstas']) . " aukštas, " . htmlspecialchars($ticket['kabinetas']) . " kabinetas</p>";
        echo "</div>";
    }


?>
        <a href="admin_dashboard.php" class="btn">Grįžti į administratoriaus skydelį</a>
        <a href="logout.php" class="btn">Atsijungti</a>
    </div>
