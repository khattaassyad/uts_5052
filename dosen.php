<?php
    // Include file koneksi
    include 'config.php';

    // session_start();
    
    //     // cek apakah yang mengakses halaman ini sudah login
    //     if($_SESSION['level']==""){
    //         header("location:iindex.php?pesan=gagal");
    //     }

    // Proses penyimpanan data jika form disubmit
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['update'])) {
            $nama = $_POST['nama'];
            $nilai = $_POST['nilai'];

            $sql = "UPDATE data_nilai SET nilai='$nilai' WHERE nama='$nama'";
            if ($koneksi->query($sql) === TRUE) {
                echo "Nilai berhasil diupdate!";
            } else {
                echo "Error: " . $sql . "<br>" . $koneksi->error;
            }
        }

        elseif (isset($_POST['delete'])) {
            $nama = $_POST['nama'];

            $sql = "DELETE FROM data_nilai WHERE nama='$nama'";
            if ($koneksi->query($sql) === TRUE) {
                echo "Mahasiswa berhasil dihapus!";
            } else {
                echo "Error: " . $sql . "<br>" . $koneksi->error;
            }
        }

        // create

        elseif (isset($_POST['create'])) {
            // Tambah mahasiswa
            $nama = $_POST['nama'];
            $nilai = $_POST['nilai'];

            $sql = "INSERT INTO data_nilai (nama, nilai) VALUES ('$nama', '$nilai')";
            if ($koneksi->query($sql) === TRUE) {
                echo "Data berhasil ditambahkan!";
            } else {
                echo "Error: " . $sql . "<br>" . $koneksi->error;
            }
        }
        
    }

    $result = $koneksi->query("SELECT * FROM data_nilai");
?>
<!DOCTYPE html>
<html>
<head>
	<title>dosen</title>
	<style>
        body {
            font-family: Arial, sans-serif;
            background-color: #ebf9fb;
            margin: 0;
            padding: 20px;
        }
        h2 {
            color: #333;
        }
        h3 {
            color: #555;
        }
        .container {
            display: flex;
            gap: 200px; /* Jarak antar form */
            margin-bottom: 20px;
        }
        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            width: 100%; /* Agar form menempati ruang yang sama */
        }
        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }
        input[type="text"], input[type="number"] {
            width: 70%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type="submit"] {
            background-color: #2aa7e2;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-right: 10px; /* Jarak antar tombol */
        }
        input[type="submit"]:hover {
            background-color: #0000FF;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
            margin-top: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            overflow: hidden; /* Untuk rounded corners pada tabel */
        }
        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #2aa7e2;
            color: white;
        }
        tr:hover {
            background-color: #f1f1f1; /* Efek hover pada baris tabel */
        }
        a {
            display: inline-block;
            margin-top: 20px;
            text-decoration: none;
            color: #2aa7e2;
        }
        a:hover {
            text-decoration: underline;
        }
        .logout{
            background-color: #DB1514;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px;
            cursor: pointer;
            align-self: center;
        }
    </style>
</head>
<body>
<div class="container">
    <div>
        <!-- UPDATE DELETE -->
        <h3>Update atau Hapus Nilai Mahasiswa</h3>
        <form method="POST">
            <label>Nama Mahasiswa:</label>
            <input type="text" name="nama" required>
            <label>Nilai:</label>
            <input type="number" name="nilai" step="0.01" >
            <div>
                <input type="submit" name="update" value="Update Nilai">
                <input type="submit" name="delete" value="Hapus Mahasiswa">
            </div>
        </form>
    </div>    
    <!-- CREATE -->
    <div>    
    <h3>Tambah Data Mahasiswa</h3>
        <form method="POST">
            <label>Nama Mahasiswa:</label>
            <input type="text" name="nama" required>
            <label>Nilai Mahasiswa:</label>
            <input type="number" name="nilai" min="0" max="100" required>
            <input type="submit" name="create" value="Tambah Mahasiswa dan Nilai">
        </form>
    </div>
</div>

<!-- READ -->
    <h3>Daftar Mahasiswa</h3>
    <table border="1">
        <tr>
            <th>Nama</th>
            <th>Nilai</th>
        </tr>
        <?php
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>{$row['nama']}</td><td>{$row['nilai']}</td></tr>";
        }
        ?>
    </table>
    	<a class="logout" href="logout.php">LOGOUT</a>
	<br/>
	<br/>
</body>
</html>