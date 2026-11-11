        <?php
        include 'connect.php'; 
        if (isset($_POST['done-btn'])) {
        $ticketId = $_POST['bilieto_id'];
        $insertQuery = "INSERT INTO uzbaigti_bilietai (problema, vietos_id, naudotojo_id, bilieto_id)
                        SELECT problema, vietos_id, naudotojo_id, bilieto_id FROM bilietai WHERE bilieto_id = ?";
        $insertStmt = $conn->prepare($insertQuery);
        $insertStmt->bind_param("i", $ticketId);
        $insertStmt->execute();
        $deleteQuery = "DELETE FROM bilietai WHERE bilieto_id = ?";
        $deleteStmt = $conn->prepare($deleteQuery);
        $deleteStmt->bind_param("i", $ticketId);
        $deleteStmt->execute();
        header("Location: view_all_tickets.php");
        exit();
    }
    ?>