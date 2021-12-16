<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SWR DASHBOARD</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <link href="/dist/img/avatar.png" rel="icon">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">
    <!-- Preloader -->


    <!-- Navbar -->

    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="dashboard.php" class="brand-link">
        <img src="dist/img/dagoeng-new.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
          style="opacity: .8">
        <span class="brand-text font-weight-light">SWR DagoEng</span>
      </a>
      <!-- Sidebar -->
      <div class="sidebar">
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item menu-open">
              <a href="#" class="nav-link active">
                <i class="nav-icon fas fa-chart-area"></i>
                <p>
                  Dashboard
                </p>
              </a>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Smart Watering Robot</h1>
              <?php 
    $tanggal = mktime(date('m'), date("d"), date('Y'));
    echo "<i> Tanggal </i> : <b> " . date("d-m-Y", $tanggal ) . "</b>";
    date_default_timezone_set("Asia/Jakarta");
    $jam = date ("H:i:s");
    echo " | <i> Pukul </i> : <b> " . $jam . " " ." </b> ";
    $a = date ("H");
    if (($a>=6) && ($a<=11)) {
        echo "| <b>Selamat Pagi!</b>";
    }else if(($a>=11) && ($a<=14)){
        echo "| <b> Selamat  Siang!</b> ";
    }elseif(($a>14) && ($a<=18)){
        echo "| <b> Selamat Sore! </b>";
    }else{
        echo "| <b> Selamat Malam ";
    }
 ?>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <!-- Info boxes -->
          <div class="row">
            <div class="col-md-3 col-sm-6 col-12">
              <div class="info-box bg-gradient-info">
                <span class="info-box-icon"><i class="fas fa-battery-full"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Kapasitas Baterai</span>
                  <span class="info-box-number">
                    <?php
                                            include('dbconf.php');
                                            $ref_table = 'Data Sensor';
                                            $fetchdata = $database ->getReference( $ref_table)->getValue();
                                            if($fetchdata > 0){
                                            //var_dump($fetchdata);die;
                                            
                                                  ?>
                    <span><?php
                        $v1 = 10;
                        $v2 = 13;
                        $x = $fetchdata['Tegangan Baterai']*(5/1023);
                        $y = $v1 + ($x/5) * ($v2-$v1);
                        $p = (($y-$v1)/($v2-$v1))*100
                        ?>
                      <?php echo round($p), "%" ;
                    ?></span>
                    <?php
                    
                                              
                                          }
                                      ?>

                  </span>
                  <div class="progress">
                    <div class="progress-bar" style="width: <?php echo round($p);?>%"></div>
                  </div>
                  <span class="progress-description">
                  </span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-12">
              <div class="info-box bg-gradient-success">
                <span class="info-box-icon"><?php
    include('dbconf.php');
    $ref_table = 'Data Sensor';
    $fetchdata = $database ->getReference( $ref_table)->getValue();
    if($fetchdata > 0){
    //var_dump($fetchdata);die;
    if ($fetchdata['Hujan'] >= 900){
        ?>
                  <i class="fas fa-sun"></i>
                  <?php
    }
    elseif (($fetchdata['Hujan'] >=800) && ($fetchdata['Hujan'] <900)) {
        ?>
                  <i class="fas fa-cloud"></i>
                  <?php
    }
    else{
        ?>
                  <i class="fas fa-cloud-rain"></i>
                  <?php
    }
  }

?></span>
                <div class="info-box-content">
                  <span class="info-box-text">Cuaca</span>
                  <span class="info-box-number"><?php
                  include('dbconf.php');
                  $ref_table = 'Data Sensor';
                  $fetchdata = $database ->getReference( $ref_table)->getValue();
                  if($fetchdata > 0){
                  //var_dump($fetchdata);die;
                  if ($fetchdata['Hujan'] >= 900){
                    echo "Cerah";
                  }
                  elseif (($fetchdata['Hujan'] >=800) && ($fetchdata['Hujan'] <900)) {
                    echo "Gerimis";
                  }
                  else{
                    echo "Hujan";
                  }
                }

                  ?></span>
                  <div class="progress">
                    <!-- <div class="progress-bar" style="width: 70%"></div>-->
                  </div>
                  <span class="progress-description">
                  </span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-12">
              <div class="info-box bg-gradient-warning">
                <span class="info-box-icon"><i class="fas fa-water"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Volume Air</span>
                  <span class="info-box-number"><?php
                                            include('dbconf.php');
                                            $ref_table = 'Data Sensor';
                                            $fetchdata = $database ->getReference( $ref_table)->getValue();
                                            ?>
                    <span>
                      <?php 
                      if ($fetchdata['Isi Air'] > 0){
                        echo "Terisi";
                      }
                      else {
                        echo "Kosong";
                      }                    
                    ?>
                    </span>
                    <div class="progress">
                      <div class="progress-bar" style="width:<?php
                      $cap = 1.75;
                      $per = ($vol/$cap)*100;
                      echo $per;
                    ?>"></div>
                    </div>
                    <span class="progress-description">

                    </span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-12">
              <div class="info-box bg-gradient-danger">
                <span class="info-box-icon"><?php 
                      include('dbconf.php');
                      $ref_table = 'Data Sensor';
                      $fetchdata = $database ->getReference( $ref_table)->getValue();
                    ?>
                  <?php 
                      if($fetchdata['Status'] == 1){
                       ?> <i class="fas fa-check-double"></i>
                  <?php
                      }
                      else{
                        ?> <i class="fas fa-fill"></i>
                  <?php 
                      }
                    ?></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Status Pekerjaan</span>
                  <span class="info-box-number">
                    <?php 
                      include('dbconf.php');
                      $ref_table = 'Data Sensor';
                      $fetchdata = $database ->getReference( $ref_table)->getValue();
                    ?>
                    <?php 
                      if($fetchdata['Status'] == 1){
                        echo "Selesai";
                      }
                      else {
                        echo "Dalam Proses";
                      }
                    ?>

                  </span>
                  <div class="progress">
                    <!-- <div class="progress-bar" style="width: 70%"></div>-->
                  </div>
                  <span class="progress-description">

                  </span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->

          <!-- Photo -->
          <div class="row">
            <div class="col-sm-4">
              <div class="card text-center">
              <div class="card-header">
                <h5 class="card-title">Tanaman 1</h5>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>

                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                    <center>
                      <img src="http://192.168.43.214/html/gambar1.jpg" alt="" width="320px" height="240px">
                    </center>
                  </div>
                </div>
              </div>
              <div class="card-footer">
                <div class="row">
                </div>
              </div>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="card text-center">
              <div class="card-header">
                <h5 class="card-title">Tanaman 2</h5>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>

                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                    <center>
                      <img src="http://192.168.43.214/html/gambar2.jpg" alt="" width="320px" height="240px">
                    </center>
                  </div>
                </div>
              </div>
              <div class="card-footer">
                <div class="row">
                </div>
              </div>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="card text-center">
              <div class="card-header">
                <h5 class="card-title">Tanaman 3</h5>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>

                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                    <center>
                      <img src="http://192.168.43.214/html/gambar3.jpg" alt="" width="320px" height="240px">
                    </center>
                  </div>
                </div>
              </div>
              <div class="card-footer">
                <div class="row">
                </div>
              </div>
              </div>
            </div>
          </div>
          <!-- Photo -->
          <div class="card">
            <div class="card-header border-transparent">
              <h3 class="card-title">Informasi Perangkat</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <div class="table table-hover text-nowrap">
                <table class="table m-0">
                  <thead>
                    <tr>
                      <th>Sensor</th>
                      <th>Parameter</th>
                      <th>Nilai</th>
                      <th>Satuan</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td><a>Sensor Suhu</a></td>
                      <td>Suhu</td>
                      <td>
                        <div class="sparkbar" data-color="#00a65a" data-height="20"><?php 
                          include('dbconf.php');
                          $ref_table = 'Data Sensor';
                          $fetchdata = $database ->getReference( $ref_table)->getValue();
                        ?>
                          <?php 
                          echo $fetchdata['Suhu'];
                        ?></div>
                      </td>
                      <td><span>°C</span></td>
                    </tr>
                    <tr>
                      <td><a>Solar Panel</a></td>
                      <td>Tegangan Solar Panel</td>
                      <td>
                        <div class="sparkbar" data-color="#f39c12" data-height="20">
                          <?php
                        $v1 = 10;
                        $v2 = 13;
                        $x = $fetchdata['Tegangan Solar Panel']*(5/1023);
                        $y = $v1 + ($x/5) * ($v2-$v1);
                        ?>
                          <?php
                          echo round($y,2);
                        ?>
                        </div>
                      </td>
                      <td><span>V</span></td>
                    </tr>
                    <tr>
                      <td><a>Sensor Tegangan</a></td>
                      <td>Tegangan Baterai</td>
                      <td>
                        <div class="sparkbar" data-color="#f56954" data-height="20">
                          <?php
                        $v1 = 10;
                        $v2 = 13;
                        $x = $fetchdata['Tegangan Baterai']*(5/1023);
                        $y = $v1 + ($x/5) * ($v2-$v1);
                        ?>
                          <?php
                          echo round($y,2);
                        ?></div>
                      </td>
                      <td><span>V</span></td>
                    </tr>
                    <tr>
                      <td><a>Sensor Raindrop</a></td>
                      <td>Deteksi Hujan</td>
                      <td>
                        <div class="sparkbar" data-color="#00c0ef" data-height="20"><?php echo $fetchdata['Hujan'];?>
                        </div>
                      </td>
                      <td><span>-</span></td>
                    </tr>
                    <tr>
                      <td><a>Sensor Soil Moisture</a></td>
                      <td>Kelembapan Tanah</td>
                      <td>
                        <div class="sparkbar" data-color="#f39c12" data-height="20">
                          <?php echo $fetchdata['Kelembaban Tanah'];?></div>
                      </td>
                      <td><span>RH</span></td>

                    </tr>
                    <tr>
                      <td><a>Sensor Kelembapan Udara</a></td>
                      <td>Kelembapan Udara</td>
                      <td>
                        <div class="sparkbar" data-color="#f56954" data-height="20">
                          <?php echo $fetchdata['Kelembaban Udara'];?></div>
                      </td>
                      <td><span>RH</span></td>
                    </tr>
                    <tr>
                      <td><a>Sensor Jarak</a></td>
                      <td>Jarak</td>
                      <td>
                        <div class="sparkbar" data-color="#00a65a" data-height="20"><?php echo $fetchdata['Jarak'];?>
                        </div>
                      </td>
                      <td><span>Cm</span></td>
                    </tr>
                    <tr>
                      <td><a>Sensor Ketinggian Air</a></td>
                      <td>Ketinggian Air</td>
                      <td>
                        <div class="sparkbar" data-color="#00a65a" data-height="20"><?php echo $fetchdata['Isi Air'];?>
                        </div>
                      </td>
                      <td><span>Cm</span></td>
                    </tr>
                    <tr>
                      <td><a>-</a></td>
                      <td>Volume Air</td>
                      <td>
                        <div class="sparkbar" data-color="#00a65a" data-height="20"><?php 
                          $p = 22;
                          $l = 15;
                          $t = $fetchdata['Isi Air'];
                          $v= ($p * $l * $t)/1000;                      
                        ?>
                          <?php
                          echo round ($v,2);
                        ?></div>
                      </td>
                      <td><span>L</span></td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.card-body -->
            <!-- /.card-footer -->
          </div>
          <!-- /.card -->
        </div>
    </div>
  </div>
  <!-- /.card -->
  </div>
  <!-- /.col -->
  </div>
  <!-- /.row -->

  <!-- Main row -->
  <div class="row">
    <!-- Left col -->
    <div class="col-md-8">
      <!-- MAP & BOX PANE -->

      <!-- /.card -->
      <div class="row">
        <div class="col-md-6">
          <!-- DIRECT CHAT -->

          <!--/.direct-chat -->
        </div>
        <!-- /.col -->

        <div class="col-md-6">
          <!-- USERS LIST -->
          <!--/.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- TABLE: LATEST ORDERS -->

      <!-- /.card -->
    </div>
    <!-- /.col -->

    <div class="col-md-4">

    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
  </div>
  <!--/. container-fluid -->
  </section>
  <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2021 <a href="https://dagoeng.co.id/">Dago Engineering</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0.0
    </div>
  </footer>
  </div>
  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->
  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.js"></script>

  <!-- PAGE PLUGINS -->
  <!-- jQuery Mapael -->
  <script src="plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
  <script src="plugins/raphael/raphael.min.js"></script>
  <script src="plugins/jquery-mapael/jquery.mapael.min.js"></script>
  <script src="plugins/jquery-mapael/maps/usa_states.min.js"></script>
  <!-- ChartJS -->
  <script src="plugins/chart.js/Chart.min.js"></script>

  <!-- AdminLTE for demo purposes -->
  <script src="dist/js/demo.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="dist/js/pages/dashboard2.js"></script>
  <!-- REQUIRED SCRIPTS -->

  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE -->
  <script src="dist/js/adminlte.js"></script>

  <!-- OPTIONAL SCRIPTS -->
  <script src="plugins/chart.js/Chart.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="dist/js/demo.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="dist/js/pages/dashboard3.js"></script>
</body>

</html>