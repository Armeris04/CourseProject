
<?php 
    session_start();
    include ("connect.php");

    if (!isset($_SESSION['email']))
        {
            header('Location: index.php');
            exit();

        }

        $email = $_SESSION['email'];

        $sql = "SELECT firstName, lastName FROM users WHERE email='$email'";
        $result = $conn->query($sql);

        $user = $result->fetch_assoc();

        $firstName = $user['firstName'];
        $lastName = $user['lastName'];

        $issue = $_POST['issue'];
        $location = $_POST['location'];


        $insertQuery = "INSERT INTO user_tickets(firstName, lastName, issue, location)
                        VALUES ('$firstName', '$lastName', '$issue', '$location')";
        if ($conn->query($insertQuery)==TRUE)
            
            header("location: alert.php");
        else echo "Error: ".$conn->error;

?>
