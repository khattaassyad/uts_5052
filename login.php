<?php
session_start();
require 'config.php';

if (isset($_SESSION['login'])) {
    header("Location: dosen.php"); 
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>
        body{
	font-family: sans-serif;
	background: #ebf9fb;
    }
    
    h1{
        text-align: center;
        font-weight: 300;
    }
    
    .tulisan_login{
        text-align: center;
        text-transform: uppercase;
    }
    
    .kotak_login{
        width: 350px;
        background: white;
        margin: 80px auto;
        padding: 30px 20px;
        box-shadow: 0px 0px 100px 4px #d6d6d6;
    }
    
    label{
        font-size: 11pt;
    }
    
    .form_login{
        box-sizing : border-box;
        width: 100%;
        padding: 10px;
        font-size: 11pt;
        margin-bottom: 20px;
    }
    
    .tombol_login{
        background: #2aa7e2;
        color: white;
        font-size: 11pt;
        width: 100%;
        border: none;
        border-radius: 3px;
        padding: 10px 20px;
    }
    
    .link{
        color: #232323;
        text-decoration: none;
        font-size: 10pt;
    }
    
    .alert{
        background: #e44e4e;
        color: white;
        padding: 10px;
        text-align: center;
        border:1px solid #b32929;
    }
        </style>
    </style>
</head>
<body>
    <h1>Login User</h1>
    <div class="kotak_login">
        <p class="tulisan_login">Silahkan login</p>

        <?php
            if (isset($_SESSION['error'])) {
                echo "<p style='color:red'>" . $_SESSION['error'] . "</p>";
                unset($_SESSION['error']);
            }
        ?>

        <form action="cek_login.php" method="post">
			<label>Username</label>
			<input type="text" name="username" class="form_login" placeholder="Username .." required="required">
 
			<label>Password</label>
			<input type="password" name="password" class="form_login" placeholder="Password .." required="required">
            <p>Don't have an account? <a href="register.php">Sign Up</a></p>
 
			<input type="submit" class="tombol_login" value="LOGIN">
 
			<br/>
			<br/>
		</form>
    </div>
</body>
</html>
