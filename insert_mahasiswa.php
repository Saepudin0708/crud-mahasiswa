<?php
include 'src/Koneksi.php';
include 'src/Mahasiswa.php';

$notif_blank = "";
$notif_success = "";

if (isset($_POST['save'])) {
    if (empty($_POST['nama_mahasiswa'])) {
        $notif_blank .= "<p>Nama harus diisi</p>";
    }
    
    if (empty($_POST['email'])) {
        $notif_blank .= "<p>Email harus diisi</p>";
    }
    
    if (empty($_POST['alamat'])) {
        $notif_blank .= "<p>Alamat harus diisi</p>";
    }
    
    if (empty($_POST['no_hp'])) {
        $notif_blank .= "<p>No Handphone harus diisi</p>";
    }
    
    if (empty($notif_blank)) {
        if (isset($_POST['save']) && $_POST['save']) {
            $insert_mahasiswa = new Mahasiswa($dbh);
            $insert_mahasiswa->addMahasiswa($_POST['nama_mahasiswa'], $_POST['email'], $_POST['alamat'], $_POST['no_hp']);
            $notif_success .= "<p>Successfully added to your database</p>";
        }
    }
}

include 'view/header_layout.html';
include 'view/view_insert_mahasiswa.html';
include 'view/footer_layout.html';
?>