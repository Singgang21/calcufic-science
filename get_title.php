<?php 

if (isset($_GET['page'])) {
	switch ($_GET['page']) {
		case 'data_user':
			$title = "Data User";
			break;
		case 'data_teknisi':
			$title = "Data Teknisi1";
			break;
		case 'data_user1':
			$title = "Data User1";
			break;
		case 'spk':
			$title = "Data Teknisi";
			break;
		
		default:
			$title = "Halaman Tidak Ditemukan";
			break;
	}
	echo $title;
}
else {
	echo "Halaman Utama";
}

 ?>