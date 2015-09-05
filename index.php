<?php
include 'src/Koneksi.php';
include 'src/Mahasiswa.php';
include 'view/header_layout.html';
$notif_success = "";
$mahasiswa = new Mahasiswa($dbh);
$results = $mahasiswa->getMahasiswa();

if (isset($_GET['delete'])) {
    $delete_mahasiswa = new Mahasiswa($dbh);
    $delete_mahasiswa->deleteMahasiswa($_GET['delete']);
    
    $notif_success .= "Hapus Data Berhasil";
}

    include 'view/view_table_mahasiswa.html';
    include 'view/footer_layout.html' ;
?>