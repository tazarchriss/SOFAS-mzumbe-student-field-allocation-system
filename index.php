<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> MU-SOFAS | Login</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed bg-secondary">
<div class="wrapper">



  <!-- Navbar -->
  <nav class="navbar navbar-expand navbar-white bg-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link text-light" data-widget="pushmenu" href="#" role="button"><img src="logo.jpg" style="width:30px;"></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index.html" class="nav-link text-light">MU-SOFAS</a>
      </li>

    </ul>

  </nav>
  <!-- /.navbar -->

  <div class="row">

      <!-- login form -->
      <div class="col-md-6 mx-auto p-4 mt-3">
         <!-- logout message -->
  <?php
                // loged out
                if (isset($_GET["success"])){
                  ?>
                <p class="alert bg-orange col-md-12 mt-2 mx-auto" >You have successfully Log out! <a href="index.php" class="float-right text-light text-center" style="font-size:18px;border:1px solid white;width:30px;"><i class="fa fa-times text-light"></i></a></p>
                  <?php
                }

                // changed password
                if (isset($_GET["password"])){
                  ?>
                <p class="alert bg-orange col-md-12 mt-2 mx-auto" >Password Change successful,login again! <a href="index.php" class="float-right text-light text-center" style="font-size:18px;border:1px solid white;width:30px;"><i class="fa fa-times text-light"></i></a></p>
                  <?php
                }
                ?>
        <div class="card mt-2 mx-auto">

            <div class="card-body">
                <div class="col-md-3 mx-auto">
                    <img src="logo.jpg" style="width:100%;height: 80px;;">
                    <p class="text-dark text-bold text-center">MU-SOFAS</p>
                </div>
              <form action="config/authentication.php" method="post" class="form-group">
                  <div class="form-group">
                      <label for="username" class="text-dark"><i class="fa fa-user"></i> Username</label>
                      <input type="text" name="userID" class="form-control" placeholder="Enter Username">
                  </div>
                  <div class="form-group">
                      <label for="password" class="text-dark"><i class="fa fa-lock"></i> Password</label>
                      <input type="password" name="password" class="form-control" placeholder="Enter Password">
                  </div>

            </div>
            <?php
                  if (isset($_GET["request"])){
                  ?>
                <p class="btn btn-danger btn-block disabled col-md-11 mx-auto" >wrong username or password</p>
                  <?php
                }

                ?>
            <div class="card-footer">
              <div class="form-group text-light">
                  <input type="submit" value="Log In" name="login" class="btn bg-orange btn-block text-light" >
              </div>
            </div>
        </div>
    </form>
    </div>



  </div>

</div>

  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<footer class="bg-dark fixed-bottom text-center">
    <br>
    <strong>Copyright &copy; 2021/2022 <a href="" class="text-orange">TazarChriss </a>.</strong>
    All rights reserved.
    <div class="mt-4">
        <h1></h1>
    </div>
  </footer>
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
</body>
</html>
