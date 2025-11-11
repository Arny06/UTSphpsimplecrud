<?php

// Memasukkan file class-master.php untuk mengakses class MasterData
include '../config/class-master.php';
// Membuat objek dari class MasterData
$master = new MasterData();
// Mengecek aksi yang dilakukan berdasarkan parameter GET 'aksi'
$aksi = $_GET['aksi'];
if($aksi == 'inputjenis'){
    $data = [
        'kode'   => $_POST['kode_jenis'],
        'jenis' => $_POST['jenis_sepatu']
    ];

    $input = $master->inputJenis($data);
    if($input){
        header("Location: ../master-jenis-list.php?status=inputsuccess");
    } else {
        header("Location: ../master-jenis-input.php?status=failed");
    }

} elseif($aksi == 'updatejenis'){
    $data = [
        'kode'   => $_POST['kode_jenis'],
        'jenis' => $_POST['jenis_sepatu']
    ];

    $update = $master->updateJenis($data);
    if($update){
        header("Location: ../master-jenis-list.php?status=editsuccess");
    } else {
        header("Location: ../master-jenis-edit.php?id=".$data['kode_jenis']."&status=failed");
    }

} elseif($aksi == 'deletejenis'){
    $id = $_GET['id'];
    $delete = $master->deleteJenis($id);
    if($delete){
        header("Location: ../master-jenis-list.php?status=deletesuccess");
    } else {
        header("Location: ../master-jenis-list.php?status=deletefailed");
    }
}

?>