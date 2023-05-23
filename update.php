<?php
session_start();

include("config.php");

// Eğer gerekli parametre geçilmediyse veya geçerli bir ürün kimliği değilse, hata mesajı göster
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    echo "Geçersiz ürün kimliği.";
    exit();
}

// Ürün kimliğini al
$id = $_GET['id'];

// Ürünü veritabanından seç
$sql = "SELECT * FROM products WHERE id = $id";
$result = $conn->query($sql);

// Ürün bulunamadıysa, hata mesajı göster
if ($result->num_rows == 0) {
    echo "Ürün bulunamadı.";
    exit();
}

// Ürün bilgilerini al
$row = $result->fetch_assoc();
$name = $row['name'];
$price = $row['price'];
$description = $row['description'];
$miktari = $row['miktari'];

// Ürün düzenleme formu gönderildiyse, güncelleme işlemini yap
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Form verilerini al
    $newName = $_POST['name'];
    $newPrice = $_POST['price'];
    $newDescription = $_POST['description'];
    $newMiktari = $_POST['miktari'];

    // Güncelleme sorgusunu hazırla
    $updateSql = "UPDATE products SET name = '$newName', price = '$newPrice', description = '$newDescription', miktari = '$newMiktari' WHERE id = $id";

    // Güncelleme işlemini gerçekleştir
    if ($conn->query($updateSql) === TRUE) {
        // Başarılı bir şekilde güncellendi, yönlendirme yap
        header("Location: orders.php");
        exit();
    } else {
        // Güncelleme işlemi başarısız oldu, hata mesajı göster
        echo "Güncelleme işlemi başarısız oldu: " . $conn->error;
    }
}
