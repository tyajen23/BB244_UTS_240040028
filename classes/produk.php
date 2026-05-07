<!-- <?php
 require_once 'config/database.php';

 class Product extends Database {
     private $table = 'produk';

     public function create ($id, $nama_produk, $kategori, $stok, $harga) {
        if ($stok < 0) {
            die("Stok tidak boleh negatif");
        }

        qry = "INSERT INTO $this->table (id, nama, deskripsi, harga, stok) VALUES (?, ?, ?, ?, ?)";
        $stmt =  $this->conn->prepare($qry);
        $stmt->bind_param("sssss"), ($id, $nama_produk, $kategori, $harga, $stok);
        return $stmt->execute();
     }
     
     public function read (){
         $qry = "SELECT * FROM $this->table";
         return $this->conn->query($qry);
     }  

        public function readByID ($id) {
            $qry = "SELECT * FROM $this->table WHERE id = ?";
            $stmt = $this->conn->prepare($qry);
            $stmt->bind_param("s", $id);
            $stmt->execute();
            return $stmt->get_result()->fetch_assoc();
        }

        public function update ($id, $nama_produk, $kategori, $stok, $harga) {
            if ($stok < 0) {
                die("Stok tidak boleh negatif");
            }

            $qry = "UPDATE $this->table SET nama = ?, deskripsi = ?, harga = ?, stok = ? WHERE id = ?";
            $stmt = $this->conn->prepare($qry);
            $stmt->bind_param("sssss", $nama_produk, $kategori, $harga, $stok, $id);
            return $stmt->execute();
        }
        public function delete ($id) {
            $qry = "DELETE FROM $this->table WHERE id = ?";
            $stmt = $this->conn->prepare($qry);
            $stmt->bind_param("s", $id);
            return $stmt->execute();
        }

        public function stokMenipis() {
            $qry = "SELECT * FROM $this->table WHERE stok < 5";
            return $this->conn->query($qry);
        }
    }


// //ekstensi file database.php
// require_once 'config/database.php';

// class Produk extends Database {
//     private $table = 'produk';

//     public function create ($id, $nama_produk, $kategori, $stok, $harga) {
//         $qry = "INSERT INTO $this->table (nama, deskripsi, harga, stok) VALUES (?, ?, ?, ?)";
//         $stmt =  $this->conn->prepare($qry);
//         $stmt->bind_param("ssss", $nama_produk, $kategori, $harga, $stok);
//         return $stmt->execute();
//     }

//     public function read (){
//         $qry = "SELECT * FROM $this->table";
//         return $this->conn->query($qry);
//     }
//     public function readByID ($id) {
//         $qry = "SELECT * FROM $this->table WHERE id = ?";
//         $stmt = $this->conn->prepare($qry);
//         $stmt->bind_param("s", $id);
//         $stmt->execute();
//         return $stmt->get_result()->fetch_assoc();
//     }


//     public function update ($id, $nama_produk, $kategori, $stok, $harga) {
//         $qry = "UPDATE $this->table SET nama = ?, deskripsi = ?, harga = ?, stok = ? WHERE id = ?";
//         $stmt = $this->conn->prepare($qry);
//         $stmt->bind_param("sssss", $nama_produk, $kategori, $harga, $stok, $id);
//         return $stmt->execute();
//     }
//     public function delete ($id) {
//         $qry = "DELETE FROM $this->table WHERE id = ?";
//         $stmt = $this->conn->prepare($qry);
//         $stmt->bind_param("s", $id);
//         return $stmt->execute();

//     }
// } -->

