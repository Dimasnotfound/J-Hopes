<?php 

class Kabar extends Controller {
    public function index()
    {
        // Buat objek model Home_Model
        $homeModel = $this->model('Kabar_Model');
        

        $data['kegiatan'] = $homeModel->getBerita();
        $data['daftarpanti'] = $homeModel->getNamaPanti();

        if (isset($_POST['buatnamakegiatan'], $_POST['buatdeskripsi'], $_POST['buatid_profilpanti'], $_POST['buattanggal'])) {
            // Tangkap data dari form
            $namaKegiatan = $_POST['buatnamakegiatan'];
            $deskripsi = $_POST['buatdeskripsi'];
            $idProfilPanti = (int)$_POST['buatid_profilpanti'];
            $tanggal = $_POST['buattanggal'];

            // Simpan data kegiatan ke database
            $tes = $this->model('Home_Model')->saveData($namaKegiatan, $deskripsi, $idProfilPanti, $tanggal);


            // Redirect ke halaman yang sesuai
            header("Location: " . BASEURL . "/?controller=Kabar");
            exit();
        } elseif (isset($_POST['namakegiatan'], $_POST['deskripsi'], $_POST['tanggal'])) {
            $id_kegiatan = $_POST['id_kegiatan'];
            $namakegiatan = $_POST['namakegiatan'];
            $deskripsi = $_POST['deskripsi'];
            $tanggal = $_POST['tanggal'];

            $this->model('Home_Model')->updateKabar($id_kegiatan, $namakegiatan, $deskripsi, $tanggal);


            header("Location: " . BASEURL . "/?controller=Kabar");
            exit();
        } elseif (isset($_POST['id_kegiatan'])) {
            
            $id_kegiatan = $_POST['id_kegiatan'];
            $id_kegiatan = (int)$id_kegiatan;

            // Panggil fungsi hapusKegiatan dari model Kabar_model
            $this->model('Home_Model')->hapusKegiatan($id_kegiatan);

            // Redirect ke halaman kabar setelah menghapus
            header("Location: " . BASEURL . "/?controller=Kabar");
            exit();
        } else {
        }

        $data['judul'] = 'Kabar Panti';
        $data['css'] = 'kabar';
        $this->view('templates/header', $data);
        $this->view('kabar/index',$data);
    }
}