<?php 

// Memasukkan file konfigurasi database
include_once 'db-config.php';

class Sepatu extends Database {

    // Method untuk input data mahasiswa
    public function inputSepatu($data){
        // Mengambil data dari parameter $data
        $kode_sepatu      = $data['kode_sepatu'];
        $nama_sepatu     = $data['nama_sepatu'];
        $jenis_sepatu    = $data['jenis_sepatu'];
        $merk_sepatu = $data['merk_sepatu'];
        $harga    = $data['harga'];
        $stock     = $data['stock'];
        // Menyiapkan query SQL untuk insert data menggunakan prepared statement
        $query = "INSERT INTO tb_sepatu (kode_sepatu, nama_sepatu, jenis_sepatu, merk_sepatu, harga, stock ) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        // Mengecek apakah statement berhasil disiapkan
        if(!$stmt){
            return false;
        }
        // Memasukkan parameter ke statement
        $stmt->bind_param("ssssss", $kode_sepatu, $nama_sepatu, $jenis_sepatu, $merk_sepatu, $harga, $stock);
        $result = $stmt->execute();
        $stmt->close();
        // Mengembalikan hasil eksekusi query
        return $result;
    }

    // Method untuk mengambil semua data mahasiswa
    public function getAllSepatu(){
        // Menyiapkan query SQL untuk mengambil data mahasiswa beserta prodi dan provinsi
        $query = "SELECT id_sepatu, kode_sepatu, nama_sepatu, tb_jenis.jenis_sepatu, tb_merk_sepatu.merk_sepatu, harga,  stock  
                  FROM tb_sepatu
                  JOIN tb_jenis ON tb_sepatu.jenis_sepatu = kode_jenis
                  JOIN tb_merk_sepatu ON tb_sepatu.merk_sepatu = id_merk";
        $result = $this->conn->query($query);
        // Menyiapkan array kosong untuk menyimpan data mahasiswa
        $sepatu = [];
        // Mengecek apakah ada data yang ditemukan
        if($result->num_rows > 0){
            // Mengambil setiap baris data dan memasukkannya ke dalam array
            while($row = $result->fetch_assoc()) {
                $sepatu[] = [
                    'id_sepatu' => $row['id_sepatu'],
                    'kode_sepatu' => $row['kode_sepatu'],
                    'nama_sepatu' => $row['nama_sepatu'],
                    'jenis_sepatu' => $row['jenis_sepatu'],
                    'merk_sepatu' => $row['merk_sepatu'],
                    'harga' => $row['harga'],
                    'stock' => $row['stock']
                ];
            }
        }
        // Mengembalikan array data mahasiswa
        return $sepatu;
    }

    // Method untuk mengambil data mahasiswa berdasarkan ID
    public function getUpdateSepatu($id){
        // Menyiapkan query SQL untuk mengambil data mahasiswa berdasarkan ID menggunakan prepared statement
        $query = "SELECT * FROM tb_sepatu WHERE id_sepatu = ?";
        $stmt = $this->conn->prepare($query);
        if(!$stmt){
            return false;
        }
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $data = false;
        if($result->num_rows > 0){
            // Mengambil data mahasiswa  
            $row = $result->fetch_assoc();
            // Menyimpan data dalam array
            $data = [
                'id_sepatu' => $row['id_sepatu'],
                'kode_sepatu' => $row['kode_sepatu'],
                'nama_sepatu' => $row['nama_sepatu'],
                'jenis_sepatu' => $row['jenis_sepatu'],
                'merk_sepatu' => $row['merk_sepatu'],
                'harga' => $row['harga'],
                'stock' => $row['stock']
            ];
        }
        $stmt->close();
        // Mengembalikan data mahasiswa
        return $data;
    }

    // Method untuk mengedit data mahasiswa
    public function editSepatu($data){
        // Mengambil data dari parameter $data
        $id_sepatu       = $data['id_sepatu'];
        $kode_sepatu      = $data['kode_sepatu'];
        $nama_sepatu     = $data['nama_sepatu'];
        $jenis_sepatu    = $data['jenis_sepatu'];
        $merk_sepatu = $data['merk_sepatu'];
        $harga    = $data['harga'];
        $stock     = $data['stock'];
        // Menyiapkan query SQL untuk update data menggunakan prepared statement
        $query = "UPDATE tb_sepatu SET kode_sepatu = ?, nama_sepatu = ?, jenis_sepatu = ?, merk_sepatu = ?, harga = ?, stock = ? WHERE id_sepatu = ?";
        $stmt = $this->conn->prepare($query);
        if(!$stmt){
            return false;
        }
        // Memasukkan parameter ke statement
        $stmt->bind_param("ssssssi", $kode_sepatu, $nama_sepatu, $jenis_sepatu, $merk_sepatu, $harga, $stock, $id_sepatu);
        $result = $stmt->execute();
        $stmt->close();
        // Mengembalikan hasil eksekusi query
        return $result;
    }

    // Method untuk menghapus data mahasiswa
    public function deleteSepatu($id){
        // Menyiapkan query SQL untuk delete data menggunakan prepared statement
        $query = "DELETE FROM tb_sepatu WHERE id_sepatu = ?";
        $stmt = $this->conn->prepare($query);
        if(!$stmt){
            return false;
        }
        $stmt->bind_param("i", $id);
        $result = $stmt->execute();
        $stmt->close();
        // Mengembalikan hasil eksekusi query
        return $result;
    }

    // Method untuk mencari data mahasiswa berdasarkan kata kunci
    public function searchSepatu($kataKunci){
        // Menyiapkan LIKE query untuk pencarian
        $likeQuery = "%".$kataKunci."%";
        // Menyiapkan query SQL untuk pencarian data mahasiswa menggunakan prepared statement
        $query = "SELECT id_sepatu, kode_sepatu, nama_sepatu, tb_jenis.jenis_sepatu, tb_merk_sepatu.merk_sepatu, harga, stock
                  FROM tb_sepatu
                  JOIN tb_jenis ON tb_sepatu.jenis_sepatu = kode_jenis
                  JOIN tb_merk_sepatu ON tb_sepatu.merk_sepatu = id_merk
                  WHERE nama_sepatu LIKE ?";
        $stmt = $this->conn->prepare($query);
        if(!$stmt){
            // Mengembalikan array kosong jika statement gagal disiapkan
            return [];
        }
        // Memasukkan parameter ke statement
        $stmt->bind_param("s",  $likeQuery);
        $stmt->execute();
        $result = $stmt->get_result();
        // Menyiapkan array kosong untuk menyimpan data mahasiswa
        $sepatu= [];
        if($result->num_rows > 0){
            // Mengambil setiap baris data dan memasukkannya ke dalam array
            while($row = $result->fetch_assoc()) {
                // Menyimpan data mahasiswa dalam array
                $sepatu[] = [
                    'id_sepatu' => $row['id_sepatu'],
                    'kode_sepatu' => $row['kode_sepatu'],
                    'nama_sepatu' => $row['nama_sepatu'],
                    'jenis_sepatu' => $row['jenis_sepatu'],
                    'merk_sepatu' => $row['merk_sepatu'],
                    'harga' => $row['harga'],
                    'stock' => $row['stock'],
                ];
            }
        }
        $stmt->close();
        // Mengembalikan array data mahasiswa yang ditemukan
        return $sepatu;
    }

}

?>