<?php

class DashboardModel {
    private $db;

    public function __construct() {
        $this->db = new Database(); 
    }

    public function getTotalMenu() {
        $this->db->query('SELECT COUNT(*) as total FROM menu');
        return $this->db->resultset();
    }

    public function getTotalPengguna() {
        $this->db->query('SELECT COUNT(*) as total FROM data_pengguna');
        return $this->db->resultset();
    }

    public function getTotalArtikel() {
        $this->db->query('SELECT COUNT(*) as total FROM artikel');
        return $this->db->resultset();
    }
    public function getTotalOlahraga() {
        $this->db->query('SELECT COUNT(*) as total FROM olahraga');
        return $this->db->resultset();
    }
    public function getTotalKonsultan() {
        $this->db->query('SELECT COUNT(*) as total FROM konsultan');
        return $this->db->resultset();
    }
    
    public function getAllArticles(){
        $this->db->query('SELECT * FROM artikel');
        return $this->db->resultset();
    }
}