<?php

class Login_model{
    private $table = 'admin';
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function login($data) {
        // Ambil data admin dari database
        $this->db->query('SELECT email, password FROM admin');
        $admin = $this->db->resultset();
    
        // Ambil data pengguna dari database
        $this->db->query('SELECT email, password FROM data_pengguna');
        $datauser = $this->db->resultset();
        
        // Periksa login untuk admin dan user
        foreach ($admin as $admin1) { 
            if (!empty($admin1['email']) && !empty($admin1['password'])) {
                // Jika email dan password admin cocok
                if ($admin1['email'] === $data['email'] && password_verify($data['password'], $admin1['password'])) {
                    Flasher::setFlash('Login', 'berhasil', 'success');
                    header('Location: ' . BASEURL . 'home');
                    exit;
                }
            }
        }
    
        // Jika tidak ditemukan sebagai admin, periksa sebagai user biasa
        foreach ($datauser as $user) {
            if (!empty($user['email']) && !empty($user['password'])) {
                // Verifikasi password user dengan password yang di-hash
                if ($user['email'] === $data['email'] && password_verify($data['password'], $user['password'])) {
                    Flasher::setFlash('Login', 'berhasil', 'success');
                    header('Location: ' . BASEURL . 'starup');
                    exit;
                }
            }
        }
    
        // Jika tidak ditemukan email atau password yang sesuai
        Flasher::setFlash('Login Gagal', 'Email atau password salah', 'error');
        header('Location: ' . BASEURL . 'login');
        exit;
    }
    

    public function tambahDataUser($data) {
        // Pastikan kolom gambar memiliki nilai, misalnya "" jika tidak ada gambar
        $gambar = !empty($data['gambar']) ? $data['gambar'] : "";
    
        $query = "INSERT INTO data_pengguna 
                  (id_user, nama_lengkap, email, password, no_hp, berat_badan, tinggi_badan, umur, tipe_diet, gender, gambar)
                  VALUES (:id_user, :nama_lengkap, :email, :password, :no_hp, :berat_badan, :tinggi_badan, :umur, :tipe_diet, :gender, :gambar)";
        
        // Hash password sebelum disimpan ke database
        $hashedPassword = password_hash($data['pasword'], PASSWORD_DEFAULT);
    
        // Siapkan query dan binding untuk semua parameter
        $this->db->query($query);
        $this->db->bind('id_user', $data['id_user']);
        $this->db->bind('nama_lengkap', $data['nama_lengkap']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('password', $hashedPassword);
        $this->db->bind('no_hp', $data['no_hp']);
        $this->db->bind('berat_badan', $data['berat_badan']);
        $this->db->bind('tinggi_badan', $data['tinggi_badan']);
        $this->db->bind('umur', $data['umur']);
        $this->db->bind('tipe_diet', $data['tipe_diet']);
        $this->db->bind('gender', $data['gender']);
        $this->db->bind('gambar', $gambar); // Binding gambar
    
        // Eksekusi query
        $this->db->execute();
    
        return $this->db->rowCount();
    }
    
    
}