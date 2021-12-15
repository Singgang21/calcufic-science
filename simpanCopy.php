<!DOCTYPE html>
<html>
	<header>
		<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />    
	</header>
	<body>
	<?php 
		mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
		require "config/main.php";
		$type = trim($_POST['type']);
		$cmd = trim($_POST['cmd']);

		switch ($type) {
			
			case 'data_user':
				if ($cmd=="tambah") {
					$nim = $_POST['nim'];
					$nama=$_POST['nama'];
					$alamat=$_POST['alamat'];
					$telp = $_POST['telp'];

					extract($_POST);
					// Ambil Data yang Dikirim dari Form
					$nama_file = $_FILES['foto']['name'];
					$ukuran_file = $_FILES['foto']['size'];
					$tipe_file = $_FILES['foto']['type'];
					$tmp_file = $_FILES['foto']['tmp_name'];
					
					//rename foto
					$file_foto = $nim.".".$tipe_file;

					// Set path folder tempat menyimpan gambarnya
					$path = "images/".$file_foto;

					if($tipe_file == "image/jpeg" || $tipe_file == "image/png"){ // Cek apakah tipe file yang diupload adalah JPG / JPEG / PNG
						if($ukuran_file <= 1000000){ // Cek apakah ukuran file yang diupload kurang dari sama dengan 1MB
							// Proses upload
							if(move_uploaded_file($tmp_file, $path)){ // Cek apakah gambar berhasil diupload atau tidak
								// Proses simpan ke Database
								// mysqli_query($connect,);								
								$query = "INSERT INTO data_user(nim,nama,alamat,telp,foto)
								VALUES('$nim',
										'$nama',
										'$alamat',
										'$telp',
										'$file_foto')";
								$sql = mysqli_query($connect, $query); // Eksekusi/ Jalankan query dari variabel $query
								
								if($sql){ // Cek jika proses simpan ke database sukses atau tidak			
									header('Location:index.php?page=data_user');
								}else{	?>		
									<div class="alert alert-danger d-flex align-items-center" role="alert">
										<svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
										<div>
											Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.
										</div>
									</div>		
								<?php }
							}else{ ?>								
								<div class="alert alert-danger d-flex align-items-center" role="alert">
									<svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
									<div>
										Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.
									</div>
								</div>	
					  <?php }
						}else{
							// Jika ukuran file lebih dari 1MB, lakukan :
							echo "Maaf, Ukuran gambar yang diupload tidak boleh lebih dari 1MB";
							echo "<br><a href='form.php'>Kembali Ke Form</a>";
						}
					}else{
					// Jika tipe file yang diupload bukan JPG / JPEG / PNG, lakukan :
					echo "Maaf, Tipe gambar yang diupload harus JPG / JPEG / PNG.";
					echo "<br><a href='form.php'>Kembali Ke Form</a>";
					}

					// If(isset($_POST['simpan'])){
						
					// 	extract($_POST);
					// 	$nama_file = $_FILES['foto']['name'];
					// 	if(!empty($nama_file)){
					// 		// Baca lokasi file sementar dan nama file dari form (fupload)
					// 		$lokasi_file = $_FILES['foto']['tmp_name'];
					// 		$tipe_file = pathinfo($nama_file, PATHINFO_EXTENSION);
					// 		$file_foto = $nim.".".$tipe_file;
					// 		// Tentukan folder untuk menyimpan file
					// 		$folder = "images/$file_foto";
						
					// 		// Apabila file berhasil di upload
					// 		move_uploaded_file($lokasi_file,"$folder");
					// 	}
					// 	else {
					// 		$file_foto="-";
					// 	}									

					// mysqli_query($connect,"INSERT INTO data_user(nim,nama,alamat,telp,foto)
					// VALUES('$nim',
					// 		'$nama',
					// 		'$alamat',
					// 		'$telp',
					// 		'$file_foto')");
					// }			
				}
				elseif($cmd=="edit") {
					$id = $_POST['id'];
					$nim = $_POST['nim'];
					$nama = $_POST['nama'];
					$alamat = $_POST['alamat'];
					$telp = $_POST['telp'];

					If(isset($_POST['simpan'])){
						
						extract($_POST);
						$nama_file = $_FILES['foto']['name'];
						if(!empty($nama_file)){
							// Baca lokasi file sementar dan nama file dari form (fupload)
							$lokasi_file = $_FILES['foto']['tmp_name'];
							$tipe_file = pathinfo($nama_file, PATHINFO_EXTENSION);
							$file_foto = $nim.".".$tipe_file;
							// Tentukan folder untuk menyimpan file
							$folder = "images/$file_foto";
							@unlink ("$folder");
							// Apabila file berhasil di upload
							move_uploaded_file($lokasi_file,"$folder");
						}
						else {
							$file_foto=$foto_awal;
						}					

					mysqli_query($connect,"UPDATE data_user SET 
						nim='$nim ',
						nama='$nama ',
						alamat='$alamat',
						telp='$telp',
						foto='$file_foto'			
						WHERE id='$id'");
					}
					
				}
				else {
					die(); //jika bukan tambah atau edit, lalu apa ? die aja lah :p
				}
				header('Location:index.php?page=data_user');
				break;
				
				case 'data_teknisi':
				if ($cmd=="tambah") {
					mysqli_query($connect,"INSERT INTO hist(nama,pelanggan,alamat,kontak,telp,tgl,jam,ket)
					VALUES('$_POST[nama]',
					'$_POST[pelanggan]',
					'$_POST[alamat]',
					'$_POST[kontak]',
					'$_POST[telepon]',
					'$_POST[tanggal]',
					'$_POST[jam]',
					'$_POST[ket]')");
				}
				elseif($cmd=="edit") {
					mysqli_query($connect,"UPDATE teknisi SET nama='$_POST[nama]',
						pelanggan='$_POST[pelanggan]',
						alamat='$_POST[alamat]',
						kontak='$_POST[kontak]',
						telp='$_POST[telepon]',
						tgl='$_POST[tanggal]',
						jam='$_POST[jam]'
						WHERE id='$_POST[id]'");
				}
				else {
					die(); //jika bukan tambah atau edit, lalu apa ? die aja lah :p
				}
				header('Location:index.php?page=spk');
				break;
			case 'admin':
				if ($cmd=="tambah") {
					mysqli_query($connect,"INSERT INTO admin(nama,username,password)
					VALUES('$_POST[nama]',
					'$_POST[username]',
					MD5('$_POST[password]'))");
				}
				elseif($cmd=="edit") {
					mysqli_query($connect,"UPDATE admin SET nama='$_POST[nama]',
						username='$_POST[username]',
						password=MD5('$_POST[password]')
						WHERE id='$_POST[id]'");
					
				}
				else {
					die(); //jika bukan tambah atau edit, lalu apa ? die aja lah :p
				}
				header('Location:index.php?page=admin');
				break;
			
			default:
				require_once("pages/404.php");
				break;
		}
	?>
	</body>
</html>
