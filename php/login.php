
<?php
session_start();
include('connect.php');

if (isset($_POST['signIn'])) {
    $email = $_POST['email'];
    $password = $_POST['pass'];

    $sql = "SELECT id, email, password, role FROM users WHERE email = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        
        if (password_verify($password, $row['password'])) {

            $_SESSION['id'] = $row['id']; 
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['role'] = $row['role'];

            if ($row['role'] == 'admin') {
                header("Location: admin_dashboard.php");
                exit();
            }
            header("Location: homepage.php");
            exit();

        } else {
            echo "Incorrect Email or Password";
        }
    } else {
        echo "Incorrect Email or Password";
    }

    $stmt->close();
}
?>
