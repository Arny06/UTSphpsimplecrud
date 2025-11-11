<?php

// Memasukkan file konfigurasi database
include_once 'db-config.php';

class MasterData extends Database {

    // Method untuk mendapatkan daftar program studi
    public function getJenis(){
        $query = "SELECT * FROM tb_jenis";
        $result = $this->conn->query($query);
        $jenis = [];
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $jenis[] = [
                    'id' => $row['kode_jenis'],
                    'jenis' => $row['jenis_sepatu']
                ];
            }
        }
        return $jenis;
    }

    // Method untuk mendapatkan daftar provinsi
    public function getMerk(){
        $query = "SELECT * FROM tb_merk_sepatu";
        $result = $this->conn->query($query);
        $merk = [];
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $merk[] = [
                    'id' => $row['id_merk'],
                    'merk' => $row['merk_sepatu']
                ];
            }
        }
        return $merk;
    }


    // Method untuk input data program studi
    public function inputJenis($data){
        $kodeJenis = $data['kode'];
        $namaJenis = $data['nama'];
        $query = "INSERT INTO tb_jenis (kode_jenis, nama_jenis) VALUES (?, ?)";
        $stmt = $this->conn->prepare($query);
        if(!$stmt){
            return false;
        }
        $stmt->bind_param("ss", $kodeJenis, $namaJenis);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }

    // Method untuk mendapatkan data program studi berdasarkan kode
    public function getUpdateJenis($id){
        $query = "SELECT * FROM tb_jenis WHERE kode_jenis = ?";
        $stmt = $this->conn->prepare($query);
        if(!$stmt){
            return false;
        }
        $stmt->bind_param("s", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $jenis = null;
        if($result->num_rows > 0){
            $row = $result->fetch_assoc();
            $jenis = [
                'id' => $row['kode_jenis'],
                'nama' => $row['jenis_sepatu'],
            ];
        }
        $stmt->close();
        return $jenis;
    }

    // Method untuk mengedit data program studi
    public function updateJenis($data){
        $kodeJenis = $data['kode'];
        $namaJenis = $data['nama'];
        $query = "UPDATE tb_jenis SET jenis_sepatu = ? WHERE kode_jenis = ?";
        $stmt = $this->conn->prepare($query);
        if(!$stmt){
            return false;
        }
        $stmt->bind_param("ss", $namaJenis, $kodeJenis);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }

    // Method untuk menghapus data program studi
    public function deleteJenis($id){
        $query = "DELETE FROM tb_jenis WHERE kode_jenis = ?";
        $stmt = $this->conn->prepare($query);
        if(!$stmt){
            return false;
        }
        $stmt->bind_param("s", $id);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }

    // Method untuk input data provinsi
    public function inputMerk($data){
        $merk = $data['merk'];
        $query = "INSERT INTO tb_merk_sepatu (merk_sepatu) VALUES (?)";
        $stmt = $this->conn->prepare($query);
        if(!$stmt){
            return false;
        }
        $stmt->bind_param("s", $merk);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }

    // Method untuk mendapatkan data provinsi berdasarkan id
    public function getUpdateMerk($id){
        $query = "SELECT * FROM tb_merk_sepatu WHERE id_merk = ?";
        $stmt = $this->conn->prepare($query);
        if(!$stmt){
            return false;
        }
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $merk = null;
        if($result->num_rows > 0){
            $row = $result->fetch_assoc();
            $merk = [
                'id' => $row['id_merk'],
                'merk' => $row['merk_sepatu']
            ];
        }
        $stmt->close();
        return $merk;
    }

    // Method untuk mengedit data provinsi
    public function updateMerk($data){
        $idMerk = $data['id'];
        $namaMerk = $data['merk'];
        $query = "UPDATE tb_merk_sepatu SET merk_sepatu = ? WHERE id_merk = ?";
        $stmt = $this->conn->prepare($query);
        if(!$stmt){
            return false;
        }
        $stmt->bind_param("si", $namaMerk, $idMerk);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }

    // Method untuk menghapus data provinsi
    public function deleteMerk($id){
        $query = "DELETE FROM tb_merk_sepatu WHERE id_merk = ?";
        $stmt = $this->conn->prepare($query);
        if(!$stmt){
            return false;
        }
        $stmt->bind_param("i", $id);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }

}

?>