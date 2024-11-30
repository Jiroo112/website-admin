<?php

class Profil_model{
    private $table = 'admin';
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function getAllUser(){
        $this->db->query('SELECT * FROM admin WHERE username = "JIR04"');
        return $this->db->resultset();
    }

    public function updateProfile($data) {
        // Ambil gambar lama dari database
        $this->db->query("SELECT gambar FROM admin WHERE username = :username");
        $this->db->bind('username', $data['username']);
        $result = $this->db->single();
    
        $gambarLama = $result ? $result['gambar'] : null;
    
        // Query untuk update data
        $query = "UPDATE admin SET 
            email = :email,
            password = :password,
            nama = :nama,
            notelp_admin = :notelp_admin,
            gambar = :gambar
            WHERE username = :username";
    
        // Validasi dan handle file upload
        $fileName = $gambarLama; // Default gunakan gambar lama
        if (isset($data['gambar']) && is_array($data['gambar']) && $data['gambar']['error'] === 0) {
            // Validasi file
            $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
            if (!in_array($data['gambar']['type'], $allowedTypes)) {
                throw new Exception("Invalid file type. Only JPEG, PNG, and GIF are allowed.");
            }
    
            $uploadDirectory = "../app/upload/profil/";
            if (!is_dir($uploadDirectory)) {
                mkdir($uploadDirectory, 0755, true); // Buat direktori jika belum ada
            }
    
            $fileName = time() . '_' . basename($data['gambar']['name']); // Tambahkan timestamp untuk unik
            $filePath = $uploadDirectory . $fileName;
    
            if (!move_uploaded_file($data['gambar']['tmp_name'], $filePath)) {
                throw new Exception("Failed to upload the file.");
            }
        }
    
        // Bind data untuk query
        $this->db->query($query);
        $this->db->bind('email', $data['email']);
        $this->db->bind('password', $data['password']);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('notelp_admin', $data['notelp_admin']);
        $this->db->bind('gambar', $fileName);
        $this->db->bind('username', $data['username']);
    
        // Eksekusi query
        $this->db->execute();
    
        return $this->db->rowCount();
    }
    
}