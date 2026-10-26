<?php
include ("connect.php");
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
</head>
<body>
    <div style = "text-align: center; padding: 15%">
        <p style = "font-size:50px; font-weight:bold">
            Hello <?php
            if(isset($_SESSION['email'])){
                $email = $_SESSION['email'];
                $query = mysqli_query($conn, "SELECT users. * FROM `users` WHERE users.email='$email'");
                while ($row=mysqli_fetch_array($query))
                    {
                        echo $row['firstName'].' '.$row['lastName'];
                    }
            }
            ?>
            :)
        </p>
        
        <div>
            <a href="my_tickets.php">
                <button>My tickets</button>
            </a>

            <a href="submit_tickets_form.php">
                <button >Submit new ticket</button>
            </a>
    
        <a href="logout.php">Logout</a>

    </div>
</body>
</html>