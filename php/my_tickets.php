<?php
session_start();
include ('connect.php')
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel = "stylesheet" href="../style/common_elements.css">
</head>
<body>
    <div class="main-container">
    <h1> Bilietai</h1>
    <?php
    if (!isset($_SESSION['user_id']))
    { 
        header("Location: homepage.php");
        exit();
    }

    $user_id =(int) $_SESSION['user_id'];

    $sql = "SELECT issue, location
        FROM user_tickets
        WHERE user_id = '$user_id'";
    $result = $conn->query($sql);

    if ($result->num_rows == 0)
    {
        echo "<p style='text-align: center; font-weight: bold; font-size: 18px;'>Bilietų nėra</p>";
    }
    while ($ticket = $result->fetch_assoc())
        {
            echo "<div class='ticket-container'>";
            echo "<p>Issue: " . htmlspecialchars($ticket['issue']). "</p>";
            echo "<p>Location: " . htmlspecialchars($ticket['location']). "</p>";
            echo "</div>";
        }

    ?>

    
    
    <a href="submit_tickets_form.php" class="btn"> Submit new ticket </a>
    <a href="homepage.php" class="btn"> Back </a>
    <a href="logout.php" class="btn"> Logout </a>

</div>
</body>
</html>