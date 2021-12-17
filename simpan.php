	<?php
	mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
	require "config/main.php";
	$type = trim($_POST['type']);
	$cmd = trim($_POST['cmd']);

	switch ($type) {

		case 'data_user':
			if ($cmd == "tambah") {				

				$nim = $_POST['nim'];
				$nama = $_POST['nama'];
				$alamat = $_POST['alamat'];
				$telp = $_POST['telp'];

				extract($_POST);

				if (isset($_POST['simpan'])) {

					extract($_POST);
					$nama_file = $_FILES['foto']['name'];
					if (!empty($nama_file)!=false) {
						// Baca lokasi file sementar dan nama file dari form (fupload)
						$lokasi_file = $_FILES['foto']['tmp_name'];
						$tipe_file = pathinfo($nama_file, PATHINFO_EXTENSION);
						$file_foto = $nim . "." . $tipe_file;
						// Tentukan folder untuk menyimpan file
						$folder = "images/".$file_foto;

						// Apabila file berhasil di upload
						move_uploaded_file($lokasi_file, "$folder");
					} else {
						$file_foto = "-";
					}

					mysqli_query($connect, "INSERT INTO data_user(nim,nama,alamat,telp,foto)
					VALUES('$nim',
							'$nama',
							'$alamat',
							'$telp',
							'$file_foto')");
				}
			} elseif ($cmd == "edit") {
				$id = $_POST['id'];
				$nim = $_POST['nim'];
				$nama = $_POST['nama'];
				$alamat = $_POST['alamat'];
				$telp = $_POST['telp'];

				if (isset($_POST['simpan'])) {

					extract($_POST);
					$nama_file = $_FILES['foto']['name'];
					if (!empty($nama_file)) {
						// Baca lokasi file sementar dan nama file dari form (fupload)
						$lokasi_file = $_FILES['foto']['tmp_name'];
						$tipe_file = pathinfo($nama_file, PATHINFO_EXTENSION);
						$file_foto = $nim.".".$tipe_file;
						// Tentukan folder untuk menyimpan file
						$folder = "images/$file_foto";
						@unlink("$folder");
						// Apabila file berhasil di upload
						move_uploaded_file($lokasi_file, "$folder");
					} else {
						$file_foto = $foto_awal;
					}

					mysqli_query($connect, "UPDATE data_user SET 
						nim='$nim ',
						nama='$nama ',
						alamat='$alamat',
						telp='$telp',
						foto='$file_foto'			
						WHERE id='$id'");
				}
			} else {
				die(); //jika bukan tambah atau edit, lalu apa ? die aja lah :p
			}
			header('Location:index.php?page=data_user');
			break;

		case 'data_teknisi':
			if ($cmd == "tambah") {
				mysqli_query($connect, "INSERT INTO hist(nama,pelanggan,alamat,kontak,telp,tgl,jam,ket)
					VALUES('$_POST[nama]',
					'$_POST[pelanggan]',
					'$_POST[alamat]',
					'$_POST[kontak]',
					'$_POST[telepon]',
					'$_POST[tanggal]',
					'$_POST[jam]',
					'$_POST[ket]')");
			} elseif ($cmd == "edit") {
				mysqli_query($connect, "UPDATE teknisi SET nama='$_POST[nama]',
						pelanggan='$_POST[pelanggan]',
						alamat='$_POST[alamat]',
						kontak='$_POST[kontak]',
						telp='$_POST[telepon]',
						tgl='$_POST[tanggal]',
						jam='$_POST[jam]'
						WHERE id='$_POST[id]'");
			} else {
				die(); //jika bukan tambah atau edit, lalu apa ? die aja lah :p
			}
			header('Location:index.php?page=spk');
			break;
		case 'admin':
			if ($cmd == "tambah") {
				mysqli_query($connect, "INSERT INTO admin(nama,username,password)
					VALUES('$_POST[nama]',
					'$_POST[username]',
					MD5('$_POST[password]'))");
			} elseif ($cmd == "edit") {
				mysqli_query($connect, "UPDATE admin SET nama='$_POST[nama]',
						username='$_POST[username]',
						password=MD5('$_POST[password]')
						WHERE id='$_POST[id]'");
			} else {
				die(); //jika bukan tambah atau edit, lalu apa ? die aja lah :p
			}
			header('Location:index.php?page=admin');
			break;

		default:
			require_once("pages/404.php");
			break;
	}
	?>
