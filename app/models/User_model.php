<?php

class User_model{
    private $table = 'data_pengguna';
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function getAllUser(){
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultset();
    }

    public function getUserById($id){
        $this->db->query("SELECT * FROM data_pengguna WHERE id_user = :id");
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function getIdUser(){
        $this->db->query('SELECT MAX(id_user) AS id_terbesar FROM data_pengguna');
        return $this->db->single();
    }

    public function tambahDataUser($data){
        $query = "INSERT INTO data_pengguna VALUES (:id_user, :nama_lengkap, :email, :password, :no_hp, :berat_badan, :tinggi_badan, :umur, :tipe_diet ,:gender, :gambar)";

        $fileName = $data['gambar']['name'];
        $uploadDirectory = "../app/upload/user/";
        $filePath = $uploadDirectory . $fileName;

        move_uploaded_file($data['gambar']['tmp_name'], $filePath);

        $this->db->query($query);
        $this->db->bind('id_user', $data['id_user']);
        $this->db->bind('nama_lengkap', $data['nama_lengkap']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('password', $data['pasword']);
        $this->db->bind('no_hp', $data['no_hp']);
        $this->db->bind('berat_badan', $data['berat_badan']);
        $this->db->bind('tinggi_badan', $data['tinggi_badan']);
        $this->db->bind('umur', $data['umur']);
        $this->db->bind('tipe_diet', $data['tipe_diet']);
        $this->db->bind('gender', $data['gender']);
        $this->db->bind('gambar', $fileName);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusDataUser($id){
        $query = "DELETE FROM data_pengguna WHERE id_user = :id";

        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();
        return $this->db->rowCount();
    }
    
    public function ubahDataUser($data){

        $this->db->query("SELECT gambar FROM data_pengguna WHERE id_user = :id_user");
        $this->db->bind('id_user', $data['id_user']);
        $result = $this->db->single(); 

        $gambarLama = $result ? $result['gambar'] : null;

        $query = "UPDATE data_pengguna SET 
        nama_lengkap = :nama_lengkap,
        email = :email,
        password = :password,
        no_hp = :no_hp,
        berat_badan = :berat_badan,
        tinggi_badan = :tinggi_badan,
        umur = :umur,
        tipe_diet = :tipe_diet,
        gender = :gender,
        gambar = :gambar
        WHERE id_user = :id_user";

        if(isset($data['gambar']) && $data['gambar']['error'] === 0) {
            $fileName = $data['gambar']['name'];
            $uploadDirectory = "../app/upload/user/";
            $filePath = $uploadDirectory . $fileName;
            move_uploaded_file($data['gambar']['tmp_name'], $filePath);
        } else {
            $fileName = $gambarLama;
        }

    
    $this->db->query($query);
    $this->db->bind('nama_lengkap', $data['nama_lengkap']);
    $this->db->bind('email', $data['email']);
    $this->db->bind('password', $data['pasword']);
    $this->db->bind('no_hp', $data['no_hp']);
    $this->db->bind('berat_badan', $data['berat_badan']);
    $this->db->bind('tinggi_badan', $data['tinggi_badan']);
    $this->db->bind('umur', $data['umur']);
    $this->db->bind('tipe_diet', $data['tipe_diet']);
    $this->db->bind('gender', $data['gender']);
    $this->db->bind('gambar', $fileName);
    $this->db->bind('id_user', $data['id_user']);

    $this->db->execute();
    return $this->db->rowCount();
    }

    public function cariAllUser(){
        $keyword = $_POST['keyword'];

        $query = "SELECT * FROM data_pengguna WHERE nama_lengkap LIKE :keyword";

        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");
        return $this->db->resultset();
    }
}