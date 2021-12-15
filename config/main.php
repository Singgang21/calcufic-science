<?php
$hostname = "localhost"; //nama host
$username = "root"; // username 
$password = ""; //  standarnya kosong
$database = "dbcrud"; // buat nama database harus sama 

// Koneksi dan memilih database di server
$connect=mysqli_connect($hostname,$username,$password,$database);
?>