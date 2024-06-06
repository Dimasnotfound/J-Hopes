<?php

class SignIn extends Controller
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = $this->model('User_model');
    }

    public function index()
    {
        if (session_status() == PHP_SESSION_NONE) { //jika belum ada session maka start session
            session_start();
        }

        // Jika sudah login, redirect ke halaman lain
        if (isset($_SESSION['user_id'])) {      //jika sudah ada user maka halaman login tidak akan ditampilkan dan diarahkan ke halaman lain
            header('location: ' . BASEURL . '/?controller=Home');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password'])
            ];

            $user = $this->userModel->login($data['email'], $data['password']);

            if ($user) {
                $_SESSION['user_id'] = $user['id_akun'];
                $_SESSION['user_email'] = $user['email'];
                $_SESSION['user_name'] = $user['nama'];
                $_SESSION['user_status'] = $user['status'];
                header('location: ' . BASEURL . '/?controller=Home');
                exit;
            } else {
                echo '<script>alert("Password/email salah.");</script>';
            }
        }

        $data['judul'] = 'Sign In';
        $data['css'] = 'signin';
        $this->view('templates/header', $data);
        $this->view('SignIn/index');
    }
}