<?php
    include 'src/Koneksi.php';
    include 'src/Mahasiswa.php';
    
    $notif_blank = "";
    $notif_success = "";
    
    $mahasiswa_edit = new Mahasiswa($dbh);
    
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
                $id_mahasiswa = $_GET['id_mahasiswa'];
                $nama_mahasiswa = $_POST['nama_mahasiswa'];
                $email = $_POST['email'];
                $alamat = $_POST['alamat'];
                $no_hp = $_POST['no_hp'];
                
                $mahasiswa_edit->editMahasiswa($id_mahasiswa, $nama_mahasiswa, $email, $alamat, $no_hp);
                
                $notif_success .= "<p>Successful edited!</p>";
            }
        }
    }
    
    if (isset($_GET['id_mahasiswa'])) {
        $id_mahasiswa = $_GET['id_mahasiswa'];
        extract($mahasiswa_edit->getIdMahasiswa($id_mahasiswa));
    }
    
    include 'view/view_edit_mahasiswa.html';
    include 'view/footer_layout.html';
?>