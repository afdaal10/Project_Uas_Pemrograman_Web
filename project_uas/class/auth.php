<?php
// WAJIB ADA TAG <?php DI ATAS TANPA SPASI

class Auth {
    private $db;

    public function __construct($db_conn) {
        $this->db = $db_conn;
    }

    public function login($username, $password) {
        $username = $this->db->real_escape_string($username);
        $password = $this->db->real_escape_string($password);

        // Query ke tabel user (pastikan tabel sudah ada di phpMyAdmin)
        $sql = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
        $result = $this->db->query($sql);

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            $_SESSION['is_login'] = true;
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'];

            // Redirect ke folder UAS baru
            header("Location: /PROJECT_UAS/home");
            exit;
        } else {
            return "Username atau Password salah!";
        }
    }

    public function isLoggedIn() {
        return isset($_SESSION['is_login']) && $_SESSION['is_login'] === true;
    }

    public function logout() {
        session_unset();
        session_destroy();
        header("Location: /PROJECT_UAS/login");
        exit;
    }
}