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

    public function tambahDataUser($data){
        $query = "INSERT INTO data_pengguna VALUES (:id_user, :nama_lengkap, :email, :password, :no_hp, :berat_badan, :tinggi_badan, :umur, :tipe_diet ,:gender)";

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

        $query = "UPDATE data_pengguna SET 
        nama_lengkap = :nama_lengkap,
        email = :email,
        password = :password,
        no_hp = :no_hp,
        berat_badan = :berat_badan,
        tinggi_badan = :tinggi_badan,
        umur = :umur,
        tipe_diet = :tipe_diet,
        gender = :gender
        WHERE id_user = :id_user";

    
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