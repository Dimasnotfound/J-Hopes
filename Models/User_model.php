<?php
class User_model
{
    
    private $nama = '';
    
    private $db;
    
    public function __construct()
    {
        $this->db = new Database;
    }

    public function getUser()
    {
        return $this->nama;
    }

    public function getUserByEmail($email)
    {
        $this->db->query("SELECT * FROM daftar_akun WHERE email = :email");
        $this->db->bind(':email', $email);
        $user = $this->db->single();
    
        return $user;
    }

    public function login($email, $password)
    {
        $user = $this->getUserByEmail($email);

        if (!$user) {
            return false;
        }

        if ($password === $user['password']) {
            return $user;
        }

        return false;
    }


    public function signup($data)
    {
        $query = "INSERT INTO daftar_akun (nama, email, password, konfirmasi_password,status) VALUES (:nama, :email, :password, :konfirmasi_password,'user')";
        $this->db->query($query);
        $this->db->bind(':nama', $data['nama']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['password']);
        $this->db->bind(':konfirmasi_password', $data['konfirmasi_password']);

        return $this->db->execute();
    }

    public function getUserData($email, $username)
    {
        $query = ("SELECT * FROM daftar_akun WHERE email = :email AND nama = :username");
        $this->db->query($query);
        $this->db->bind(":email", $email);
        $this->db->bind(":username", $username);
        $result = $this->db->resultSet();

        return $result;
        }

        public function updateUserData($newUsername, $newEmail, $newPassword)
    {
        // UPDATE query
    $updateQuery = "UPDATE daftar_akun SET nama = :newUsername, email = :newEmail, password = :newPassword, konfirmasi_password = :newPassword  WHERE id_akun = :userId";

    // Bind values
    $this->db->query($updateQuery);
    $this->db->bind(':newUsername', $newUsername);
    $this->db->bind(':newEmail', $newEmail);
    $this->db->bind(':newPassword', $newPassword);
    $this->db->bind(':userId', $_SESSION['user_id']); 

    // Execute the UPDATE query
    $this->db->execute();

    // SELECT query to get the updated data
    $selectQuery = "SELECT * FROM daftar_akun WHERE id_akun = :userId";
    $this->db->query($selectQuery);
    $this->db->bind(':userId', $_SESSION['user_id']);

    // Execute the SELECT query
    $this->db->execute();

    // Return the result set
    return $this->db->resultSet(); // Menggunakan single() karena kita hanya mengambil satu baris data (user yang diupdate)
    }
    
    public function getDatauser()
    {
        $selectQuery = "SELECT * FROM daftar_akun WHERE id_akun = :userId";
        $this->db->query($selectQuery);
        $this->db->bind(':userId', $_SESSION['user_id']);

        // Execute the SELECT query
        $this->db->execute();

        // Return the result set
        return $this->db->resultSet();
    }


    
}