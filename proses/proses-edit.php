<?php

// Memasukkan file class-mahasiswa.php untuk mengakses class Mahasiswa
include_once '../config/class-mahasiswa.php';
// Membuat objek dari class Mahasiswa
$sepatu = new Sepatu();
// Mengambil data mahasiswa dari form edit menggunakan metode POST dan menyimpannya dalam array
$dataMahasiswa = [
    'id' => $_POST['id'],
    'kode_sepatu' => $_POST['kode_sepatu'],
    'nama_sepatu' => $_POST['nama_sepatu'],
    'jenis_sepatu' => $_POST['jenis_sepatu'],
    'merk_sepatu' => $_POST['merk_sepatu'],
    'harga' => $_POST['harga'],
    'stock' => $_POST['stock']
];
// Memanggil method editMahasiswa untuk mengupdate data mahasiswa dengan parameter array $dataMahasiswa
$edit = $sepatu->editSepatu($dataSepatu);
// Mengecek apakah proses edit berhasil atau tidak - true/false
if($edit){
    // Jika berhasil, redirect ke halaman data-list.php dengan status editsuccess
    header("Location: ../data-list.php?status=editsuccess");
} else {
    // Jika gagal, redirect ke halaman data-edit.php dengan status failed dan membawa id mahasiswa
    header("Location: ../data-edit.php?id=".$dataSepatu['id']."&status=failed");
}

?>