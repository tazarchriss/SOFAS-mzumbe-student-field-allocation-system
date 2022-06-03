<!-- This page allows host organizations to assign supervisors -->
<!-- This page allows the organization to view details of a single allocated student -->
<?php

    session_start();
    $id=$_SESSION['fname'];
    $name=$_GET['id'];
    if ($_SESSION['role']!='3') {
      header('Location:index.html');
    }

    else{
      include 'config/connection.php';
      $sql="SELECT * FROM user,allocation,attachment_request,student_request,student,programme
      WHERE allocation.alloc_id='$name'
      AND attachment_request.att_id=allocation.attachment
      AND user.id=attachment_request.student
      AND student.userid=user.id
      AND student_request.id=attachment_request.request ";
      $qry=mysqli_query($conn,$sql);
      $row=mysqli_fetch_array($qry);


      include 'include/header.php';

?>
<body class="hold-transition ">
<div class="wrapper">



<?php include 'include/hnav.php';?>

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
        <div class="col-md-10 ">
          <h4>Assign Supervisor to: <?php echo $row['fname'].' '.$row['mname'].' '.$row['lname']; ?></h4>

                <div class="col-md-12">
                <form action="config/saveHostSupervision.php" method="post">

                  <div class="form-group col-md-12 float-left">
                        <label for="exampleInputEmail1">Registered Supervisors</label>
                        <select name="supervisor" class="form-control bg-dark" required>
                            <?php
                                $sql="SELECT * FROM  host_supervisors,user,host
                                WHERE user.id=host_supervisors.supervisor
                                AND host.name='$id'
                                AND host_supervisors.host=host.hid";
                                $query=mysqli_query($conn,$sql);

                                if(!$query){

                                  die(mysqli_error($conn));
                                }

                                while ($result=mysqli_fetch_array($query)) {
                                  $id=$result['id'];
                                  $name=$result['fname'].' '.$result['mname'].' '.$result['lname'];
                                  ?>
                              <option value="<?php echo $id; ?>">
                                <?php echo $name; ?>
                              </option>

                                  <?php


                                }

                                ?>
                        </select>
                    </div>
                    <input type="text" name="allocation" value="<?php echo $row['alloc_id'];?>" hidden>
                    <button type="submit" name="save" class="btn bg-orange "><i class="fa fa-save"></i> Save Assignment  </button>
                  </form>
                </div>


                </div>


                <?php

                  if( $row['alloc_status']!='Arrived') {
                  ?>
                   <a href="config/confirmArrival.php?id=<?php echo $row['alloc_id']; ?>" class="btn bg-orange float-right"><i class="fa fa-save"></i> Confirm Arrival</a>
                  <?php
                  }
                  else if( $row['alloc_status']=='Arrived') {
                ?>
<br>
                    <p class="text-center">If the Supervisor is not visible in the list please register him by clicking  the button below:</p>
                    <a href="AddHost_Supervisor.php" class="btn bg-orange float-right mx-1"><i class="fa fa-user-plus"></i> Add Supervisor</a>

                  <?php
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


