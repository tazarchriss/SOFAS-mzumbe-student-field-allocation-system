<!-- This is the page for managing all the staffs  --><!-- This is a page for Admin Home page -->
<?php

    session_start();
    $id=$_SESSION['id'];
    if ($_SESSION['role']!='4') {
      header('Location:index.html');
    }

    else{
      include 'config/connection.php';
      $sql="SELECT * FROM host,student_request,category WHERE  student_request.host=host.hid AND category.cat_id=student_request.category  ";
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
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>SN</th>
                  <th>Host</th>
                  <th>Category</th>
                  <th>Required</th>
                  <th>Year</th>
                  <th>Status</th>
                  <th>Action</th>
           
                </tr>
                </thead>
                <?php
                    for ($i=1; $i<=mysqli_num_rows($qry); $i++){
                      $row = mysqli_fetch_array($qry);
                    
              

                  
                  ?>
            <tr>
              <td>
                <?php echo $i; ?>
            </td>
            <td>
                <?php echo $row['name']; ?>
              </td>

              <td>
                <?php echo $row['cname']; ?>
              </td>

              <td>
              <?php echo $row['students']; ?> 
             </td>
             <td>
              <?php echo $row['region']; ?> 
             </td>
              <td>
              <?php echo $row['ostatus']; ?>  
              </td>
              <td>
                  <div class="text-center">
                  <?php if(mysqli_num_rows($qry100)==0){ ?>
                      <a class="bg-orange p-1" href="config/requestAttachment.php?id=<?php echo $row['id'];?>"><i class="fa fa-download "> <small>Request</small></i></a>
                    <?php } else{ ?>
                        <a class="badge bg-orange"><?php echo $data['status'];?></a>
                    <?php } ?>
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
