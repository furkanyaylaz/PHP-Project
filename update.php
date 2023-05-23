<?php
session_start();

include("config.php");


if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    echo "Geçersiz ürün kimliği.";
    exit();
}


$id = $_GET['id'];

// Ürünü veritabanından seçme
$sql = "SELECT * FROM products WHERE id = $id";
$result = $conn->query($sql);


if ($result->num_rows == 0) {
    echo "Ürün bulunamadı.";
    exit();
}

// Ürün bilgilerini alma
$row = $result->fetch_assoc();
$name = $row['name'];
$price = $row['price'];
$description = $row['description'];
$miktari = $row['miktari'];

// Güncelleme işlemi
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Form verilerini alma
    $newName = $_POST['name'];
    $newPrice = $_POST['price'];
    $newDescription = $_POST['description'];
    $newMiktari = $_POST['miktari'];

 
    $updateSql = "UPDATE products SET name = '$newName', price = '$newPrice', description = '$newDescription', miktari = '$newMiktari' WHERE id = $id";

    
    if ($conn->query($updateSql) === TRUE) {
        
        header("Location: orders.php");
        exit();
    } else {
       
        echo "Güncelleme işlemi başarısız oldu: " . $conn->error;
    }
}
