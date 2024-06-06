
<?php 

class ReadMoreAktivitasPanti extends Controller {

    private $detailPantiModel;

    public function __construct()
    {
        // Membuat objek model Detail_panti
        $this->detailPantiModel = $this->model('Detail_panti_model');
    }

public function index($urlKegiatan = '')
{
    if (isset($_GET['id'])){
      $urlKegiatan = $_GET['id'];
    }
  
    $data['judul'] = 'Readmore AktivitasPanti';
    $data['css'] = 'ReadMoreAktivitasPanti';
    $decodedUrlKegiatan = str_replace('_', ' ', urldecode($urlKegiatan));

    $data['Kegiatan'] = $this->detailPantiModel->getDatabyKegiatan($decodedUrlKegiatan);
    $data['namaPanti'] = $this->detailPantiModel->getnamaPantibyId($data['Kegiatan']['id_profilpanti']);
    
    

    $this->view('templates/header', $data);
    $this->view('ReadMoreAktivitasPanti/index',$data);

}
}
