<?php
include("config.php");
session_start();

$username = $_POST['username'];
$password = $_POST['password'];

// Kullanıcı adı ve şifreyi veritabanında kontrol etme
$sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    $_SESSION['loggedin'] = true;
    $_SESSION['username'] = $username;
    header("Location: orders.php");
} else {
    echo "Hatalı kullanıcı adı veya şifre!";
}

$conn->close();
?>
