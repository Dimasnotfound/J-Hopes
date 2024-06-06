<?php 

class Profile extends Controller {
    private $userModel;

    public function __construct()
    {
        $this->userModel = $this->model('User_model');
    }

public function index()
{
    
    
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    $email = $_SESSION['user_email'];
    $username = $_SESSION['user_name'];

    $data['profile'] = $this->userModel->getUserData($email, $username);
    
    $data['profile'] = $this->userModel->getDatauser();

    

    

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Periksa apakah sesi sudah dimulai
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        // Peroleh data dari formulir yang diposting
        $newUsername = $_POST['new_username'] ?? '';
        $newEmail = $_POST['new_email'] ?? '';
        $newPassword = $_POST['new_password'] ?? '';
        $confirmPassword = $_POST['confirm_password'] ?? '';

        if ($newPassword == $confirmPassword) {
            // Panggil metode pada model untuk melakukan update profil
            $data['updateProfile'] = $this->userModel->updateUserData($newUsername, $newEmail, $newPassword);

            header("Location: " . BASEURL . "/?controller=Profile");

        } else {
            echo "<script>alert('Password tidak sama!')</script>";
        }
    } else {
    }
    $data['judul'] = 'Profile';
    $data['css'] = 'profile'; 
    $this->view('templates/header', $data);
    $this->view('Profile/index' ,$data);
}
}