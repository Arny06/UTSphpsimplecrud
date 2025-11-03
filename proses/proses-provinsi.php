<?php

// Memasukkan file class-master.php untuk mengakses class MasterData
include '../config/class-master.php';
// Membuat objek dari class MasterData
$master = new MasterData();
// Mengecek aksi yang dilakukan berdasarkan parameter GET 'aksi'
if($_GET['aksi'] == 'inputmerk'){
    // Mengambil data provinsi dari form input menggunakan metode POST dan menyimpannya dalam array
    $dataMerk = [
        'merk' => $_POST['merk']
    ];
    // Memanggil method inputProvinsi untuk memasukkan data provinsi dengan parameter array $dataProvinsi
    $input = $master->inputMerk($dataMerk);
    if($input){
        header("Location: ../master-merk-list.php?status=inputsuccess");
    } else {
        header("Location: ../master-merk-input.php?status=failed");
    }
} elseif($_GET['aksi'] == 'updatemerk'){
    // Mengambil data provinsi dari form edit menggunakan metode POST dan menyimpannya dalam array
    $dataMerk = [
        'id' => $_POST['id'],
        'merk' => $_POST['merk']
    ];
    // Memanggil method updateProvinsi untuk mengupdate data provinsi dengan parameter array $dataProvinsi
    $update = $master->updateMerk($dataMerk);
    if($update){
        header("Location: ../master-merk-list.php?status=editsuccess");
    } else {
        header("Location: ../master-merk-edit.php?id=".$dataMerk['id']."&status=failed");
    }
} elseif($_GET['aksi'] == 'deletemerk'){
    // Mengambil id provinsi dari parameter GET
    $id = $_GET['id'];
    // Memanggil method deleteProvinsi untuk menghapus data provinsi berdasarkan id
    $delete = $master->deleteMerk($id);
    if($delete){
        header("Location: ../master-merk-list.php?status=deletesuccess");
    } else {
        header("Location: ../master-merk-list.php?status=deletefailed");
    }
}

?>