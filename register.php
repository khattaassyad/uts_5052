<?php
session_start();
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (!empty($username) && !empty($password)) {
        // Menyimpan password tanpa hashing
        $query = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
        if (mysqli_query($koneksi, $query)) {
            $_SESSION['success'] = "Registrasi berhasil! Silakan login.";
            header("Location: login.php");
            exit;
        } else {
            $_SESSION['error'] = "Terjadi kesalahan saat registrasi.";
        }
    } else {
        $_SESSION['error'] = "Username dan password tidak boleh kosong.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <style>
         body {
        font-family: Arial, sans-serif;
        background-color: #ebf9fb;
        padding: 50px;
        text-align: center;
      }
      h2 {
        margin-top: 0;
        color: #333;
        text-align: center;
      }
      form {
        background-color: #fff;
        padding: 40px;
        border-radius: 5px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        display: grid;
        grid-template-columns: 1fr;
        gap: 20px;
        max-width: 300px;
        margin: 0 auto;
      }
      label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
        color: #333;
      }
      input[type="text"],
      input[type="password"] {
        border: 1px solid #ccc;
        border-radius: 5px;
        padding: 10px;
        width: 100%;
      }
      button[type="submit"] {
        background-color: #2aa7e2;
        color: #fff;
        border: none;
        border-radius: 5px;
        padding: 10px;
        cursor: pointer;
        align-self: center;
      }
      button[type="submit"]:hover {
        background-color: #45a049;
      }
    </style>
</head>
<body>
    <h2>Form Sign up</h2>
    <p>Buat Username & password anda !!!</p>

    <?php
    if (isset($_SESSION['error'])) {
        echo "<p style='color:red'>" . $_SESSION['error'] . "</p>";
        unset($_SESSION['error']);
    }
    ?>

    <form method="POST">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required />

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required />

        <button type="submit">Submit</button>
        <a href="#">Forgot Password?</a>
        <p><a href="login.php">Login</a></p>
    </form>
</body>
</html>
