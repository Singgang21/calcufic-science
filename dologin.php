<?php
require "config/main.php"; // koneksi ke database

$user 	= $_POST['tUser'];
$pwd   	= MD5($_POST['tPwd']); // pwd berupa md5

// menyeleksi data user yang sesuai kebutuhan
$hasil  = mysqli_query($connect,"SELECT * FROM user WHERE username='$user' AND password='$pwd'");

 // menghitung jumlah data yang ada
$cek = mysqli_num_rows($hasil);
$data   = mysqli_fetch_array($hasil);
// di cek apakah usr dan pwd ada di database apa tidak?
if ($cek > 0 ){
	session_start();
	//  login sebagai admin
		// buat session admin
		$_SESSION['username'] = $data['username'];
		$_SESSION['password'] = $data['password'];
		$_SESSION['nama'] = $data['nama'];
		$_SESSION['nim'] = $data['nim'];
		
	
	header('Location:index.php');
}else{
	// pesan gagal
   echo "<script>alert('GAGAL..!!!!!, Silakan Ulangi Lagi'); window.location = 'login.php'</script>";
}
?>