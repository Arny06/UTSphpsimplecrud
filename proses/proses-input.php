<?php

// Memasukkan file class-mahasiswa.php untuk mengakses class Mahasiswa
include '../config/class-mahasiswa.php';
// Membuat objek dari class Mahasiswa
$sepatu = new Sepatu();
// Mengambil data mahasiswa dari form input menggunakan metode POST dan menyimpannya dalam array
$dataSepatu = [
    'kode_sepatu' => $_POST['kode_sepatu'],
    'nama_sepatu' => $_POST['nama_sepatu'],
    'jenis_sepatu' => $_POST['jenis_sepatu'],
    'merk_sepatu' => $_POST['merk_sepatu'],
    'harga' => $_POST['harga'],
    'stock' => $_POST['stock']
];
// Memanggil method inputMahasiswa untuk memasukkan data mahasiswa dengan parameter array $dataMahasiswa
$input = $sepatu->inputSepatu($dataSepatu);
// Mengecek apakah proses input berhasil atau tidak - true/false
if($input){
    // Jika berhasil, redirect ke halaman data-list.php dengan status inputsuccess
    header("Location: ../data-list.php?status=inputsuccess");
} else {
    // Jika gagal, redirect ke halaman data-input.php dengan status failed
    header("Location: ../data-input.php?status=failed");
}

?>