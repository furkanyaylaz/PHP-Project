<?php
require_once "config.php";

$email = $_POST['email'];
$name = $_POST['name'];
$surname = $_POST['surname'];
$address = $_POST['address'];
$phone = $_POST['phone'];
$username = $_POST['username'];
$password = $_POST['password'];


if ($conn->connect_error) {
    die("Veritabanı bağlantısı başarısız: " . $conn->connect_error);
}

// Kullanıcı adının veritabanında kullanılıp kullanılmadığını kontrol et
$sql = "SELECT * FROM users WHERE username = '$username'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "Bu kullanıcı adı zaten kullanılıyor.";
    exit;
}

// Kullanıcı bilgilerini veritabanına ekle
$sql = "INSERT INTO users (email, name, surname, address, phone, username, password)
        VALUES ('$email', '$name', '$surname', '$address', '$phone', '$username', '$password')";

if ($conn->query($sql) === TRUE) {
    echo "Üyelik oluşturuldu";

    // Kayıt başarılıysa ana sayfaya yönlendir
    header("Location: index.php");
    exit;
} else {
    echo "Hata: " . $sql . "<br>" . $conn->error;
}


$conn->close();
?>
