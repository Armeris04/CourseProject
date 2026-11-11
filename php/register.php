<?php
session_start();
    include ("connect.php");

    if (isset($_POST['signUp'])) {
        $firstName = $_POST['vardas'];
        $lastName = $_POST['pavarde'];
        $email = $_POST['el_pastas'];
        $password = password_hash($_POST['slaptazodis'], PASSWORD_DEFAULT);

        $checkEmail = "SELECT * FROM naudotojai WHERE el_pastas = ?";
        $stmt = $conn->prepare($checkEmail);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        

        if ($result->num_rows>0)
            echo "Šis el. pašto adresas jau užregistruotas.";
        else {
            $insertQuery = "INSERT INTO naudotojai (vardas, pavarde, el_pastas, slaptazodis)
                VALUES (?, ?, ?, ?)";

$stmt = $conn->prepare($insertQuery);
$stmt->bind_param("ssss", $firstName, $lastName, $email, $password);

if ($stmt->execute()) {
        header("Location: index.php");
        exit();
    } else {
    echo "Klaida: " . $stmt->error;
        }
}
}
?>