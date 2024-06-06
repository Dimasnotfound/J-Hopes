<?php 

class Cari extends Controller {
    public function index()
    {
        $data['css'] = 'cari';
        $data['judul'] = 'Cari Panti';
        $model = $this->model('CariModel');

        // Get data kecamatan
        $data['namaKecamatan'] = $model->getKecamatanData();

        // Handle form submission
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $kecamatan = isset($_POST['kecamatan']) ? $_POST['kecamatan'] : '';

            if (isset($_POST['id_panti'])) {
                $id_panti = $_POST['id_panti'];
                
                $id_panti = (int)$id_panti;
                
                $this->model('Home_Model')->hapusPanti($id_panti);
                header("Location: " . BASEURL . "/?controller=Cari");
                exit();
            }


            if (empty($kecamatan)) {
                $data['profilPanti'] = $model->getPanti();
                
            } else {
                $data['profilPanti'] = $model->getPantiByKecamatan($kecamatan);

                // Check if there is no data for the selected kecamatan
                if (empty($data['profilPanti'])) {
                    $data['noDataMessage'] = 'Tidak ada data untuk kecamatan yang dipilih.';
                }
            }
        } else {
            // If not a POST request, get all panti data
            $data['profilPanti'] = $model->getPanti();
        }

        // Pass the model to the view
        $this->view('templates/header', $data);
        $this->view('Cari/index', $data);
    }

}
?>