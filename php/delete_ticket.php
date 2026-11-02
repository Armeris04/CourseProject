        <?php
        include 'connect.php'; 
        if (isset($_POST['done-btn'])) {
        $ticketId = $_POST['ticket_id'];
        $deleteQuery = "DELETE FROM user_tickets WHERE ticket_id = ?";
        $deleteStmt = $conn->prepare($deleteQuery);
        $deleteStmt->bind_param("i", $ticketId);
        $deleteStmt->execute();
        header("Location: view_all_tickets.php");
        exit();
    }
    ?>