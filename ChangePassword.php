<!-- This is the page that allows users to update their informations -->

<?php
    session_start();
    $id=$_SESSION['id'];
    $name=$_SESSION['fname'];
    if ($_SESSION['role']=='') {
      header('Location:index.php');
    }

    else
// Fetching user details
include 'config/connection.php';
$sql="SELECT * FROM user WHERE id='$id'";
$qry=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($qry);


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
if($_SESSION['role']=='3'){
  include 'include/hnav.php';
}
if($_SESSION['role']=='6'){
  include 'include/hsnav.php';
}
if($_SESSION['role']=='4'){
  include 'include/snav.php';
}

?>

<div class="content-wrapper">

    <section class="content" style="margin-top:5%;">
        <div class="container-fluid">
          <div class="row">
            <!-- left column -->
            <div class="col-md-12" style="margin:auto;">
              <!-- jquery validation -->
              <div class="card ">
                <div class="card-header text-center bg-dark">
                  <h3 class="card-title text-light text-bold" style="text-align: center;"> <i> </i></h3>
                </div>
                <!-- /.card-header -->
                 <!-- Profile update success message -->
                 <?php
                  if (isset($_GET["success"])){
                  ?>
                <h3 class="text-primary " style="margin-left:20px;">Profile Image is successfully updated !</h3>
                  <?php
                }

                ?>
                <!-- form start -->
                <form id="quickForm" method="post" action="config/passchange.php">
                  <div class="card-body">
                    <div class="form-group col-md-12">
                        <label for="exampleInputPassword1">Current Password</label>
                        <input type="password" name="opass" class="form-control" id="exampleInputPassword1" placeholder="Password">
                      </div>
                    <div class="form-group col-md-12">
                        <label for="exampleInputPassword1">New Password</label>
                        <input type="password" name="pass1" class="form-control" id="exampleInputPassword1" placeholder="New Password">
                      </div>
                      <div class="form-group col-md-12">
                          <label for="exampleInputPassword1">Confirm New Password</label>
                          <input type="password" name="pass2" class="form-control" id="exampleInputPassword1" placeholder="Connfirm New Password">
                        </div>


                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                  <button type="submit" class="btn btn-lg bg-orange btn-block" name="save">Change Password</button>

                  </div>
                </form>
                <!-- upload mechanism -->


                </div>
              <!-- /.card -->
              </div>
            <!--/.col (left) -->
            <!-- right column -->

            <!--/.col (right) -->
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </section>
              </div>
              <footer class="main-footer bg-dark text-center">
    <br>
    <strong>Copyright &copy; 2021/2022 <a href="" class="text-orange">TazarChriss </a>.</strong>
    All rights reserved.
    <div class="mt-4">
        <h1></h1>
    </div>
  </footer>
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- jquery-validation -->
<script src="plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="plugins/jquery-validation/additional-methods.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- Page specific script -->

</body>
</html>
