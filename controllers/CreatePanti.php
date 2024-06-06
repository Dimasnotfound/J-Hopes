<?php 

class CreatePanti extends Controller {

    private $detailPantiModel;

    public function __construct()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        // Membuat objek model Detail_panti
        $this->detailPantiModel = $this->model('Detail_panti_model');
    }

    public function index()
    {
        $data['judul'] = 'Buat Data Panti';
        $data['css'] = 'Detail-Panti';
        if (isset($_SESSION['user_status'])) {
            $userStatus = $_SESSION['user_status'];
        } else {
            $userStatus = '';
        }

        // DROPDOWN TIPE PANTI
        if ($userStatus === 'admin') {
            $data['dropTipePanti'] = $this->detailPantiModel->getTipePanti();
            $data['dropkecamatan'] = $this->detailPantiModel->getKecamatan();
            $data['dropKebutuhan'] = $this->detailPantiModel->getKebutuhan();

            

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Ambil data dari formulir
                $nama_panti = $_POST['nama_panti'];
                $id_tipe_panti = (int)$_POST['id_tipe_panti'];
                $no_telp_panti = $_POST['no_telp_panti'];
                $nama_pemilik = $_POST['nama_pemilik'];
                $no_telp_pemilik_panti = $_POST['no_telp_pemilik_panti'];
                $deskripsi_panti = $_POST['deskripsi_panti'];
                $alamat = $_POST['alamat'];
                $gmaps = $_POST['gmaps'];
                $id_kecamatan = (int)$_POST['id_kecamatan'];
                $id_kebutuhan_panti = (int)$_POST['id_kebutuhan_panti'];
                $deskripsi_kebutuhan_panti = $_POST['deskripsi_kebutuhan_panti'];
                $jumlah_pengurus = (int)$_POST['jumlah_pengurus'];
                $jumlah_anak_asuh = (int)$_POST['jumlah_anak_asuh'];
                $namapemilik_rekening = $_POST['namapemilik_rekening'];
                $nama_bank = $_POST['nama_bank'];
                $no_rekening = (int)$_POST['no_rekening'];
                $linkwa = $_POST['linkwa'];


                $data['tes'] = $this->model('Detail_panti_model')->SaveDataPanti($nama_panti,$id_tipe_panti,$no_telp_panti,$nama_pemilik,$no_telp_pemilik_panti,$deskripsi_panti,$alamat,$gmaps,$id_kecamatan,$id_kebutuhan_panti,$deskripsi_kebutuhan_panti,$jumlah_pengurus,$jumlah_anak_asuh,$namapemilik_rekening,$nama_bank,$no_rekening,$linkwa);


                header("Location: " . BASEURL. "/?controller=CreatePanti" );
                exit();



            } else {
            }

        } else {
        }

        // var_dump($_POST);
        
        
        $this->view('templates/header', $data);
        $this->view('CreatePanti/index', $data);
    }
}
