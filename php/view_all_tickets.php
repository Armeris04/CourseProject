 <?php
    session_start();
    include('connect.php');
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View All Tickets</title>
    <link rel = "stylesheet" href="../style/common_elements.css">
    <link rel="stylesheet" href="../style/admin_style.css">
</head>
<body>
    <div class="main-container">
        <h1>All Tickets</h1>
        <?php
    include('connect.php');

    $ticketsQuery = "SELECT * FROM user_tickets";
    $ticketsResult = $conn->prepare($ticketsQuery);
    $ticketsResult->execute();
    $tickets = $ticketsResult->get_result();

    

    if ($tickets->num_rows == 0) {
        echo "<p style='text-align: center;'>No tickets found.</p>";
    }
    while ($ticket = $tickets->fetch_assoc()) {
        echo "<div class='ticket-container'>";
        echo "<p><strong>Bilieto ID:</strong> " . htmlspecialchars($ticket['ticket_id']) . "</p>";
        echo "<p><strong>Naudotojo ID:</strong> " . htmlspecialchars($ticket['user_id']) . "</p>";
        echo "<p><strong>Vardas:</strong> " . htmlspecialchars($ticket['firstName']) . "</p>";
        echo "<p><strong>Pavardė:</strong> " . htmlspecialchars($ticket['lastName']) . "</p>";
        echo "<p><strong>Problema:</strong> " . htmlspecialchars($ticket['issue']) . "</p>";
        echo "<p><strong>Vieta:</strong> " . htmlspecialchars($ticket['location']) . "</p>";

        echo "<form method='POST' action='delete_ticket.php' onsubmit='return confirm(\"Are you sure you want to delete this ticket?\");'>";
        echo "<input type='hidden' name='ticket_id' value='" . htmlspecialchars($ticket['ticket_id']) . "'>";
        echo "<button type='submit' name='done-btn' class='done-btn'>Delete Ticket</button>";
        echo "</form>";
        echo "</div>";
    }


?>
        <a href="admin_dashboard.php" class="btn"> Back to Dashboard </a>
        <a href="logout.php" class="btn"> Logout </a>
    </div>

