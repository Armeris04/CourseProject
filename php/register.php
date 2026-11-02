<?php
session_start();
    include ("connect.php");

    if (isset($_POST['signUp'])) {
        $firstName = $_POST['name'];
        $lastName = $_POST['surname'];
        $email = $_POST['email'];
        $password = password_hash($_POST['pass'], PASSWORD_DEFAULT);

        $checkEmail = "SELECT * FROM users WHERE email = ?";
        $stmt = $conn->prepare($checkEmail);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        

        if ($result->num_rows>0)
            echo "Email Adress Already Exists!";
        else {
            $insertQuery = "INSERT INTO users (firstName, lastName, email, password)
                VALUES (?, ?, ?, ?)";

$stmt = $conn->prepare($insertQuery);
$stmt->bind_param("ssss", $firstName, $lastName, $email, $password);

if ($stmt->execute()) {
        header("Location: index.php");
        exit();
    } else {
    echo "Error: " . $stmt->error;
        }
}
}
?>