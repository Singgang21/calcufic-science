  <?php session_start(); ?>
  <?php
    require_once('../config/main.php');
    // $id = $_GET['id'];
    $query = mysqli_query($connect, "SELECT nim,nama from user where id =1");

    ?>

  <!DOCTYPE html>
  <html>

  <head>
      <meta charset="UTF-8">
      <title>Calculator Scientific- <?php require('../get_title.php'); ?></title>
      <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
      <link href="../dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
      <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
      <link href="../dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
      <link href="../dist/css/fa/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
      <link href="style_kalkulator.css" rel="stylesheet" type="text/css" />
  </head>

  <body class="skin-blue">
      <div class="wrapper">
          <header class="main-header">
              <!-- Logo -->
              <a href="index.php" class="logo"><b>Calculator </b>Scientific</a>
              <!-- Header Navbar: style can be found in header.less -->
              <nav class="navbar navbar-static-top" role="navigation">
                  <!-- Sidebar toggle button-->
                  <a href="#" class="sidebar-toggle" data-toggle="collapse" role="button">
                      <span class="sr-only">Toggle navigation</span>
                  </a>
              </nav>
          </header>
          <!-- Left side column. contains the logo and sidebar -->
          <aside class="main-sidebar">
              <!-- sidebar: style can be found in sidebar.less -->
              <section class="sidebar">
                  <!-- Sidebar user panel -->
                  <div class="user-panel">
                      <div class="pull-left image">
                          <img src="../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image" />
                      </div>
                      <div class="pull-left info">
                          <p><?php (isset($_SESSION['nama'])) ? print_r($_SESSION['nama']) : print_r('guest'); ?></p>

                          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                      </div>
                  </div>
                  <!-- sidebar menu: : style can be found in sidebar.less -->
                  <ul class="sidebar-menu">
                      <li class="treeview <?php if (!isset($_GET['page'])) {
                                                echo "active";
                                            } ?>">
                          <a href="../index.php">
                              <i class="fa fa-home"></i> <span>Home</span>
                          </a>
                      </li>
                      <li class="treeview <?php if (!isset($_GET['page'])) {
                                                echo "active";
                                            } ?>">
                          <a href="kalkulator.php">
                              <i class="fa fa-calculator"></i> <span>Calculator</span>
                          </a>
                      </li>

                      <?php if (!isset($_SESSION['username'])) : ?>
                          <li class="treeview">
                              <a href="../login.php">
                                  <i class="fa fa-lock"></i> <span>Login</span>
                              </a>
                          </li>
                      <?php else : ?>
                          <li class="treeview">
                              <a href="logout.php">
                                  <i class="fa fa-backward text-danger"></i> <span>Log Out</span>
                              </a>
                          </li>
                      <?php endif; ?>
                  </ul>
              </section>
              <!-- /.sidebar -->
          </aside>

          <!-- Right side column. Contains the navbar and content of the page -->
          <div class="content-wrapper">
              <!-- Content Header (Page header) -->
              <section class="content-header">
                  <form action="" method="post" style="margin-left: 20px;">
                      <table class="row" style="display: none;" id="row">
                          <tr>
                              <td style="margin-bottom:10px;"><b>NIM</b></td>
                              <td><input class="form-control" style="margin-left:15px;margin-bottom:10px;" type="text" id=nim value="<?php (isset($_SESSION['nim'])) ?  print_r($_SESSION['nim']) : print_r('guest'); ?>"></td>
                          </tr>
                          <tr>
                              <td><b>NAMA</b></td>
                              <td><input class="form-control" style="margin-left:15px;" type="text" id=nama value="<?php (isset($_SESSION['nama'])) ?  print_r($_SESSION['nama']) :  print_r('guest'); ?>"></td>
                          </tr>
                      </table>
                  </form>
              </section>


              <!-- Main content -->
              <section class="content">
                  <!-- Small boxes (Stat box) -->

                  <div id="app">

                      <div class="calculator">
                          <button @click="changeModeEvent" class="toggle-button">
                              <p v-if="changeMode">Standart Calculator &nbsp; &nbsp; ⚈</p>
                              <p v-else>Scientific Calculator &nbsp; &nbsp; ⚆</p>
                          </button>
                          <div class="results">
                              <input class="input" v-model="current" />
                          </div>
                          <div class="mode" v-if="changeMode">
                              <button class="button" @click="press">7</button>
                              <button class="button" @click="press">8</button>
                              <button class="button" @click="press">9</button>
                              <button class="button" @click="press">*</button>
                              <button class="button" @click="press"><=</button>
                                      <button class="button" @click="press">C</button>
                                      <button class="button" @click="press">4</button>
                                      <button class="button" @click="press($event)">5</button>
                                      <button class="button" @click="press">6</button>
                                      <button class="button" @click="press">/</button>
                                      <button class="button" @click="press">(</button>
                                      <button class="button" @click="press">)</button>
                                      <button class="button" @click="press">1</button>
                                      <button class="button" @click="press">2</button>
                                      <button class="button" @click="press">3</button>
                                      <button class="button" @click="press">-</button>
                                      <button class="button" @click="press">x ²</button>
                                      <button class="button" @click="press">±</button>
                                      <button class="button" @click="press">0</button>
                                      <button class="button" @click="press">.</button>
                                      <button class="button" @click="press">%</button>
                                      <button class="button" @click="press">+</button>
                                      <button onclick="klik()" class="button equal-sign" @click="press">=</button>
                          </div>
                          <div class="mode" v-else>
                              <button class="button" @click="press">sin</button>
                              <button class="button" @click="press">cos</button>
                              <button class="button" @click="press">tan</button>
                              <button class="button" @click="press">x^</button>
                              <button class="button" @click="press"><=</button>
                                      <button class="button" @click="press">C</button>
                                      <button class="button" @click="press">log</button>
                                      <button class="button" @click="press">ln</button>
                                      <button class="button" @click="press">e</button>
                                      <button class="button" @click="press">∘</button>
                                      <button class="button" @click="press">rad</button>
                                      <button class="button" @click="press">√</button>
                                      <button class="button" @click="press">7</button>
                                      <button class="button" @click="press">8 </button>
                                      <button class="button" @click="press">9</button>
                                      <button class="button" @click="press">/</button>
                                      <button class="button" @click="press">x ²</button>
                                      <button class="button" @click="press">x !</button>
                                      <button class="button" @click="press">4</button>
                                      <button class="button" @click="press">5</button>
                                      <button class="button" @click="press">6</button>
                                      <button class="button" @click="press">*</button>
                                      <button class="button" @click="press">(</button>
                                      <button class="button" @click="press">)</button>
                                      <button class="button" @click="press">1</button>
                                      <button class="button" @click="press">2</button>
                                      <button class="button" @click="press">3</button>
                                      <button class="button" @click="press">-</button>
                                      <button class="button" @click="press">%</button>
                                      <button class="button" @click="press">±</button>
                                      <button class="button" @click="press">0</button>
                                      <button class="button" @click="press">.</button>
                                      <button class="button" @click="press">π</button>
                                      <button class="button" @click="press">+</button>
                                      <button onclick="klik()" class="button equal-sign" @click="press">=</button>
                          </div>
                      </div>

                      <div class="row">
                          <div v-for="(find, index) in history">
                              <input class="form-control" v-model="find" :key="index" style="background-color: #b2dcec;font-weight:400;">
                          </div>
                      </div>
                  </div>
                  < <!-- Main row -->
                      <div class="row">
                          <!-- Left col -->
                          <section class="col-lg-12">

                          </section><!-- /.Left col -->
                          <!-- right col (We are only adding the ID to make the widgets sortable)-->

                      </div><!-- /.row (main row) -->


              </section><!-- /.content -->
          </div><!-- /.content-wrapper -->
          <footer class="main-footer">
              <div class="pull-right hidden-xs">
              </div>
              <strong>Copyright &copy; <?php echo date('Y'); ?> <a href="#">Calculator Scientific</a></strong>
          </footer>
      </div>
      <!-- ./wrapper -->
      <script src='https://cdnjs.cloudflare.com/ajax/libs/vue/2.3.4/vue.min.js'></script>
      <script src="script_kalkulator.js"></script>
      <script src="../plugins/jQueryUI/jquery-ui.min.js" type="text/javascript"></script>
      <script>
          $.widget.bridge('uibutton', $.ui.button);
      </script>
      <script src="../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
      <script src="../plugins/knob/jquery.knob.js" type="text/javascript"></script>
      <script src="../plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
      <script src='../plugins/fastclick/fastclick.min.js'></script>
      <script src="../dist/js/app.min.js" type="text/javascript"></script>
      <script src="../dist/js/pages/dashboard.js" type="text/javascript"></script>
      <script src="../dist/js/demo.js" type="text/javascript"></script>
      <script>
          function klik() {
              var row = document.getElementById('row')
              row.style.removeProperty('display')
              console.log('hello');
          }
      </script>
  </body>

  </html>