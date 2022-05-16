<!-- This is the page contain the form for adding staff -->
<?php

    session_start();
    $id=$_SESSION['id'];
    if ($_SESSION['role']!='3') {
      header('Location:index.php');
    }

    else{
      include 'config/connection.php';
      $sql="SELECT * FROM host,user WHERE user.id='$id' AND host.name=user.user_id";
      $qry=mysqli_query($conn,$sql);
      $row=mysqli_fetch_array($qry);

      include 'include/header.php';
    ?>

<body class="hold-transition ">
<div class="wrapper">

 
  
<?php include 'include/hnav.php'; ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <!-- /.content-header -->

    <!-- Start of Staff Table -->
    <section class="content mt-3">
        <div class="container-fluid">

        <!-- success message -->
                <?php
                  if (isset($_GET["success"])){
                  ?>
                <p class="btn btn-success btn-block disabled col-md-11 mt-2 mx-auto" >You have successfully requested for Field Students! <a href="request_students.php" class="float-right text-light" style="font-size:18px;border:1px solid white;width:25px;"><i class="fa fa-times"></i></a></p>
                  <?php     
                }

                ?>

            
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-md-12">
        <div class="card">
            <div class="card-header bg-dark">
              <h3 class="card-title text-light"><i class="fa fa-download text-orange"></i>&nbsp; Request Field Students</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <!-- start of staff Registration Form -->
                <form action="config/studentRequest.php" method="post" class="form-group">
                    <div class="form-group col-md-12">
                        <label for="fname">Number Of Students</label>
                        <input type="text" name="students" id="" class="form-control" placeholder="Enter Number Of Students" required>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="fname">Description</label>
                        <textarea name="description" id="" class="form-control text-secondary">Enter the description of the type of students that you need.</textarea>
                    </div>
          
                    <div class="form-group col-md-6 float-left">
                        <label for="exampleInputEmail1">Category</label>
                        <select name="category" class="form-control bg-dark" required>
                            <?php
                                $sql12="select * from category";
                                $query=mysqli_query($conn,$sql12);

                                if(!$query){

                                  die(mysqli_error($conn));
                                }

                                while ($result=mysqli_fetch_array($query)) {
                                  $id=$result['cat_id'];
                                  $name=$result['cname'];
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
                        <label for="exampleInputEmail1">Academic Year</label>
                        <select name="year" class="form-control bg-dark" required>
                            <option value="all">All</option>
                            <option value="1">1st Year</option>
                            <option value="2">2nd Year</option>
                        </select>
                    </div>
                    <input type="text" name="host" value=" <?php echo $row['hid']; ?>" hidden>
                    


                    <!-- Register Button -->
                    <div class="form-group ">
                        <input type="submit" name="submit" id="" class="btn btn-block bg-orange text-light" value="Submit Request">
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
