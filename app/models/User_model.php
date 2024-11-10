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
        $this->db->query('SELECT * FROM'. $this->table. 'WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }
}