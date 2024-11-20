<?php

class Buku_model{
    private $table = 'artikel';
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function getAllBuku(){
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultset();
    }

    public function getBukuById($id){
        $query = "SELECT * FROM artikel WHERE id_buku = :id";

        $this->db->query($query);
        $this->db->bind('id', $id);
        return $this->db->single();
    }
    public function getIdBuku(){
        $this->db->query('SELECT MAX(id_buku) AS id_terbesar FROM artikel');
        return $this->db->single();
    }

    public function tambahDataBuku($data){
        $query = "INSERT INTO artikel VALUES (:id_buku, :judul, :kategori, :isi_buku, :gambar, :username)";

        $fileName = $data['gambar']['name'];
        $uploadDirectory = "../app/upload/buku/";
        $filePath = $uploadDirectory . $fileName;

        move_uploaded_file($data['gambar']['tmp_name'], $filePath);

        $this->db->query($query);
        $this->db->bind('id_buku', $data['id_buku']);
        $this->db->bind('judul', $data['judul']);
        $this->db->bind('kategori', $data['kategori']);
        $this->db->bind('isi_buku', $data['isi_buku']);
        $this->db->bind('gambar', $fileName);
        $this->db->bind('username', $data['username']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusDataBuku($id){
        $query = "DELETE FROM artikel WHERE id_buku = :id";

        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function ubahDataBuku($data){

        $this->db->query("SELECT gambar FROM artikel WHERE id_buku = :id_buku");
        $this->db->bind('id_buku', $data['id_buku']);
        $result = $this->db->single(); 

        $gambarLama = $result ? $result['gambar'] : null;

        $query = "UPDATE artikel SET 
        judul = :judul,
        kategori = :kategori,
        isi_buku = :isi_buku,
        gambar = :gambar,
        username = :username
        WHERE id_buku = :id_buku";

    // Handle file upload jika ada file baru
    if(isset($data['gambar']) && $data['gambar']['error'] === 0) {
        $fileName = $data['gambar']['name'];
        $uploadDirectory = "../app/upload/buku/";
        $filePath = $uploadDirectory . $fileName;
        move_uploaded_file($data['gambar']['tmp_name'], $filePath);
    } else {
        $fileName = $gambarLama;
    }

    $this->db->query($query);
    $this->db->bind('judul', $data['judul']);
    $this->db->bind('kategori', $data['kategori']); // Sesuaikan dengan query
    $this->db->bind('isi_buku', $data['isi_buku']);
    $this->db->bind('gambar', $fileName);
    $this->db->bind('username', $data['username']);
    $this->db->bind('id_buku', $data['id_buku']);

    $this->db->execute();
    return $this->db->rowCount();
    }

    public function cariAllBuku(){
        $keyword = $_POST['keyword'];

        $query = "SELECT * FROM artikel WHERE judul LIKE :keyword";

        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");
        return $this->db->resultset();
    }
}