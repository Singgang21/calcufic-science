<?php require_once('config/main.php');
$biodata = mysqli_query($connect, "select * from biodata");
// $data_history=mysqli_query($connect,"select * from history");
?>
<div class="row">
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-green">
      <div class="inner">
        <h3><?php echo mysqli_num_rows($biodata); ?></h3>
        <p>Data User</p>
      </div>
      <div class="icon">
        <i class="fa fa-user"></i>
      </div>
      <!-- <a href="./?page=data_user" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a> -->
    </div>
  </div>
  <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <!-- <div class="small-box bg-red">
          <div class="inner">
            <h3><?php
                // echo mysqli_num_rows($data_history); 
                ?></h3>
            <p>Data History</p>
          </div>
          <div class="icon">
            <i class="fa fa-file"></i>
          </div> -->
      <!-- <a href="./?page=teknisi" class="small-box-footer">Selengkapnya <i class="fa fa-arrow-circle-right"></i></a> -->
      <!-- </div> -->
  </div><!-- ./col -->
</div><!-- /.row -->
<script src="plugins/jQuery/jQuery-2.1.3.min.js"></script>