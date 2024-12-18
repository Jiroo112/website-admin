<?php

class Profil_model{
    private $table = 'admin';
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function getAllUser($data){
        $this->db->query("SELECT * FROM admin WHERE username = :username");
        $this->db->bind('username', $data['username']);
        return $this->db->resultset();
    }

    public function updateProfile($data) {
        $this->db->query("SELECT gambar FROM admin WHERE username = :username");
        $this->db->bind('username', $data['username']);
        $result = $this->db->single(); 

        $gambarLama = $result ? $result['gambar'] : null;

        $query = "UPDATE admin SET 
        email = :email,
        password = :password,
        nama = :nama,
        notelp_admin = :notelp_admin,
        gambar = :gambar
        WHERE username = :username";

    if(isset($data['gambar']) && $data['gambar']['error'] === 0) {
        $fileName = $data['gambar']['name'];
        $uploadDirectory = "../app/upload/profil/";
        $filePath = $uploadDirectory . $fileName;
        move_uploaded_file($data['gambar']['tmp_name'], $filePath);
    } else {
        $fileName = $gambarLama;
    }

    $this->db->query($query);
    $this->db->bind('email', $data['email']);
    $this->db->bind('password', $data['password']); // Sesuaikan dengan query
    $this->db->bind('nama', $data['nama']);
    $this->db->bind('notelp_admin', $data['notelp_admin']);
    $this->db->bind('gambar', $fileName);
    $this->db->bind('username', $data['username']);

    $this->db->execute();
    return $this->db->rowCount();
    }
    
}