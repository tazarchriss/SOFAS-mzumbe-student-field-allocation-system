<!-- This is the page for managing all the staffs  --><!-- This is a page for Admin Home page -->
<?php

    session_start();
    $id=$_SESSION['id'];
    $name=$_SESSION['fname'];
    $year = date("Y");
    if ($_SESSION['role']>='3') {
      if ($_SESSION['role']!='6') {
      header('Location:index.php');
      }
    }

    else{
      include 'config/connection.php';
      $sq="SELECT * FROM mu_supervision,user,staff
      WHERE staff.userId=user.id
      AND mu_supervision.supervisor=staff.staff_id
      AND user.id='$id'
      AND mu_supervision.year='$year'";
      $qr=mysqli_query($conn,$sq);
      $user=mysqli_fetch_array($qr);
      $zone=$user['zone'];
      $sql=" ";
      $qry=mysqli_query($conn,$sql);


      include 'include/header.php';
    ?>

<body class="hold-transition ">
<div class="wrapper">

<?php

if ($_SESSION['position']=='HOD') {
  include 'include/hodnav.php';
}
if ($_SESSION['position']=='Dean') {
  include 'include/dnav.php';
}
// for admin
if ($_SESSION['role']=='1') {
  include 'include/anav.php';
}
if ($_SESSION['position']=='Coordinator') {
  include 'include/Coordinatornav.php';
}
if ($_SESSION['position']=='staff') {
  include 'include/staffNav.php';
}
if($_SESSION['position']==''){
  header('Location:index.php');
}


?>
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
                   <p class="text-dark text-center">No Attachment Requests Available!</p>

                    <?php

                    }

                    else{

                      ?>



              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>SN</th>
                  <th>Registration No</th>
                  <th>Marks</th>
                  <th>Grade</th>
                  <th>Status</th>
                  <th>Actions</th>

                </tr>
                </thead>
                <?php
                    for ($i=1; $i<=mysqli_num_rows($qry); $i++){
                      $row = mysqli_fetch_array($qry);




                  ?>
            <tr>
              <td>
                <?php echo $i; ?></td>
              <td>
              <?php echo $row['user_id']; ?>
              </td>

              <td>
              <?php echo $row['marks']; ?>
             </td>
             <td>
              <?php echo $row['grade']; ?>
             </td>
              <td class="text-danger">
              <?php echo $row['rep_status']; ?>
              </td>
              <td>
                  <div class="text-center">
                      <a class=" badge bg-orange p-1" href="SingleStudentReport.php?id=<?php echo $row['rep_id'];?>"><i class="fa fa-file"> View Report</i></a>
                      <!-- <a class="bg-dark  p-1" href="config/DeleteEarning.php?id=<?php echo $row['id'];?>"><i class="">Decline</i></a> -->
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


<?php

}
?>
