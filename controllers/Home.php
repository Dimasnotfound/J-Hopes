<?php 

class Home extends Controller {

    public function index()
    {
        // Buat objek model Home_Model
        $homeModel = $this->model('Home_Model');

        // Dapatkan 3 data dari model
        $data['profilPanti'] = $homeModel->getPanti();

        $data['kegiatan'] = $homeModel->getBerita();

        $data['nama'] = $this->model('User_model')->getUser();

        // Data untuk view
        $data['judul'] = 'Home';
        $data['nama'] = $this->model('User_model')->getUser();
        $data['css'] = 'home';

        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            if (isset($_POST['namakegiatan'], $_POST['deskripsi'], $_POST['tanggal'])) {
                $id_kegiatan = $_POST['id_kegiatan'];
                $namakegiatan = $_POST['namakegiatan'];
                $deskripsi = $_POST['deskripsi'];
                $tanggal = $_POST['tanggal'];
    
                $this->model('Home_Model')->updateKabar($id_kegiatan, $namakegiatan, $deskripsi, $tanggal);
    
    
                header("Location: " . BASEURL . "/?controller=Home");
                exit();
            }
            
            if (isset($_POST['id_kegiatan'])) {
                $id_kegiatan = $_POST['id_kegiatan'];
                $id_kegiatan = (int)$id_kegiatan;
                $this->model('Home_Model')->hapusKegiatan($id_kegiatan);
            }

            
    
            if (isset($_POST['id_panti'])) {
                $id_panti = $_POST['id_panti'];
                
                $id_panti = (int)$id_panti;
                
                $this->model('Home_Model')->hapusPanti($id_panti);
            }
           
            // Hanya akan sampai sini jika ada data POST yang dikirim
            header("Location: " . BASEURL . "/?controller=Home");
            exit();
        } else {
        }


        // Tampilkan views
        $this->view('templates/header', $data);
        $this->view('home/index', $data); // Mengirimkan data profilPanti ke view
        $this->view('templates/footer', $data);
    }
}