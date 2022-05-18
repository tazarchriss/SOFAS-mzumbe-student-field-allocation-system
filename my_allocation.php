<!-- This is the page that allows students to see their allocation -->
<!-- This is the page for managing all the staffs  --><!-- This is a page for Admin Home page -->
<?php

    session_start();
    $id=$_SESSION['id'];
    if ($_SESSION['role']!='4') {
      header('Location:index.html');
    }

    else{
      include 'config/connection.php';
      $sql="SELECT * FROM host,student_request,attachment_request,allocation
      WHERE  attachment_request.student='$id'
      AND allocation.attachment=attachment_request.att_id
      AND student_request.id=attachment_request.request
      AND host.hid=student_request.host";
      $qry=mysqli_query($conn,$sql);


      include 'include/header.php';
    ?>

<body class="hold-transition ">
<div class="wrapper">



<?php include 'include/snav.php'; ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Start of Staff Table -->
    <section class="content mt-3">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-md-12">
        <div class="card">
            <div class="card-header bg-dark">
              <h3 class="card-title"></h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                     <?php

                    if (mysqli_num_rows($qry) == 0){


                    ?>
                   <p class="text-info">No student was selected !</p>

                    <?php

                    }

                    else{

                      ?>

                <?php
                    for ($i=1; $i<=mysqli_num_rows($qry); $i++){
                      $row = mysqli_fetch_array($qry);




                  ?>
         <!-- card boody items -->
         <h5 class="text-center float-left">Status: <span class="badge bg-orange"><?php echo $row['alloc_status']; ?></span></h5>
         <br>
         <h4 class="text-center text-orange">Congratulations, you have been Allocated at</h4>
                <div class="col-md-10 ">

                <table>
                  <div class="row">
                  <tr>
                    <td class="col-md-6"><h3 class="badge badge-dark col-md-12">Organization</h3></td>
                    <td><h4><?php echo $row['name']; ?></h4></td>
                  </tr>
                  <tr>
                    <td><h4 class="badge badge-dark col-md-12">Region</h4></td>
                    <td><h4><?php echo $row['region']; ?></h4></td>
                  </tr>
                  <tr>
                    <td><h4 class="badge badge-dark col-md-12">Start Date</h4></td>
                    <td><h4><?php echo $row['start_date']; ?></h4></td>
                  </tr>
                  <tr>
                    <td><h4 class="badge badge-dark col-md-12">End Date</h4></td>
                    <td><h4><?php echo $row['end_date']; ?></h4></td>
                  </tr>
                  </div>

                </table>
                </div>


            <?php
              }
            }
              ?>

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
