<!-- This page allows host organizations to assign supervisors -->
<!-- This page allows the organization to view details of a single allocated student -->
<?php

    session_start();
    $mu=$_GET['id'];
    if ($_SESSION['role']!='1') {
      header('Location:index.html');
    }

    else{
      include 'config/connection.php';

      $sql="SELECT * FROM mu_supervision,zone
      where zone.zone_id=mu_supervision.zone
      AND mu_supervision.mu_id='$mu' ";
      $qry=mysqli_query($conn,$sql);

      if(!$qry){

        die(mysqli_error($conn));
      }


      include 'include/header.php';

?>
<body class="hold-transition ">
<div class="wrapper">



<?php include 'include/anav.php';?>

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


                <div class="col-md-12">

                  <?php
                        if(mysqli_num_rows($qry)==0)

                        { ?>
                          <h4 class="alert bg-orange text-center">All zones Have Been Assigned Supervisors</h4>
                       <?php }
                        else{

                      ?>

                <h4>Assign Supervisor to Zone: </h4>
                <form action="config/saveMuSupervision.php" method="post">
                <div class="form-group col-md-12 float-left">
                        <label for="exampleInputEmail1">Registered Zones</label>
                        <select name="zone" class="form-control bg-dark" required>
                            <?php



                                while ($row=mysqli_fetch_array($qry)) {
                                  $zid=$row['zone_id'];
                                  $zname=$row['z_name'];
                                  ?>
                              <option value="<?php echo $zid; ?>">
                                <?php echo $zname; ?>
                              </option>

                                  <?php


                                }

                                ?>
                                 <?php
                                $sql="SELECT * FROM  zone ";
                                $query=mysqli_query($conn,$sql);

                                if(!$query){

                                  die(mysqli_error($conn));
                                }

                                while ($result=mysqli_fetch_array($query)) {
                                  $id=$result['zone_id'];
                                  $name=$result['z_name'].' '.$result['fname'].' '.$result['mname'].' '.$result['lname'];
                                  ?>
                              <option value="<?php echo $id; ?>">
                                <?php echo $name; ?>
                              </option>

                              <?php


                            }

                            ?>
                        </select>
                    </div>
                  <div class="form-group col-md-12 float-left">
                        <label for="exampleInputEmail1">Registered Supervisors</label>
                        <select name="supervisor" class="form-control bg-dark" required>
                            <?php
                                $zid=$row['zone_id'];
                                $sql="SELECT * FROM  user,staff
                                WHERE staff.userid=user.id";
                                $query=mysqli_query($conn,$sql);

                                if(!$query){

                                  die(mysqli_error($conn));
                                }

                                while ($result=mysqli_fetch_array($query)) {
                                  $id=$result['staff_id'];
                                  $name=$result['title'].' '.$result['fname'].' '.$result['mname'].' '.$result['lname'];
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
                    <button type="submit" name="update" class="btn bg-orange float-right"><i class="fa fa-save"></i> Save Assignment  </button>


                  </form>

                  <?php } ?>
                </div>


                </div>




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


