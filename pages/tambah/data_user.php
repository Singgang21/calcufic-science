<section>
	<div class="row">
		<div class="col-md-12">
	      <!-- general form elements disabled -->
	      <div class="box box-success">
	        <div class="box-header">
	          <h3 class="box-title">Tambah User</h3>
	        </div><!-- /.box-header -->
	        <div class="box-body">
	          <form role="form" method="post" action="simpan.php" enctype="multipart/form-data">
	          	<input type="hidden" name="type" value="data_user">
	            <input type="hidden" name="cmd" value="tambah">
	            <!-- text input -->
	            <div class="form-group">
	              <label>FOTO</label>
				  <input type="file" name="foto" class="form-control" value=""/>
	            </div>
				<div class="form-group">
	              <label>NIM</label>
	              <input type="text" name="nim" class="form-control" placeholder="nim" value=""/>
	            </div>
	            <div class="form-group">
	              <label>Nama</label>
	              <input type="text" name="nama" class="form-control" placeholder="Nama" value=""/>
	            </div>
	            <!-- textarea -->
	            <div class="form-group">
	              <label>Alamat</label>
	              <textarea class="form-control" name="alamat" rows="3" placeholder="Alamat"></textarea>
	            </div>
	            <div class="form-group">
	              <label>Telepon</label>
	              <input type="text" class="form-control" name="telp" placeholder="Telepon" value=""/>
	            </div>
	           

	            <button type="submit" class="btn btn-success" name="simpan" onclick = "return confirm ('Apakah Anda Yakin Akan Menyimpan Data Ini?')"> <i class="fa fa-save"></i> Simpan</button>
	            <button type="reset" class="btn btn-warning"> <i class="fa fa-trash"></i> Reset</button>
	            <a href="index.php?page=data_user" class="btn btn-danger"> <i class="fa fa-times"></i> Batal</a>
	          </form>
	        </div><!-- /.box-body -->
	      </div><!-- /.box -->
	    </div><!--/.col (right) -->
	</div>
</section>