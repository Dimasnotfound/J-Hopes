<?php 

class Kabar_Model{

    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getBerita(){
        $sql = "SELECT * FROM kegiatan";
        $this->db->query($sql);
        $result = $this->db->resultSet();
        return $result;
    }

    public function getNamaPanti(){
        $sql = "SELECT id_panti,nama_panti FROM profil_panti";
        $this->db->query($sql);
        $result = $this->db->resultSet();
        return $result;
    }

}