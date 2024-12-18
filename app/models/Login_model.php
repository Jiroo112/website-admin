<?php

class Login_model{
    private $table = 'admin';
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function login($data) {
        session_start();

        $this->db->query('SELECT * FROM admin');
        $admin = $this->db->resultset();
    

        $this->db->query('SELECT * FROM data_pengguna');
        $datauser = $this->db->resultset();
        
        foreach ($admin as $admin1) { 
            if (!empty($admin1['email']) && !empty($admin1['password'])) {

                if ($admin1['email'] === $data['email'] && $data['password'] === $admin1['password']) {
                    $_SESSION['nama'] = $admin1['nama']; 
                    $_SESSION['email'] = $admin1['email'];
                    $_SESSION['username'] = $admin1['username'];
                    Flasher::setFlash('Login', 'berhasil', 'success');
                    header('Location: ' . BASEURL . 'home');
                    exit;
                }
            }
        }
    
        foreach ($datauser as $user) {
            if (!empty($user['email']) && !empty($user['password'])) {
                if ($user['email'] === $data['email'] && password_verify($data['password'], $user['password'])) {
                    $_SESSION['nama'] = $user['nama_lengkap']; 
                    $_SESSION['email'] = $user['email'];
                    Flasher::setFlash('Login', 'berhasil', 'success');
                    header('Location: ' . BASEURL . 'RealLandingpage');
                    exit;
                }
            }
        }
    
        Flasher::setFlash('Login Gagal', 'Email atau password salah', 'error');
        header('Location: ' . BASEURL . 'login');
        exit;
    }
    

    public function tambahDataUser($data) {
        // Pastikan kolom gambar memiliki nilai, misalnya "" jika tidak ada gambar
        $gambar = !empty($data['gambar']) ? $data['gambar'] : "";
    
        $query = "INSERT INTO data_pengguna 
                  (id_user, nama_lengkap, email, password, no_hp, berat_badan, tinggi_badan, tanggal_lahir, tipe_diet, gender, gambar)
                  VALUES (:id_user, :nama_lengkap, :email, :password, :no_hp, :berat_badan, :tinggi_badan, :tanggal_lahir, :tipe_diet, :gender, :gambar)";
        
        // Hash password sebelum disimpan ke database
        $hashedPassword = password_hash($data['pasword'], PASSWORD_DEFAULT);
    
        $this->db->query($query);
        $this->db->bind('id_user', $data['id_user']);
        $this->db->bind('nama_lengkap', $data['nama_lengkap']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('password', $hashedPassword);
        $this->db->bind('no_hp', $data['no_hp']);
        $this->db->bind('berat_badan', $data['berat_badan']);
        $this->db->bind('tinggi_badan', $data['tinggi_badan']);
        $this->db->bind('tanggal_lahir', $data['tanggal_lahir']);
        $this->db->bind('tipe_diet', $data['tipe_diet']);
        $this->db->bind('gender', $data['gender']);
        $this->db->bind('gambar', $gambar); // Binding gambar
    
        // Eksekusi query
        $this->db->execute();
    
        return $this->db->rowCount();
    }
    
    
}