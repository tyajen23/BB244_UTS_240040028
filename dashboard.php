<?php
require_once 'classes/produk.php';
require_once 'classes/transaksi.php';
$produk = new Produk();
$transaksi = new Transaksi();

$data_produk = $produk->read();
$data_transaksi = $transaksi->read();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1> Data Stok Produk </h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nama Produk</th>
            <th>Kategori</th>
            <th>Stok</th>
            <th>Harga</th>
        </tr>
        <?php while ($row = $data_produk->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['nama']; ?></td>
            <td><?php echo $row['deskripsi']; ?></td>
            <td><?php echo $row['stok']; ?></td>
            <td><?php echo $row['harga']; ?></td>
        </tr>
        <?php 
            if($row['stok'] < 5) {
                echo "<tr><td colspan='5' style='color: red;'>Stok menipis!</td></tr>";
            }
        } ?>

    </table>
    <h2> rekap transaksi </h2>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nama Produk</th>
            <th>Jumlah</th>
            <th>Tanggal</th>
        </tr>
        <?php while ($row = $data_transaksi->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['nama_produk']; ?></td>
            <td><?php echo $row['jumlah']; ?></td>
            <td><?php echo $row['tanggal']; ?></td>
        </tr>
        <?php }  ?>
 </table>

    
</body>
</html>
