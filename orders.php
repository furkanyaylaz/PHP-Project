<?php
session_start();

include("config.php");

$sql = "SELECT * FROM products";
$sql2 = "SELECT * FROM users";
$result = $conn->query($sql);
$result2 = $conn->query($sql2);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Manav Siparişleri</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <meta charset="UTF-8">
</head>
<body>
    <div class="container">
        <h1>Manav Siparişleri</h1>

        <table class="table">
            <thead>
                <tr>
                    <th>Sipariş No</th>
                    <th>Müşteri Adı</th>
                    <th>Ürün Adı</th>
                    <th>Fiyatı</th>
                    <th>Türü</th>
                    <th>Miktarı</th>
                    <th>Tutar</th>
                    <th>İşlemler</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $grandTotal = 0; // Initialize the grand total variable

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";

                        if ($row2 = $result2->fetch_assoc()) {
                            echo "<td>" . $row2['name'] . "&nbsp;" . $row2['surname'] . "</td>";
                        } else {
                            echo "<td>Müşteri bulunamadı.</td>";
                        }

                        echo "<td>" . $row['name'] . "</td>";
                        echo "<td>" . $row['price'] . "</td>";
                        echo "<td>" . $row['description'] . "</td>";
                        echo "<td>" . $row['miktari'] . "</td>";

                        // Toplam tutarı hesapla
                        $totalPrice = $row['price'] * $row['miktari'];
                        echo "<td>" . $totalPrice . " ₺" . "</td>";

                        $grandTotal += $totalPrice; // Update the grand total

                        echo "<td>
                                <a href='edit_product.php?id=" . $row['id'] . "' class='btn btn-primary'>Düzenle</a>
                                <a href='delete_product.php?id=" . $row['id'] . "' class='btn btn-danger'>Sil</a>
                              </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='8'>Sipariş bulunamadı.</td></tr>";
                }
                ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="6"></td>
                    <td><strong>Toplam tutar:   <?php echo $grandTotal; ?> ₺</strong></td>
                    <td></td>
                </tr>
            </tfoot>
        </table>

        <a href="logout.php" class="btn btn-danger">Çıkış Yap</a>
    </div>
</body>
</html>
