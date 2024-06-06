<?php 

class About extends Controller{

    public function index()
    {
      
        $data['judul'] = 'About';
        $data['css'] = 'about';
        
       $this->view('templates/header', $data);
       $this->view('about/index', $data);
       $this->view('templates/footer', $data);
    }
    public function page()
    {
        $data['judul'] = 'Page';
        $this->view('templates/header',$data);
        $this->view('about/page');
        $this->view('templates/footer',$data);
    }
}