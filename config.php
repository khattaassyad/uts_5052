<?php 
$koneksi = mysqli_connect("localhost","root","","dashboard_nilai");
 
// Check connection
if (!$koneksi){
    die("ada masalah koneksi database: ". mysqli_connect_error());
}
?>