<?php
// Veritabanı bağlantısı
$servername = "sql112.epizy.com";
$username = "epiz_34270908";
$password = "Jtx7DjtRhh1A2";
$dbname = "epiz_34270908_manav_siparis_sistemi";

$conn = mysqli_connect($servername, $username, $password, $dbname);
mysqli_set_charset($conn, "utf8mb4");

if (!$conn) {
    echo "MySQL sunucu ile baglanti kurulamadi! </br>";
    echo "HATA: " . mysqli_connect_error();
    exit;
}
