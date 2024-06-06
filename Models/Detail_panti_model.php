<?php

class Detail_panti_model
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getPantiByUrl($decodedUrlIdPanti)
    {
        $this->db->query('SELECT * FROM profil_panti WHERE id_panti = :url_idpanti ');
        $this->db->bind(':url_idpanti', $decodedUrlIdPanti);

        return $this->db->single(); // Adjust according to your query method in the Database class
    }

    public function getTipePantiById($id)
    {
        $this->db->query('SELECT tipe_panti FROM tipe_panti WHERE id_tipe_panti = :id');
        $this->db->bind(':id', $id);

        return $this->db->single();
    }

    public function getProvinsiById($id)
    {
        $this->db->query('SELECT nama_provinsi FROM provinsi WHERE id_provinsi = :id');
        $this->db->bind(':id', $id);

        return $this->db->single();
    }

    public function getKabupatenKotaById($id)
    {
        $this->db->query('SELECT nama FROM kota WHERE id_kabupatenkota = :id');
        $this->db->bind(':id', $id);

        return $this->db->single();
    }

    public function getKecamatanById($id)
    {
        $this->db->query('SELECT nama_kecamatan FROM kecamatan WHERE id_kecamatan = :id');
        $this->db->bind(':id', $id);

        return $this->db->single();
    }

    public function getKebuthanPantiById($id)
    {
        $this->db->query('SELECT nama_kebutuhan FROM kebutuhan_panti WHERE id_kebutuhan_panti = :id');
        $this->db->bind(':id', $id);

        return $this->db->single();
    }

    public function getDatabyKegiatan($pram)
    {
        $this->db->query('SELECT * FROM kegiatan WHERE nama_kegiatan = :pram');
        $this->db->bind(':pram', $pram);

        return $this->db->single();
    }

    public function getnamaPantibyId($id)
    {
        $this->db->query('SELECT nama_panti FROM profil_panti WHERE id_panti = :id');
        $this->db->bind(':id', $id);

        return $this->db->single();
    }

    public function getTipePanti()
    {
        $this->db->query('SELECT * FROM tipe_panti');
        $result = $this->db->resultSet();
        return $result;
    }

    public function getKecamatan()
    {
        $this->db->query('SELECT * FROM kecamatan');
        $result = $this->db->resultSet();
        return $result;
    }

    public function getKebutuhan()
    {
        $this->db->query('SELECT * FROM kebutuhan_panti');
        $result = $this->db->resultSet();
        return $result;
    }

    public function UpdateDataPanti($nama_panti, $id_tipe_panti, $no_telp_panti, $nama_pemilik, $no_telp_pemilik_panti, $deskripsi_panti, $alamat, $id_kecamatan, $id_kebutuhan_panti, $deskripsi_kebutuhan_panti, $jumlah_pengurus, $jumlah_anak_asuh, $namapemilik_rekening, $nama_bank, $no_rekening, $panti_id)
{
    $this->db->query('UPDATE profil_panti SET
        nama_panti = :nama_panti,
        id_tipe_panti = :id_tipe_panti,
        no_telp_panti = :no_telp_panti,
        nama_pemilik = :nama_pemilik,
        no_telp_pemilik_panti = :no_telp_pemilik_panti,
        deskripsi_panti = :deskripsi_panti,
        alamat = :alamat,
        id_kecamatan = :id_kecamatan,
        id_kebutuhan_panti = :id_kebutuhan_panti,
        deskripsi_kebutuhan_panti = :deskripsi_kebutuhan_panti,
        jumlah_pengurus = :jumlah_pengurus,
        jumlah_anak_asuh = :jumlah_anak_asuh,
        namapemilik_rekening = :namapemilik_rekening,
        nama_bank = :nama_bank,
        no_rekening = :no_rekening
        WHERE id_panti = :panti_id');

    $this->db->bind(':nama_panti', $nama_panti);
    $this->db->bind(':id_tipe_panti', $id_tipe_panti);
    $this->db->bind(':no_telp_panti', $no_telp_panti);
    $this->db->bind(':nama_pemilik', $nama_pemilik);
    $this->db->bind(':no_telp_pemilik_panti', $no_telp_pemilik_panti);
    $this->db->bind(':deskripsi_panti', $deskripsi_panti);
    $this->db->bind(':alamat', $alamat);
    $this->db->bind(':id_kecamatan', $id_kecamatan);
    $this->db->bind(':id_kebutuhan_panti', $id_kebutuhan_panti);
    $this->db->bind(':deskripsi_kebutuhan_panti', $deskripsi_kebutuhan_panti);
    $this->db->bind(':jumlah_pengurus', $jumlah_pengurus);
    $this->db->bind(':jumlah_anak_asuh', $jumlah_anak_asuh);
    $this->db->bind(':namapemilik_rekening', $namapemilik_rekening);
    $this->db->bind(':nama_bank', $nama_bank);
    $this->db->bind(':no_rekening', $no_rekening);
    $this->db->bind(':panti_id', $panti_id);

    return $this->db->execute(); // Adjust according to your execute method in the Database class
}

public function SaveDataPanti($nama_panti, $id_tipe_panti, $no_telp_panti, $nama_pemilik, $no_telp_pemilik_panti, $deskripsi_panti, $alamat, $gmaps, $id_kecamatan, $id_kebutuhan_panti, $deskripsi_kebutuhan_panti, $jumlah_pengurus, $jumlah_anak_asuh, $namapemilik_rekening, $nama_bank, $no_rekening, $linkwa) {
    $this->db->query(
        'INSERT INTO profil_panti 
        (nama_panti, id_tipe_panti, no_telp_panti, nama_pemilik, no_telp_pemilik_panti, deskripsi_panti, alamat, link_gmap, id_kecamatan, id_kebutuhan_panti, deskripsi_kebutuhan_panti, jumlah_pengurus, jumlah_anak_asuh, namapemilik_rekening, nama_bank, no_rekening, no_wa, id_provinsi , id_kabupatenkota) 
        VALUES 
        (:nama_panti, :id_tipe_panti, :no_telp_panti, :nama_pemilik, :no_telp_pemilik_panti, :deskripsi_panti, :alamat, :gmaps, :id_kecamatan, :id_kebutuhan_panti, :deskripsi_kebutuhan_panti, :jumlah_pengurus, :jumlah_anak_asuh, :namapemilik_rekening, :nama_bank, :no_rekening, :linkwa, 1,1)'
    );

    $this->db->bind(':nama_panti', $nama_panti);
    $this->db->bind(':id_tipe_panti', $id_tipe_panti);
    $this->db->bind(':no_telp_panti', $no_telp_panti);
    $this->db->bind(':nama_pemilik', $nama_pemilik);
    $this->db->bind(':no_telp_pemilik_panti', $no_telp_pemilik_panti);
    $this->db->bind(':deskripsi_panti', $deskripsi_panti);
    $this->db->bind(':alamat', $alamat);
    $this->db->bind(':gmaps', $gmaps);
    $this->db->bind(':id_kecamatan', $id_kecamatan);
    $this->db->bind(':id_kebutuhan_panti', $id_kebutuhan_panti);
    $this->db->bind(':deskripsi_kebutuhan_panti', $deskripsi_kebutuhan_panti);
    $this->db->bind(':jumlah_pengurus', $jumlah_pengurus);
    $this->db->bind(':jumlah_anak_asuh', $jumlah_anak_asuh);
    $this->db->bind(':namapemilik_rekening', $namapemilik_rekening);
    $this->db->bind(':nama_bank', $nama_bank);
    $this->db->bind(':no_rekening', $no_rekening);
    $this->db->bind(':linkwa', $linkwa);

    // Execute the query
    $this->db->execute();
}


}
?>
