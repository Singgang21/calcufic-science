<?php require_once('config/main.php');
$query=mysqli_query($connect,"select * from data_user");
 ?>
<div class="box">
    <div class="box-header">
      <h3 class="box-title">Data User( Terdapat <?php echo mysqli_num_rows($query); ?> Data)</h3>
    </div><!-- /.box-header -->
    <div class="box-body">
    <?php if (isset($_SESSION['username'])): ?>
     <a href="tambah.php?tambah=data_user" style="margin-bottom: 10px;" class="btn btn-md btn-primary"> <i class="fa fa-plus"></i> Tambah Data User</a>
	<?php endif; ?>
		<table width="100%" class="table table-bordered" id="tabel">
		<thead>
			
		  <tr>
		    <th>NO</th>
			<th>FOTO</th>
		    <th>NIM</th>
		    <th>NAMA</th>
			<th>ALAMAT</th>
			<th>TELEPON</th>
		   			<?php if (isset($_SESSION['username'])): ?>
			<th></th>
		    <?php endif; ?>
		  </tr>
		</thead>
		<tbody>
			<?php
		  $no=1;
		  while($q=mysqli_fetch_array($query)){
			if(empty($q['foto'])or($q['foto']=='-')) //Mengatur penampilan foto anggota
				$foto = "user2-160x160.jpg"; //jika anggota tidak menginputkan foto, maka akan menampilkan secara deafult foto yang telah ditentukan admin
			else
				$foto = $q['foto']; //jika anggota menginputkan foto, maka foto akan ditampilkan
		  ?>
		  <tr>
		    <td><?php echo $no++; ?></td>           		    
			<td><img src="images/<?php echo $foto; ?>" width=70px height=70px></td>
		    <td><?php echo $q['nim']?></td>
			<td><?php echo $q['nama']?></td>
			<td><?php echo $q['alamat']?></td>
			<td><?php echo $q['telp']?></td>
		   
			<?php if (isset($_SESSION['username'])): ?>
			<td style="width: 150px;">
				<a class="btn btn-success" href="edit.php?edit=<?php echo $_GET['page']; ?>&id=<?php echo $q['id']; ?>">Edit</a>
				<a class="btn btn-danger" onclick="return confirm('Apakah anda yakin akan menghapus data ini?')" href="hapus.php?hapus=<?php echo $_GET['page']; ?>&id=<?php echo $q['id']; ?>">Hapus</a>
			</td>
			<?php endif; ?>
		  </tr>
		  <?php
		  }
		  ?>
		</tbody>
		</table>
	</div>
</div>
<script src="plugins/jQuery/jQuery-2.1.3.min.js"></script>
<script src="plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
<script src="plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
 <script type="text/javascript">
	 $(document).ready(function() {
	 	$('#tabel').dataTable({
	          "bPaginate": true,
	          "bLengthChange": true,
	          "bFilter": true,
	          "bSort": true,
	          "bInfo": true,
	          "bAutoWidth": true
	    });
	 });
</script>