<!-- This is the home page for Host/Organizations -->

<?php
session_start();
    $id=$_SESSION['id'];
    $name=$_SESSION['fname'];
    if ($_SESSION['role']!='6') {
      header('Location:index.html');
    }

    else{
      include 'config/connection.php';
include 'include/header.php';
?>
<div class="wrapper">


<?php


include 'include/hsnav.php' ;?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          <h4 class="m-0 "><i class="fa fa-user-tie text-orange text-bold"></i> Welcome, <?php echo $_SESSION['lname'].' '.$_SESSION['fname']; ?></h4>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item "><a href="admin.html" class="text-orange">Home</a></li>
              <li class="breadcrumb-item ">Dashboard </li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
        <hr>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <!-- Total users box -->

        <?php

        $sql="SELECT * FROM allocation,attachment_request,user
        WHERE allocation.host_supervisor='$id'
        and attachment_request.att_id=allocation.attachment
        and user.id=attachment_request.student
        ";
        $qry=mysqli_query($conn,$sql);
            $students=mysqli_num_rows($qry);

          ?>
        <div class="row">
          <div class="col-md-6 text-center ">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo $students; ?></h3>

                <p>Assigned Students</p>
              </div>
              <div class="icon">
                <i class="fa fa-users"></i>
              </div>
              <a href="organizations.php" class="small-box-footer"></a>
            </div>
          </div>
          <!-- ./col -->

          <!-- Total staffs sections -->
          <div class="col-md-6 text-center">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>--</h3>

                <p>Log Books</p>
              </div>
              <div class="icon">
                <i class="fa fa-book"></i>
              </div>
              <a href="organizations.php" class="small-box-footer"></a>
            </div>
          </div>
          <!-- ./col -->

          <!-- organization panel -->
          <?php

            $sql="SELECT * FROM user
            WHERE role='3'";
            $qry=mysqli_query($conn,$sql);
            $row=mysqli_fetch_array($qry);
            $hosts=mysqli_num_rows($qry);

            ?>
          <div class="col-md-6 text-center">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo $hosts; ?></h3>

                <p>Assesed</p>
              </div>
              <div class="icon">
                <i class="fa fa-clipboard"></i>
              </div>
              <a href="organizations.php" class="small-box-footer"></a>
            </div>
          </div>
          <!-- ./col -->

          <!-- start of field report section -->
          <div class="col-md-6 text-center">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>--</h3>

                <p>Student Reports</p>
              </div>
              <div class="icon">
                <i class="fa fa-file-pdf"></i>
              </div>
              <a href="organizations.php" class="small-box-footer"></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer bg-dark text-center">
    <br>
    <strong>Copyright &copy; 2021/2022 <a href="" class="text-orange">TazarChriss </a>.</strong>
    All rights reserved.
    <div class="mt-4">
        <h1></h1>
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

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
<?php
    }
    ?>
