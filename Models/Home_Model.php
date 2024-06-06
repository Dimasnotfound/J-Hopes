<?php

class Home_Model {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getPanti(){
        $sql = "SELECT * FROM profil_panti LIMIT 6";
        $this->db->query($sql);
        $result = $this->db->resultSet();
        return $result;
    }

    public function getBerita(){
        $sql = "SELECT * FROM kegiatan LIMIT 6";
        $this->db->query($sql);
        $result = $this->db->resultSet();
        return $result;
    }

    public function hapusKegiatan($id){
        $sql = "DELETE FROM kegiatan WHERE id_kegiatan = :id_kegiatan";
        
        $this->db->query($sql);
        $this->db->bind(':id_kegiatan', $id, PDO::PARAM_INT);
        $this->db->execute();
    }

    public function hapusPanti($id){
        // First, delete from the 'kegiatan' table
        $sql1 = "DELETE FROM kegiatan WHERE id_profilpanti = :id_panti";
        $this->db->query($sql1);
        $this->db->bind(':id_panti', $id, PDO::PARAM_INT);
        $this->db->execute();
    

        $sql2 = "DELETE FROM profil_panti WHERE id_panti = :id_panti";
        $this->db->query($sql2);
        $this->db->bind(':id_panti', $id, PDO::PARAM_INT);
        $this->db->execute();
    }

    public function updateKabar($id_kegiatan, $namakegiatan, $deskripsi, $tanggal){
        $query = "UPDATE kegiatan SET nama_kegiatan = :namakegiatan, deskripsi = :deskripsi, tanggal = :tanggal WHERE id_kegiatan = :id_kegiatan";
        $this->db->query($query);
        $this->db->bind(':id_kegiatan', $id_kegiatan);
        $this->db->bind(':namakegiatan', $namakegiatan);
        $this->db->bind(':deskripsi', $deskripsi);
        $this->db->bind(':tanggal', $tanggal);

        // Eksekusi query
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
  
  public function saveData($namaKegiatan, $deskripsi, $idProfilPanti, $tanggal){
      $sql = "INSERT INTO kegiatan (nama_kegiatan, deskripsi, id_profilpanti, tanggal, gambar_kegiatan) VALUES (:namaKegiatan, :deskripsi, :idProfilPanti, :tanggal, NULL)";
      $this->db->query($sql);

      // Bind parameter ke statement SQL
      $this->db->bind(':namaKegiatan', $namaKegiatan);
      $this->db->bind(':deskripsi', $deskripsi);
      $this->db->bind(':idProfilPanti', $idProfilPanti); // Sesuaikan dengan nama parameter yang benar
      $this->db->bind(':tanggal', $tanggal);

      // Eksekusi statement SQL
      if ($this->db->execute()) {
          return 'bagus';
      } else {
          return 'tidak';
      }

  }

    
}
?>