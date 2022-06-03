
<!-- This is the home page for Host/Organizations -->
<?php

session_start();
$student=$_SESSION['id'];
// for header files
require 'config/connection.php';
include 'include/header.php';
$log=$_GET['id'];
$sql1="SELECT * FROM logbook,activity,attachment_request,allocation
WHERE activity.logbook=logbook.log_id
AND logbook.student=allocation.alloc_id
AND allocation.attachment=attachment_request.att_id
AND attachment_request.student='$student'
AND logbook.week='$log'
ORDER BY activity.act_id ASC";
$qry=mysqli_query($conn,$sql1);
// $res=mysqli_fetch_array($qry);

?>
<div class="wrapper">


<?php


include 'include/snav.php' ;?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h4 class="m-0"><i class="fa fa-book text-orange text-bold"></i> Log Books</h4>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item "><a href="admin.html" class="text-orange">Home</a></li>
              <li class="breadcrumb-item ">Dashboard </li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

      <!-- start of logbook form -->
      <div class="row">
        <div class="col-md-11 mx-1 P-2 mx-auto">
          <div class="card">
            <div class="card-header bg-dark"></div>
            <div class="card-body">
              <div class="form">
                      <div class="col-md-3 mx-auto text-center ">
                      <img src="logo.jpg" style="width:100%;height: 80px;">
                      <small class="text-center">MZUMBE UNIVERSITY</small>
                      </div>
                <table  class="table table-bordered table-striped">

                  <thead>





                  <tr>
                    <td>Date: <?php echo date('Y'.'/'.'m'.'/'.'d'); ?></td>
                    <td>NAME: <?php echo $_SESSION['fname'].' '.$_SESSION['mname'].' '.$_SESSION['lname']; ?></td>
                    <td></td>

                  </tr>

                    <tr>
                      <td>Day</td>
                      <td>Description of Activities performed</td>
                      <td>Hours</td>
                    </tr>
                  </thead>
                  <tbody>
                    <form action="config/logbooks.php" method="post">

                    <?php if (mysqli_num_rows($qry)> 0){

                         for ($i=1; $i<=mysqli_num_rows($qry); $i++){
                          $row=mysqli_fetch_array($qry);




                       ?>
                    <tr>
                    <td> <?php echo $row['day']; ?></td>
                    <td> <?php echo $row['description']; ?> </td>
                    <td>
                    <?php echo $row['hours']; ?>
                    </td>
                   </tr>

                   <?php }}


                   ?>
                    <?php
                   if (date('l')=="Sunday" or date('l')=="Monday") {
                     ?>

                      <p class="bg-orange">Sorry it is not a working day Today !</p>

                   <?php
                    }else{

                    ?>
                    <td>
                      <?php
                   echo date('l');
                   ?>

                  </td>
                    <td><Textarea name="description" class="form-control" row="3" class="text-secondary"></Textarea></td>
                    <td>
                    <input type="text" name="day" value="<?php echo date('l'); ?>" hidden>
                      <input type="text" name="logbook" value="<?php echo $log; ?>" hidden>
                      <input type="text" name="hours" class="col-md-7 form-control" placeholder="Hour"></input>
                    </td>
                   <?php }


                  ?>

                  </tbody>

                </table>
                <div class="row">




               <div class="col-md-4 float-right">
                  <button type="submit" name="draft" class="btn btn-block bg-orange m-1"><i class="fa fa-save"></i> Save </button>

                </div>


                </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>

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

