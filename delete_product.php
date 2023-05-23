<?php
require_once "config.php";


if (isset($_GET['id'])) {
    $orderID = $_GET['id'];

    $sql = "DELETE FROM products WHERE id='$orderID'";

    if ($conn->query($sql) === true) {
        echo "Ürün silme işlemi başarılı";
        header("Location: orders.php");
        exit;
    } else {
        echo "Ürün silinirken hata oluştu: " . $conn->error;
    }
}

$conn->close();
?>
