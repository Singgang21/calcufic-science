<?php require_once('config/main.php');
$query=mysqli_query($connect,"select * from biodata where id='$_GET[id]'");
$data = mysqli_fetch_array($query);
if(empty($data['foto'])or($data['foto']=='-'))
				$foto = "user2-160x160.jpg";
			else
				$foto = $data['foto'];
 ?>
<section>
	<div class="row">
		<div class="col-md-12">
	      <!-- general form elements disabled -->
	      <div class="box box-success">
	        <div class="box-header">
	          <h3 class="box-title">Edit User</h3>
	        </div><!-- /.box-header -->
	        <div class="box-body">
	          <form role="form" method="post" action="simpan.php" enctype="multipart/form-data">
	            <!-- text input -->
	            <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
	            <input type="hidden" name="type" value="data_user">
	            <input type="hidden" name="cmd" value="edit">
				
				<!-- form foto	    -->
				<label>FOTO</label>	 
				<div class="form-group">
	              	<img src="images/<?php echo $foto; ?>" width=85px height=85px>
					<input type="file" name="foto" class="form-control" style="margin-top: 10px;">
					<input type="hidden" name="foto_awal" value="<?php echo $data['foto']; ?>">
	            </div>
				<div class="form-group">
	              <label>NIM</label>
	              <input type="text" name="nim" class="form-control" placeholder="nim" value="<?php echo $data['nim']; ?>"/>
	            </div>
	            <div class="form-group">
	              <label>Nama</label>
	              <input type="text" name="nama" class="form-control" placeholder="Nama" value="<?php echo $data['nama']; ?>"/>
	            </div>
	            <!-- textarea -->
	            <div class="form-group">
	              <label>Alamat</label>
	              <textarea class="form-control" name="alamat" rows="3" placeholder="Alamat"><?php echo $data['alamat']; ?></textarea>
	            </div>
	            <div class="form-group">
	              <label>Telepon</label>
	              <input type="text" class="form-control" name="telp" placeholder="telp" value="<?php echo $data['telp']; ?>"/>
	            </div>

	            <button type="submit" class="btn btn-success" name="simpan" onclick = "return confirm ('Apakah Anda Yakin Akan Menyimpan Perubahan Data Ini?')"> <i class="fa fa-save"></i> Simpan</button>
	            <button type="reset" class="btn btn-warning"> <i class="fa fa-backward"></i> Kembalikan Data</button>
	            <a href="index.php?page=data_pembelian" class="btn btn-danger"> <i class="fa fa-times"></i> Batal</a>
	          </form>
	        </div><!-- /.box-body -->
	      </div><!-- /.box -->
	    </div><!--/.col (right) -->
	</div>
</section>