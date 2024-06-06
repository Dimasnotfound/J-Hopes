<?php 

class DetailPanti extends Controller {

    private $detailPantiModel;

    public function __construct()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        // Membuat objek model Detail_panti
        $this->detailPantiModel = $this->model('Detail_panti_model');
    }

    public function index($urlIdPanti = '')
    {
      
      	if (isset($_GET['id'])){
        	$urlIdPanti = $_GET['id'];
        }

        $data['judul'] = 'Detail Panti';
        $data['css'] = 'Detail-Panti';
        if (isset($_SESSION['user_status'])) {
            $userStatus = $_SESSION['user_status'];
        } else {
            $userStatus = '';
        }


        $decodedUrlIdPanti = str_replace('_', ' ', urldecode($urlIdPanti));

        $data['detailPanti'] = $this->detailPantiModel->getPantiByUrl($decodedUrlIdPanti);

        $data['tipePanti'] = $this->detailPantiModel->getTipePantiById($data['detailPanti']['id_tipe_panti']);
        // var_dump($data['tipePanti']);

        $data['provinsi'] = $this->detailPantiModel->getProvinsiById($data['detailPanti']['id_provinsi']);
        // var_dump($data['provinsi']);

        $data['kabupatenKota'] = $this->detailPantiModel->getKabupatenKotaById($data['detailPanti']['id_kabupatenkota']);
        // var_dump($data['kabupatenKota']);

        $data['kecamatan'] = $this->detailPantiModel->getKecamatanById($data['detailPanti']['id_kecamatan']);
        // var_dump($data['kecamatan']);

        $data['kebutuhan'] = $this->detailPantiModel->getKebuthanPantiById($data['detailPanti']['id_kebutuhan_panti']);
        // var_dump($data['kebutuhan']);

        // DROPDOWN TIPE PANTI
        if ($userStatus === 'admin') {
            $data['dropTipePanti'] = $this->detailPantiModel->getTipePanti();
            $data['dropkecamatan'] = $this->detailPantiModel->getKecamatan();
            $data['dropKebutuhan'] = $this->detailPantiModel->getKebutuhan();

            

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Ambil data dari formulir
                $nama_panti = $_POST['nama_panti'];
                $id_tipe_panti = $_POST['id_tipe_panti'];
                $no_telp_panti = $_POST['no_telp_panti'];
                $nama_pemilik = $_POST['nama_pemilik'];
                $no_telp_pemilik_panti = $_POST['no_telp_pemilik_panti'];
                $deskripsi_panti = $_POST['deskripsi_panti'];
                $alamat = $_POST['alamat'];
                $id_kecamatan = $_POST['id_kecamatan'];
                $id_kebutuhan_panti = $_POST['id_kebutuhan_panti'];
                $deskripsi_kebutuhan_panti = $_POST['deskripsi_kebutuhan_panti'];
                $jumlah_pengurus = $_POST['jumlah_pengurus'];
                $jumlah_anak_asuh = $_POST['jumlah_anak_asuh'];
                $namapemilik_rekening = $_POST['namapemilik_rekening'];
                $nama_bank = $_POST['nama_bank'];
                $no_rekening = $_POST['no_rekening'];
                $panti_id = $data['detailPanti']['id_panti'];

                $data['tes'] = $this->detailPantiModel->UpdateDataPanti($nama_panti,$id_tipe_panti,$no_telp_panti,$nama_pemilik,$no_telp_pemilik_panti,$deskripsi_panti,$alamat,$id_kecamatan,$id_kebutuhan_panti,$deskripsi_kebutuhan_panti,$jumlah_pengurus,$jumlah_anak_asuh,$namapemilik_rekening,$nama_bank,$no_rekening,$panti_id);


                header("Location: " .BASEURL. "/?controller=DetailPanti&id=". urldecode($urlIdPanti));
                exit();



            } else {
            }

        } else {
        }

        // var_dump($_POST);
        
        
        $this->view('templates/header', $data);
        $this->view('DetailPanti/index', $data);
    }
}
