<!-- This is the page for registering organizations -->
<?php

    session_start();
    $id=$_SESSION['id'];
    if ($_SESSION['role']!='1') {
      header('Location:index.php');
    }

    else{
      include 'config/connection.php';
      $sql="SELECT * FROM user WHERE id='$id'";
      $qry=mysqli_query($conn,$sql);
      $row=mysqli_fetch_array($qry);

      include 'include/header.php';
    ?>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">



<?php include 'include/anav.php'; ?>






  <!-- /.navbar -->

  <!-- Main Sidebar Container -->


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
            <!-- Manage staffs buttons -->
          <div class="col-sm-6">
            <a href="Organizations.php" class="btn bg-orange text-white "><i class=" fa fa-bars"></i> View All Organizations</a>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item "><a href="admin.html" class="text-orange">Home</a></li>
              <li class="breadcrumb-item ">Manage Organizations</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Start of Staff Table -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-md-12">
        <div class="card">
            <div class="card-header bg-dark">
              <h3 class="card-title text-light"><i class="fa fa-plus"></i> Add Organization </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <!-- start of Organization Registration Form -->
                <form action="config/registration.php" method="post" class="form-group">
                    <div class="form-group col-md-6 float-left">
                        <label for="name">Organization Name</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Enter Organization Name" required>
                    </div>
                    <div class="form-group col-md-6 float-left">
                        <label for="address">Box</label>
                        <input type="text" name="address" id="address" class="form-control" placeholder="Enter Organization Address" required>
                    </div>
                    <div class="form-group col-md-6 float-left">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Enter Organization Email" required>
                    </div>

                    <div class="form-group col-md-6 float-left">
                        <label for="tel">Telephone Number</label>
                        <input type="text" name="tel" id="tel" class="form-control" placeholder="Enter Organization Telephone Number" required>
                    </div>

                    <div class="form-group col-md-6 float-left">
                        <label for="exampleInputEmail1">Region</label>
                        <select name="region" class="form-control bg-dark" required>
                            <?php
                                $sql="select * from region";
                                $query=mysqli_query($conn,$sql);

                                if(!$query){

                                  die(mysqli_error($conn));
                                }

                                while ($result=mysqli_fetch_array($query)) {
                                  $id=$result['reg_id'];
                                  $name=$result['rname'];
                                  ?>
                              <option value="<?php echo $id; ?>">
                                <?php echo $name; ?>
                              </option>

                                  <?php


                                }

                                ?>
                        </select>
                    </div>

                    <div class="form-group col-md-6 float-left">
                        <label for="type">Organization Type</label>
                        <select name="type" class="form-control bg-dark">
                            <option value="Public">Public</option>
                            <option value="Private">Private</option>
                        </select>
                    </div>
                    <!-- Register Button -->
                    <div class="form-group ">
                        <input type="submit" name="organization" id="" class="btn btn-block bg-orange text-light" value="Register Organization">
                    </div>
                </form>
            </div>
            <!-- /.card-body -->
          </div>
        </div>
          </div>
          </div>
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
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["pdf"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>
</html>
<?php
    }
    ?>
