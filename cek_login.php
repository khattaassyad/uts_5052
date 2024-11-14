<?php
session_start();
require 'config.php';

$username = $_POST['username'];
$password = $_POST['password'];

if (!empty($username) && !empty($password)) {
    $query = mysqli_query($koneksi, "SELECT * FROM users WHERE username = '$username' AND password = '$password'");
    $user = mysqli_fetch_assoc($query);

    if ($user) {
        $_SESSION['login'] = true;
        $_SESSION['username'] = $username;
        header("Location: dosen.php"); 
        exit;
    } else {
        $_SESSION['error'] = "Username atau password salah.";
        header("Location: login.php");
        exit;
    }
} else {
    $_SESSION['error'] = "Username dan password harus diisi.";
    header("Location: login.php");
    exit;
}
?>
