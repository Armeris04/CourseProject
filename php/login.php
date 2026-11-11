
<?php
session_start();
include('connect.php');

if (isset($_POST['signIn'])) {
    $email = $_POST['el_pastas'];
    $password = $_POST['slaptazodis'];

    $sql = "SELECT naudotojo_id, el_pastas, slaptazodis, vaidmuo FROM naudotojai WHERE el_pastas = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        
        if (password_verify($password, $row['slaptazodis'])) {

            $_SESSION['naudotojo_id'] = $row['naudotojo_id'];
            $_SESSION['vaidmuo'] = $row['vaidmuo'];

            if ($row['vaidmuo'] == 'admin') {
                header("Location: admin_dashboard.php");
                exit();
            }
            header("Location: homepage.php");
            exit();

        } else {
            echo "Neteisingas el. pašto adresas arba slaptažodis.";
        }
    } else {
        echo "Neteisingas el. pašto adresas arba slaptažodis.";
    }

    $stmt->close();
}
?>
