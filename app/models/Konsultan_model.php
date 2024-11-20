<?php

class Konsultan_model{
    private $table = 'konsultan';
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function getAllKonsultan(){
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultset();
    }

    public function getKonsultanById($id){
        $query = "SELECT * FROM konsultan WHERE id_konsultan = :id";

        $this->db->query($query);
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function getIdKonsultan(){
        $this->db->query('SELECT MAX(id_konsultan) AS id_terbesar FROM konsultan');
        return $this->db->single();
    }

    public function tambahDataKonsultan($data){
        $query = "INSERT INTO konsultan VALUES (:id_konsultan, :nama_lengkap, :no_hp, :gambar)";

        $fileName = $data['gambar']['name'];
        $uploadDirectory = "../app/upload/konsultan/";
        $filePath = $uploadDirectory . $fileName;

        move_uploaded_file($data['gambar']['tmp_name'], $filePath);

        $this->db->query($query);
        $this->db->bind('id_konsultan', $data['id_konsultan']);
        $this->db->bind('nama_lengkap', $data['nama_lengkap']);
        $this->db->bind('no_hp', $data['no_hp']);
        $this->db->bind('gambar', $fileName);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusDataKonsultan($id){
        $query = "DELETE FROM konsultan WHERE id_konsultan = :id";

        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function ubahDataKonsultan($data){

        $this->db->query("SELECT gambar FROM konsultan WHERE id_konsultan = :id_konsultan");
        $this->db->bind('id_konsultan', $data['id_konsultan']);
        $result = $this->db->single(); 

        $gambarLama = $result ? $result['gambar'] : null;

        $query = "UPDATE konsultan SET 
        nama_lengkap = :nama_lengkap,
        no_hp = :no_hp,
        gambar = :gambar
        WHERE id_konsultan = :id_konsultan";

    // Handle file upload jika ada file baru
    if(isset($data['gambar']) && $data['gambar']['error'] === 0) {
        $fileName = $data['gambar']['name'];
        $uploadDirectory = "../app/upload/konsultan/";
        $filePath = $uploadDirectory . $fileName;
        move_uploaded_file($data['gambar']['tmp_name'], $filePath);
    } else {
        $fileName = $gambarLama;
    }

    $this->db->query($query);
    $this->db->bind('nama_lengkap', $data['nama_lengkap']);
    $this->db->bind('no_hp', $data['no_hp']); // Sesuaikan dengan query
    $this->db->bind('gambar', $fileName);
    $this->db->bind('id_konsultan', $data['id_konsultan']);

    $this->db->execute();
    return $this->db->rowCount();
    }
    
    public function cariAllKonsultan(){
        $keyword = $_POST['keyword'];

        $query = "SELECT * FROM konsultan WHERE nama_lengkap LIKE :keyword";

        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");
        return $this->db->resultset();
    }
}