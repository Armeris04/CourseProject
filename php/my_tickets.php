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
</head>
<body>
    <h1> PAGE</h1>
    <a href="logout.php"> Logout </a>
    <a href="homepage.php"> Back </a>


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


    // $user_tickets = $result->fetch_assoc();
    while ($ticket = $result->fetch_assoc())
        {
            echo "<p>Issue: " . htmlspecialchars($ticket['issue']). "</p>";
            echo "<p>Location: " . htmlspecialchars($ticket['location']). "</p>";
        }

    ?>

    
</body>
</html>