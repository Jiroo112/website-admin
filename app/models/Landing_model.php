<?php

class Landing_model{
    private $table = 'landing_content';
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function getAllContent(){
        $this->db->query('SELECT * FROM landing_content');
        return $this->db->resultset();
    }

    public function getAllFitur(){
        $this->db->query('SELECT * FROM fitur_and_testi');
        return $this->db->resultset();
    }

    public function updateDataHero($data){
        $this->db->query("SELECT resultsethero_image FROM landing_content");
        $result = $this->db->single(); 

        $gambarLama = $result ? $result['hero_image'] : null;

        $query = "UPDATE landing_content SET 
        hero_tittle = :hero_tittle,
        hero_cta = :hero_cta,
        hero_image = :hero_image";

    // Handle file upload jika ada file baru
    if(isset($data['gambar']) && $data['gambar']['error'] === 0) {
        $fileName = $data['gambar']['name'];
        $uploadDirectory = "../app/upload/landing/hero/";
        $filePath = $uploadDirectory . $fileName;
        move_uploaded_file($data['gambar']['tmp_name'], $filePath);
    } else {
        $fileName = $gambarLama;
    }

    $this->db->query($query);
    $this->db->bind('hero_tittle', $data['hero_tittle']);
    $this->db->bind('hero_cta', $data['hero_cta']); // Sesuaikan dengan query
    $this->db->bind('hero_image', $fileName);

    $this->db->execute();
    return $this->db->rowCount();
    }

    public function updateDataAbout($data){
        $this->db->query("SELECT about_image FROM landing_content");
        $result = $this->db->single(); 

        $gambarLama = $result ? $result['about_image'] : null;

        $query = "UPDATE landing_content SET 
        about_title = :about_title,
        about_image = :about_image,
        about_description = :about_description,
        android_download = :android_download,
        ios_download = :ios_download";


    // Handle file upload jika ada file baru
    if(isset($data['gambar']) && $data['gambar']['error'] === 0) {
        $fileName = $data['gambar']['name'];
        $uploadDirectory = "../app/upload/landing/about/";
        $filePath = $uploadDirectory . $fileName;
        move_uploaded_file($data['gambar']['tmp_name'], $filePath);
    } else {
        $fileName = $gambarLama;
    }

    $this->db->query($query);
    $this->db->bind('about_title', $data['about_title']);
    $this->db->bind('about_image', $fileName);
    $this->db->bind('about_description', $data['about_description']);
    $this->db->bind('android_download', $data['android_download']);
    $this->db->bind('ios_download', $data['ios_download']);

    $this->db->execute();
    return $this->db->rowCount();
    }

    public function updateFitur($data){
        $this->db->query("SELECT hero_image, subhero1_img, subhero2_img, subhero3_img, subhero4_img FROM fitur_and_testi");
        $result = $this->db->resultset(); 

        $gambarLama1 = $result ? $result[0]['hero_image'] : null;
        $gambarLama2 = $result ? $result[0]['subhero1_img'] : null;
        $gambarLama3 = $result ? $result[0]['subhero2_img'] : null;
        $gambarLama4 = $result ? $result[0]['subhero3_img'] : null;
        $gambarLama5 = $result ? $result[0]['subhero4_img'] : null;



        $query = "UPDATE fitur_and_testi SET 
        hero_tittle = :hero_tittle,
        hero_cta = :hero_cta,
        hero_image = :hero_image,
        subhero1_img = :subhero1_img,
        subhero2_img = :subhero2_img,
        subhero3_img = :subhero3_img,
        subhero4_img = :subhero4_img,
        desc_subhero1 = :desc_subhero1,
        desc_subhero2 = :desc_subhero2,
        desc_subhero3 = :desc_subhero3,
        desc_subhero4 = :desc_subhero4";

    // Handle file upload jika ada file baru
    if(isset($data['gambar']) && $data['gambar']['error'] === 0) {
        $fileName1 = $data['gambar']['name'];
        $uploadDirectory = "../app/upload/landing/hero_image/";
        $filePath = $uploadDirectory . $fileName1;
        move_uploaded_file($data['gambar']['tmp_name'], $filePath);
    } else {
        $fileName1 = $gambarLama1;
    }

    if(isset($data['gambar2']) && $data['gambar2']['error'] === 0) {
        $fileName2 = $data['gambar2']['name'];
        $uploadDirectory = "../app/upload/landing/subhero1_img/";
        $filePath = $uploadDirectory . $fileName2;
        move_uploaded_file($data['gambar2']['tmp_name'], $filePath);
    } else {
        $fileName2 = $gambarLama2;
    }

    if(isset($data['gambar3']) && $data['gambar3']['error'] === 0) {
        $fileName3 = $data['gambar3']['name'];
        $uploadDirectory = "../app/upload/landing/subhero2_img/";
        $filePath = $uploadDirectory . $fileName3;
        move_uploaded_file($data['gambar3']['tmp_name'], $filePath);
    } else {
        $fileName3 = $gambarLama3;
    }

    if(isset($data['gambar4']) && $data['gambar4']['error'] === 0) {
        $fileName4 = $data['gambar4']['name'];
        $uploadDirectory = "../app/upload/landing/subhero3_img/";
        $filePath = $uploadDirectory . $fileName4;
        move_uploaded_file($data['gambar4']['tmp_name'], $filePath);
    } else {
        $fileName4 = $gambarLama4;
    }

    if(isset($data['gambar5']) && $data['gambar5']['error'] === 0) {
        $fileName5 = $data['gambar5']['name'];
        $uploadDirectory = "../app/upload/landing/subhero4_img/";
        $filePath = $uploadDirectory . $fileName5;
        move_uploaded_file($data['gambar5']['tmp_name'], $filePath);
    } else {
        $fileName5 = $gambarLama5;
    }

    $this->db->query($query);
    $this->db->bind('hero_tittle', $data['fitur_title']);
    $this->db->bind('hero_cta', $data['fitur_cta']);
    $this->db->bind('hero_image', $fileName1);
    $this->db->bind('subhero1_img', $fileName2);
    $this->db->bind('subhero2_img', $fileName3);
    $this->db->bind('subhero3_img', $fileName4);
    $this->db->bind('subhero4_img', $fileName5);
    $this->db->bind('desc_subhero1', $data['desc_subhero1']);
    $this->db->bind('desc_subhero2', $data['desc_subhero2']);
    $this->db->bind('desc_subhero3', $data['desc_subhero3']);
    $this->db->bind('desc_subhero4', $data['desc_subhero4']);


    $this->db->execute();
    return $this->db->rowCount();
    }
}