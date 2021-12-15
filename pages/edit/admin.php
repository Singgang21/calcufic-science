<?php require_once('config/main.php'); 
$query=mysqli_query($connect,"select * from user where id=".$_GET['id']);
$data = mysqli_fetch_array($query);
?>
<section>
	<div class="row">
		<div class="col-md-12">
	      <!-- general form elements disabled -->
	      <div class="box box-warning">
	        <div class="box-header">
	          <h3 class="box-title">Edit Pengguna</h3>
	        </div><!-- /.box-header -->
	        <div class="box-body">
	          <form role="form" method="post" action="simpan.php">
	          <input type="hidden" name="type" value="admin">
	           <input type="hidden" name="cmd" value="edit">
	          <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
	            <!-- text input -->
	            <div class="form-group">
	              <label>Nama</label>
	              <input type="text" name="nama" class="form-control" placeholder="Nama" value="<?php echo $data['nama']; ?>"/>
	            </div>
	            <div class="form-group">
	              <label>Username</label>
	              <input type="text" name="username" class="form-control" placeholder="Username" value="<?php echo $data['username']; ?>"/>
	            </div>
	            <div class="form-group">
	              <label>Password</label>
	              <input type="password" name="password" class="form-control" placeholder="Password" value="<?php echo $data['password']; ?>"/>
	            </div>
	            <div class="form-group">
	              <label>NIM</label>
	              <input type="nim" name="nim" class="form-control" placeholder="nim" value="<?php echo $data['nim']; ?>"/>
	            </div>
	            <div class="form-group">
	              <label>Level</label>
	              <input type="level" name="level" class="form-control" placeholder="level" value="<?php echo $data['level']; ?>"/>
	            </div>

	            <button type="submit" class="btn btn-success"> <i class="fa fa-save"></i> Simpan</button>
	            <button type="reset" class="btn btn-warning"> <i class="fa fa-backward"></i> Kembalikan Data </button>
	            <a href="index.php?page=admin" class="btn btn-danger"> <i class="fa fa-times"></i> Batal</a>
	          </form>
	        </div><!-- /.box-body -->
	      </div><!-- /.box -->
	    </div><!--/.col (right) -->
	</div>
</section>