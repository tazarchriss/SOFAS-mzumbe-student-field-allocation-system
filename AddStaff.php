<!-- This is the page for managing all the staffs  --><!-- This is a page for Admin Home page -->
<?php

    session_start();
    $id=$_SESSION['id'];
    if ($_SESSION['role']!='1') {
      header('Location:index.html');
    }

    else{
      include 'config/connection.php';
      $sql="SELECT * FROM user,staff,position
      WHERE user.role='2'
      AND staff.userId=user.id
      AND position.position_id=staff.position";
      $qry=mysqli_query($conn,$sql);


      include 'include/header.php';
    ?>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">



<?php include 'include/anav.php'; ?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
            <!-- Manage staffs buttons -->
          <div class="col-sm-6">
            <a href="AddStaff.php" class="btn bg-orange text-white "><i class=" fa fa-user-plus"></i> Register Staff</a>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item "><a href="admin.php" class="text-orange">Home</a></li>
              <li class="breadcrumb-item ">Manage Staffs</li>
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

              <?php

                    if (mysqli_num_rows($qry) == 0){


                    ?>
                   <p class="text-dark text-center">No staff was registerd !</p>

                    <?php

                    }

                    else{

                      ?>


            <div class="card-header bg-dark">
              <h3 class="card-title"></h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>SN</th>
                  <th>Full Names</th>
                  <th>School</th>
                  <th>StaffID</th>
                  <th>Position</th>
                  <th></th>

                </tr>
                </thead>
                <tbody>
                <?php
                    for ($i=1; $i<=mysqli_num_rows($qry); $i++){
                      $row = mysqli_fetch_array($qry);

                     $sql1="SELECT * FROM staff WHERE userId='2'";
                     $qry1=mysqli_query($conn,$sql1);
                     $res=mysqli_fetch_array($qry1);


                  ?>
            <tr>
              <td>
                <?php echo $i; ?></td>
              <td>
                <?php echo $row['title'].' '.$row['fname'].' '.$row['lname']; ?>
              </td>
              <td>
              <?php echo $row['mname']; ?>
              </td>

              <td>
              <?php echo $row['user_id']; ?>

              </td>
              <td>
              <?php echo $row['pname']; ?>
             </td>
              <td>
                  <div class="text-center">
                      <a class="bg-dark p-1" href="SingleStaff.php?id=<?php echo $row['user_id'];?>"><i class="fa fa-eye "></i></a>
                      <a class="bg-orange p-1" href="EditStaff.php?id=<?php echo $row['user_id'];?>"><i class="fa fa-pen "></i></a>
                  </div>
              </td>
            </tr>
            <?php
              }
            }
              ?>
              </tbody>

              </table>
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
<?php }
?>
