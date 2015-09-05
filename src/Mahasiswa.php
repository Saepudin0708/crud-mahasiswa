<?php
class Mahasiswa
{
    private $db;
    
    public function __construct($database)
    {
        $this->db = $database;
        
    }
    
    public function getMahasiswa()
    {
        $query = "SELECT * FROM mahasiswa";
        $result = $this->db->prepare($query);
        $result->execute();
        return $result->fetchAll();
    }
    
    public function addMahasiswa($nama_mahasiswa, $email, $alamat, $no_hp)
    {
        $query = "INSERT INTO mahasiswa (nama_mahasiswa, email, alamat, no_hp) value (:nama_mahasiswa, :email, :alamat, :no_hp)";
        $result = $this->db->prepare($query);
        $result->bindParam(':nama_mahasiswa', $nama_mahasiswa);
        $result->bindParam(':email', $email);
        $result->bindParam(':alamat', $alamat);
        $result->bindParam(':no_hp', $no_hp);
        $result->execute();
    }
    
    public function deleteMahasiswa($id_mahasiswa)
    {
        $query = "DELETE FROM mahasiswa WHERE id_mahasiswa = :id_mahasiswa";
        $result = $this->db->prepare($query);
        $result->bindParam(':id_mahasiswa', $id_mahasiswa);
        $result->execute();
    }
    
    public function editMahasiswa($id_mahasiswa, $nama_mahasiswa, $email, $alamat, $no_hp)
    {
        $query = "UPDATE mahasiswa SET nama_mahasiswa = :nama_mahasiswa, email = :email, alamat = :alamat, no_hp = :no_hp WHERE id_mahasiswa = :id_mahasiswa";
        $result = $this->db->prepare($query);
        $result->bindParam(':id_mahasiswa', $id_mahasiswa);
        $result->bindParam(':nama_mahasiswa', $nama_mahasiswa);
        $result->bindParam(':email', $email);
        $result->bindParam(':alamat', $alamat);
        $result->bindParam(':no_hp', $no_hp);
        $result->execute();
    }
    
    public function getIdMahasiswa($id_mahasiswa)
    {
        $query = "SELECT * FROM mahasiswa WHERE id_mahasiswa = :id_mahasiswa";
        $result = $this->db->prepare($query);
        $result->execute(array(':id_mahasiswa' => $id_mahasiswa));
        $sth = $result->fetch(PDO::FETCH_ASSOC);
        return $sth;
    }
}
?>