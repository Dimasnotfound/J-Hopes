<?php

class SignUp extends Controller
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = $this->model('User_model');
    }

    public function index()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            // Validasi semua field diisi
            if (empty($_POST['nama']) || empty($_POST['email']) || empty($_POST['password']) || empty($_POST['retypepassword'])) {
                echo '<script>alert("Isi semua field.");</script>';
                exit;
            }

            $data = [
                'nama' => trim($_POST['nama']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'konfirmasi_password' => trim($_POST['retypepassword'])
            ];

            // Validasi password
            if ($data['konfirmasi_password'] === $data['password']) {
                $this->userModel->signup($data);
                header('location: ' . BASEURL . '/?controller=SignIn');
                exit;
            } else {
                echo '<script>alert("Password Tidak Sama");</script>';
            }
        }

        $data['judul'] = 'Sign Up';
        $data['css'] = 'signup';
        $this->view('templates/header', $data);
        $this->view('SignUp/index');
    }
}