<!-- This is the page contain the form for adding staff -->
<?php

    session_start();
    $id=$_SESSION['id'];
    $userid=$_GET['id'];
    if ($_SESSION['role']!='1') {
      header('Location:index.php');
    }

    else{
      include 'config/connection.php';
      $sql="SELECT * FROM user,staff,school,department,position
      WHERE user.user_id='$userid'
      AND staff.userId=user.id
      AND department.dept_id=staff.department
      AND school.school_id=department.school
      AND position.position_id=staff.position";
      $qry=mysqli_query($conn,$sql);
      $row=mysqli_fetch_array($qry);

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
            <a href="SingleStaff.php?id=<?php echo $_GET['id']; ?>" class="btn bg-orange text-white "><i class=" fa fa-user-tie"></i> View Editing Staff</a>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item "><a href="admin.html" class="text-orange">Home</a></li>
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
            <div class="card-header bg-dark">
              <h3 class="card-title text-light"><i class="fa fa-pen text-orange"></i> Edit Staff</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <!-- start of staff Registration Form -->
                <form action="config/EditUsers.php" method="post" class="form-group">
                    <div class="form-group col-md-6 float-left">
                        <label for="fname">Firstname</label>
                        <input type="text" name="fname" value="<?php echo $row['fname']; ?>" class="form-control" placeholder="Enter Firstname" required>
                    </div>
                    <div class="form-group col-md-6 float-left">
                        <label for="mname">Middlename</label>
                        <input type="text" name="mname" value="<?php echo $row['mname']; ?>" class="form-control" placeholder="Enter Middlename" required>
                    </div>
                    <div class="form-group col-md-6 float-left">
                        <label for="mname">Surname</label>
                        <input type="text" name="sname" value="<?php echo $row['lname']; ?>" class="form-control" placeholder="Enter Surname" required>
                    </div>
                    <div class="form-group col-md-6 float-left">
                        <label for="title">Title</label>
                        <select name="title" id="title" class="form-control bg-dark" required>
                          <option value="<?php echo $row['title']; ?>"><?php echo $row['title']; ?></option>
                          <option value="Mr.">Mr.</option>
                          <option value="Ms.">Ms.</option>
                          <option value="Dr.">Dr.</option>
                          <option value="Eng.">Eng.</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6 float-left">
                        <label for="mname">Staff ID</label>
                        <input type="text" name="sid" value="<?php echo $row['user_id']; ?>" class="form-control" placeholder="Enter Staff ID" required>
                    </div>

                    <div class="form-group col-md-6 float-left">
                        <label for="mname">Phonenumber</label>
                        <input type="text" name="pnumber" value="<?php echo $row['pnumber']; ?>" class="form-control" placeholder="Enter Phone number" required>
                    </div>
                    <div class="form-group col-md-6 float-left">
                        <label for="mname">Email</label>
                        <input type="email" name="email" value="<?php echo $row['email']; ?>" class="form-control" placeholder="Enter Email" required>
                    </div>

                    <div class="form-group col-md-6 float-left">
                        <label for="exampleInputEmail1">School/Faculty</label>
                        <select name="school" class="form-control bg-dark" required>
                          <option value="<?php echo $row['school']; ?>"><?php echo $row['sname']; ?></option>
                            <?php
                                $sql="select * from school";
                                $query=mysqli_query($conn,$sql);

                                if(!$query){

                                  die(mysqli_error($conn));
                                }

                                while ($result=mysqli_fetch_array($query)) {
                                  $school=$result['school_id'];
                                  $name=$result['sname'];
                                  ?>
                              <option value="<?php echo $school; ?>">
                                <?php echo $name; ?>
                              </option>

                                  <?php


                                }

                                ?>
                        </select>
                    </div>
                    <div class="form-group col-md-6 float-left">
                        <label for="exampleInputEmail1">Department</label>
                        <select name="department" class="form-control bg-dark" required>
                          <option value="<?php echo $row['dept_id']; ?>"><?php echo $row['dname']; ?></option>
                            <?php
                                $sql="select * from department";
                                $query=mysqli_query($conn,$sql);

                                if(!$query){

                                  die(mysqli_error($conn));
                                }

                                while ($result=mysqli_fetch_array($query)) {
                                  $id=$result['dept_id'];
                                  $name=$result['dname'];
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
                        <label for="exampleInputEmail1">Position</label>
                        <select name="position" class="form-control bg-dark" required>
                        <option  class="bg-orange" value="<?php echo $row['position']; ?>" ><?php echo $row['pname']; ?>

                      </option>


                            <?php
                                $sql="select * from position";
                                $query=mysqli_query($conn,$sql);

                                if(!$query){

                                  die(mysqli_error($conn));
                                }

                                while ($result=mysqli_fetch_array($query)) {
                                  $id=$result['position_id'];
                                  $name=$result['pname'];
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
                        <label for="sex">Sex</label>
                        <select name="sex" id="title" class="form-control bg-dark" required>
                        <option  class="bg-orange" ><?php echo $row['sex']; ?>
                          <option value="Male">Male</option>
                          <option value="MS.">Female</option>
                        </select>
                    </div>
                    <input type="text" name="user" value="<?php echo $row['user_id']; ?>" class="form-control" placeholder="Enter Phone number" hidden >
                    <!-- Register Button -->
                    <div class="form-group ">
                        <input type="submit" name="Editstaff" id="" class="btn btn-block bg-orange text-light" value="Save Changes">
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
