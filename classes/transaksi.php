<?php
//ekstensi file database.php
<?php

require_once 'config/database.php';
class Transaksi extends Database {
private $table = 'transaksi';

   
    public function create($id_produk, $jumlah, $tanggal) {

        
        $cek = $this->conn->prepare(
            "SELECT * FROM produk WHERE id = ?"
        );

        $cek->bind_param("i", $id_produk);
        $cek->execute();

        $data = $cek->get_result()->fetch_assoc();

        
        if ($data['stok'] < $jumlah) {
            return false;
        }

        
        $qry = "INSERT INTO $this->table
                (id_produk, jumlah, tanggal)
                VALUES (?, ?, ?)";

        $stmt = $this->conn->prepare($qry);

        $stmt->bind_param(
            "iis",
            $id_produk,
            $jumlah,
            $tanggal
        );

        $hasil = $stmt->execute();

       
        if (!$hasil) {
            return false;
        }

       
        $new_stok = $data['stok'] - $jumlah;

       
        $update = "UPDATE produk
                   SET stok = ?
                   WHERE id = ?";

        $stmt_update = $this->conn->prepare($update);

        $stmt_update->bind_param(
            "ii",
            $new_stok,
            $id_produk
        );

        return $stmt_update->execute();
    }

    
    public function read() {

        $qry = "SELECT
                 t.id,
                 p.nama_produk,
                t.jumlah,
                 t.tanggal
        FROM $this->table t
        JOIN produk p
        ON t.id_produk = p.id";

        return $this->conn->query($qry);
    }
}

?>
// require_once 'config/database.php';

// class Transaksi extends Database {
//     private $table = 'transaksi';

//     public function create ($id, $id_produk, $jumlah, $tanggal) {
//         $cek = $this->conn->query("SELECT * FROM produk WHERE id = '$id_produk'"
//         );

//         $cek->bind_param("i", $id_produk);
//         $cek->execute();
//         $data = $cek->get_result()->fetch_assoc();

//         if ($data['stok'] < $jumlah) {
//             return false;
//         } else {
//             $qry = "INSERT INTO $this->table (id_produk, jumlah, tanggal) VALUES (?, ?, ?)";
//             $stmt =  $this->conn->prepare($qry);
//             $stmt->bind_param("iis", $id_produk, $jumlah, $tanggal);
//             if ($stmt->execute()) {
//                 $new_stok = $data['stok'] - $jumlah;
//                 $update_stok = "UPDATE produk SET stok = ? WHERE id = ?";
//                 $stmt_update = $this->conn->prepare($update_stok);
//                 $stmt_update->bind_param("ii", $new_stok, $id_produk);
//                 return $stmt_update->execute();
//             } else {
//                 return false;
//             }
//             public function read (){
//                 $qry = "SELECT t.id, p.nama AS nama_produk, t.jumlah, t.tanggal FROM $this->table t JOIN produk p ON t.id_produk = p.id";
//                 return $this->conn->query($qry);
//             }
//         }
//     }
