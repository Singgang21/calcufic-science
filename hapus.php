<?php 
if (isset($_GET['hapus'])) {
	require "config/main.php";
	switch ($_GET['hapus']) {
		case 'data_user':
			mysqli_query($connect,"DELETE FROM data_user WHERE id=".$_GET['id']);
			header('Location:dasboard.php?page='.$_GET['hapus']);
			break;
		
		case 'data_history':
			mysqli_query($connect,"DELETE FROM history WHERE id=".$_GET['id']);
			header('Location:dasboard.php?page='.$_GET['hapus']);
			break;
		case 'admin':
			mysqli_query($connect,"DELETE FROM admin WHERE id=".$_GET['id']);
			header('Location:dasboard.php?page='.$_GET['hapus']);
			break;
		
		default:
			require_once("pages/404.php");
			break;
	}
}
else {
	require_once("pages/home.php");
}

 ?>