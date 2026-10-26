<?php
session_start();
    include ("connect.php");

    if (isset($_POST['signUp'])) {
        $firstName = $_POST['name'];
        $lastName = $_POST['surname'];
        $email = $_POST['email'];
        $password = $_POST['pass'];
        $password = md5($password);

        $checkEmail = "Select * From users where email = '$email'";
        $result = $conn->query($checkEmail);

        if ($result->num_rows>0)
            echo "Email Adress Already Exists!";
        else {
            $insertQuery = "INSERT INTO users(firstName, lastName, email, password)
                            VALUES ('$firstName', '$lastName', '$email', '$password')";
            if ($conn->query($insertQuery)==TRUE)
                header("location: index.php");
            else echo "Error:".$conn->error;
        }
    }

    // if (isset($_POST['signIn']))
    //         {
    //             $email = $_POST['email'];
    //             $password = $_POST['pass'];
    //             $password = md5($password);

    //             $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
    //             $result = $conn->query($sql);

    //             if ($result->num_rows>0)
    //                 {
    //                     $row = $result->fetch_assoc();
    //                     $_SESSION['email']=$row['email'];

    //                     header("location: homepage.php");
    //                     exit();
    //                 }

    //                 else {
    //                     echo "Not Found, Incorrect Email or Password";
    //                 }
    //         }
?>