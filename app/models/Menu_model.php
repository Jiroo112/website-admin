<?php

class Menu_model{
    private $table = 'menu';
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function getAllMenu(){
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultset();
    }

    public function getMenuById($id){
        $query = "SELECT * FROM menu WHERE id_menu = :id";

        $this->db->query($query);
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function getIdMenu(){
        $this->db->query('SELECT MAX(id_menu) AS id_terbesar FROM menu');
        return $this->db->single();
    }

    public function tambahDataMenu($data){
        $query = "INSERT INTO menu VALUES (:id_menu, :nama_menu, :kategori, :protein, :karbohidrat, :lemak, :kalori, :resep, :gambar ,:satuan)";

        $fileName = $data['gambar']['name'];
        $uploadDirectory = "../app/upload/menu/";
        $filePath = $uploadDirectory . $fileName;

        move_uploaded_file($data['gambar']['tmp_name'], $filePath);

        $this->db->query($query);
        $this->db->bind('id_menu', $data['id_menu']);
        $this->db->bind('nama_menu', $data['nama_menu']);
        $this->db->bind('kategori', $data['kategori_menu']);
        $this->db->bind('protein', $data['protein']);
        $this->db->bind('karbohidrat', $data['karbohidrat']);
        $this->db->bind('lemak', $data['lemak']);
        $this->db->bind('kalori', $data['kalori']);
        $this->db->bind('resep', $data['resep']);
        $this->db->bind('gambar', $fileName);
        $this->db->bind('satuan', $data['satuan']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusDataMenu($id){
        $query = "DELETE FROM menu WHERE id_menu = :id";

        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function ubahDataMenu($data){

        $this->db->query("SELECT gambar FROM menu WHERE id_menu = :id_menu");
        $this->db->bind('id_menu', $data['id_menu']);
        $result = $this->db->single(); 

        $gambarLama = $result ? $result['gambar'] : null;

        $query = "UPDATE menu SET 
        nama_menu = :nama_menu,
        kategori_menu = :kategori,
        protein = :protein,
        karbohidrat = :karbohidrat,
        lemak = :lemak,
        kalori = :kalori,
        resep = :resep,
        gambar = :gambar,
        satuan = :satuan
        WHERE id_menu = :id_menu";

    // Handle file upload jika ada file baru
    if(isset($data['gambar']) && $data['gambar']['error'] === 0) {
        $fileName = $data['gambar']['name'];
        $uploadDirectory = "../app/upload/menu";
        $filePath = $uploadDirectory . $fileName;
        move_uploaded_file($data['gambar']['tmp_name'], $filePath);
    } else {
        $fileName = $gambarLama;
    }

    $this->db->query($query);
    $this->db->bind('nama_menu', $data['nama_menu']);
    $this->db->bind('kategori', $data['kategori_menu']); // Sesuaikan dengan query
    $this->db->bind('protein', $data['protein']);
    $this->db->bind('karbohidrat', $data['karbohidrat']);
    $this->db->bind('lemak', $data['lemak']);
    $this->db->bind('kalori', $data['kalori']);
    $this->db->bind('resep', $data['resep']);
    $this->db->bind('gambar', $fileName);
    $this->db->bind('satuan', $data['satuan']);
    $this->db->bind('id_menu', $data['id_menu']);

    $this->db->execute();
    return $this->db->rowCount();
    }

    public function cariAllMenu(){
        $keyword = $_POST['keyword'];

        $query = "SELECT * FROM menu WHERE nama_menu LIKE :keyword";

        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");
        return $this->db->resultset();
    }

    public function filter(){
        $keyword = $_POST['filter'];

    // Jika filter adalah 'all', ambil semua data
    if ($keyword == "all") {
        $query = "SELECT * FROM menu";
    } else {
        $query = "SELECT * FROM menu WHERE kategori_menu LIKE :filter";
    }

    $this->db->query($query);

    // Hanya bind jika bukan 'all'
    if ($keyword != "all") {
        $this->db->bind('filter', "%$keyword%");
    }

    return $this->db->resultset();
    }
}