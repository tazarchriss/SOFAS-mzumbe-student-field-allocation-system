<!-- This is the page for managing all the staffs  --><!-- This is a page for Admin Home page -->
<?php

    session_start();
    $id=$_GET['id'];
    if ($_SESSION['role']=='4') {
      header('Location:index.html');
    }

    else{
      include 'config/connection.php';
      $sql="SELECT * FROM attachment_request,allocation
      WHERE allocation.attachment=attachment_request.att_id
       AND attachment_request.student='$id'
       AND allocation.alloc_status='Not Arrived' ";
      $qry=mysqli_query($conn,$sql);
      echo mysqli_error($conn);
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
if ($_SESSION['position']=='Coordinator') {
  include 'include/Coordinatornav.php';
}
// for admin
if ($_SESSION['role']=='1') {
  include 'include/anav.php';
}
if ($_SESSION['role']=='6') {
  include 'include/hsnav.php';
}


if ($_SESSION['position']=='staff') {
  include 'include/staffNav.php';
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

                    if (mysqli_num_rows($qry) != 0){



                    ?>
                   <p class="text-dark text-center  ">Student has not filled logbooks Yet !</p>

                    <?php

                    }

                    else{
                      $sql1="SELECT * FROM logbook,attachment_request,allocation
                      WHERE allocation.attachment=attachment_request.att_id
                       AND logbook.student=allocation.alloc_id
                       AND attachment_request.student='$id' group BY logbook.log_id DESC";
                      $qry1=mysqli_query($conn,$sql1);



                    if (mysqli_num_rows($qry1)== 0){

                      $sql1="SELECT * FROM attachment_request,allocation
                      WHERE allocation.attachment=attachment_request.att_id
                       AND attachment_request.student='$id'";
                      $qry=mysqli_query($conn,$sql1);

                      $row=mysqli_fetch_array($qry);

                      ?>
                         <p class="text-dark text-center  ">You have not filled any logbook yet,click the button below to create one !</p>
                         <form action="config/logbooks.php" method="post">
                           <input type="text" name="owner" value="<?php echo $row['alloc_id']; ?>" hidden>
                           <button type="submit" class="bg-orange" name="create">Generate Log Books</button>
                         </form>
                        <!-- <a href="create_logbook.php?id=1" class="btn bg-orange"><i class="fa fa-book"></i> Generate Log Books</a> -->
                      <?php

                      }else{

                      ?>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>SN</th>
                  <th>Title</th>
                  <th>Status</th>
                  <th>Action</th>

                </tr>
                </thead>
                <?php
                    for ($i=1; $i<=mysqli_num_rows($qry1); $i++){
                      $row = mysqli_fetch_array($qry1);




                  ?>
            <tr>
              <td>
                <?php echo $i; ?>
            </td>
            <td>
               Logbook for Week <?php echo $row['week']; ?>
              </td>


              <td class="text-secondary">
              <?php echo $row['log_status']; ?>
              </td>
              <td>
                  <div class="text-center ">

                      <a class="badge badge-dark p-1" href="SingleStudentAct.php?id=<?php echo $row['log_id'];?>"><i class="fa fa-eye "> <small>View</small></i></a>

                    </div>


              </td>
            </tr>
            <?php
              }
            }}
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
