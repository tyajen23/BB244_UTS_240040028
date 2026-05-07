<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Form Produk</h1>
    <form action="proses_produk.php" method="POST">
        <label for="id">ID:</label><br>
        <input type="text" id="id" name="id"><br>
        <label for="nama_produk">Nama Produk:</label><br>
        <input type="text" id="nama_produk" name="nama_produk"><br>
        <label for="kategori">Kategori:</label><br>
        <input type="text" id="kategori" name="kategori"><br>
        <label for="stok">Stok:</label><br>
        <input type="number" id="stok" name="stok"><br>
        <label for="harga">Harga:</label><br>
        <input type="number" id="harga" name="harga"><br><br>
        <input type="submit" value="Submit">
    </form>
    <hr>
    <a href="dashboard.php">Kembali ke Dashboard</a>

    <h2>Data Produk</h2>

    <table>
        <tr>
            <th>ID</th>
            <th>Nama Produk</th>
            <th>Kategori</th>
            <th>Stok</th>
            <th>Harga</th>
        </tr>
        <?php
        require_once 'classes/produk.php';
        $produk = new Produk();
        $data_produk = $produk->read();

        while ($row = $data_produk->fetch_assoc()) {

        if ($row['stok'] < 5) {
            $status = "Stok menipis!";
        } else {
            $status = "aman";
        }
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['nama'] . "</td>";
            echo "<td>" . $row['deskripsi'] . "</td>";
            echo "<td>" . $row['stok'] . "</td>";
            echo "<td>" . $row['harga'] . "</td>";
            echo "<td>" . $status . "</td>";

            echo "<td><a href='edit_produk.php?id=" . $row['id'] . "'>Edit</a></td>";
            echo "<td><a href='delete_produk.php?id=" . $row['id'] . "'>Delete</a></td>";
            echo "</tr>";
        }
        ?>
    
</body>
</html>
