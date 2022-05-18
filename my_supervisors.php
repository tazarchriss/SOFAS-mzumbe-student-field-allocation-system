<!-- This is the page for managing all the staffs  --><!-- This is a page for Admin Home page -->
<?php

    session_start();
    $id=$_SESSION['id'];
    $name=$_SESSION['fname'];
    if ($_SESSION['role']!='4') {
      header('Location:index.html');
    }

    else{
      include 'config/connection.php';
      $sql="SELECT * FROM host_supervisors,allocation,attachment_request,user
      WHERE user.id=allocation.host_supervisor
      and  attachment_request.student='$id'
      and host_supervisors.supervisor=user.id
      and allocation.attachment=attachment_request.att_id";
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
              <h3 class="card-title"><i class="fa fa-user-tie"></i> Organization Supervisor</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                     <?php

                    if (mysqli_num_rows($qry) == 0){


                    ?>
                   <h4 class="text-dark text-center">Sorry You have not been Allocated Supervisors!</h4>

                    <?php

                    }

                    else{
                        $row=mysqli_fetch_array($qry);
                      ?>
               <table>
                  <div class="row">

                  <tr>
                    <td><h4 class="bg-dark col-md-12">Full Names</h4></td>
                    <td><h4> &nbsp; <?php echo $row['title'].''.$row['fname'].' '.$row['mname'].' '.$row['lname']; ?></h4></td>
                  </tr>
                  <tr>
                    <td></td>
                    <td><h4 class="badge bg-orange col-md-12">Organization</h4></td>

                  </tr>

                  </div>

                </table>

                <?php

                    }
                  ?>
            </div>
            <!-- /.card-body -->
          </div>


        <br>
        <div class="card">
            <div class="card-header bg-dark">
              <h3 class="card-title"><i class="fa fa-user-tie"></i> Mzumbe Supervisor</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                     <?php
                         $sql="SELECT * FROM staff,allocation,attachment_request,user
                         WHERE user.id=allocation.mu_supervisor
                         and  attachment_request.student='$id'
                         and staff.userId=user.id
                         and allocation.attachment=attachment_request.att_id";
                         $qry=mysqli_query($conn,$sql);
                    if (mysqli_num_rows($qry) == 0){


                    ?>
                   <h4 class="text-dark text-center">Sorry You have not been Allocated a Supervisor!</h4>

                    <?php

                    }

                    else{
                        $row=mysqli_fetch_array($qry);
                      ?>
               <table>
                  <div class="row">

                  <tr>
                    <td><h4 class="bg-dark col-md-12">Full Names</h4></td>
                    <td><h4> &nbsp; <?php echo $row['title'].' '.$row['fname'].' '.$row['mname'].' '.$row['lname']; ?></h4></td>
                  </tr>
                  <tr>
                    <td></td>
                    <td><h4 class="badge bg-orange col-md-12">Mzumbe University</h4></td>

                  </tr>

                  </div>

                </table>

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
