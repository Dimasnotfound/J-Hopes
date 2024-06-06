<?php
class CariModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getKecamatan() {
        $sql = "SELECT * FROM kecamatan";
        $this->db->query($sql);
        return $this->db->resultSet();
    }

    public function getPantiByKecamatan($kecamatan) {
        $sql = "SELECT * FROM profil_panti WHERE id_kecamatan = :kecamatan";
        $this->db->query($sql);
        $this->db->bind(':kecamatan', $kecamatan);
        $result = $this->db->resultSet();
        return $result;
    }

    public function getPanti() {
        $sql = "SELECT * FROM profil_panti";
        $this->db->query($sql);
        $result = $this->db->resultSet();
        return $result;
    }

    public function getKecamatanbyId($id)
    {
        $sql = "SELECT nama_kecamatan FROM kecamatan WHERE id_kecamatan = :id";
        $this->db->query($sql);
        $this->db->bind(':id', $id);
        $result = $this->db->resultSet();
        return $result;
    }


    public function getKecamatanData()
    {
        $sql = "SELECT * FROM kecamatan";
        $this->db->query($sql);
        $result = $this->db->resultSet();
        return $result;
    }
}
?>
