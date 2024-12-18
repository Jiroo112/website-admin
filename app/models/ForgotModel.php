<?php

class ForgotModel{
    private $table = 'admin'; // Nama tabel dalam database
    private $db; // Objek database

    public function __construct(){
     $this ->db = new Database; // Dependency injection  
    }

        public function findByEmail($email)
    {
        $this->db->query("SELECT * FROM admin WHERE email = :email");
        $this->db->bind(':email', $email);
        return $this->db->single();
    }

    public function updatePassword($email, $password)
    {

        // Pastikan password di-hash sebelum disimpan
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    
        // Query SQL untuk memperbarui password berdasarkan email
        $this->db->query("UPDATE admin SET password = :password WHERE email = :email");
    
        // Binding parameter untuk mencegah SQL Injection
        $this->db->bind(':password', $hashedPassword);
        $this->db->bind(':email', $email);
    
        // Eksekusi query dan kembalikan hasilnya
        return $this->db->execute();
    }
    
}