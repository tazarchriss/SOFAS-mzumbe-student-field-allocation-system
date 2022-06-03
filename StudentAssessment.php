<!-- This is the page for managing all the staffs  --><!-- This is a page for Admin Home page -->
<?php

    session_start();
    $id=$_SESSION['id'];
    $name=$_GET['id'];
    if ($_SESSION['role']=='') {
      header('Location:index.html');
    }

    else{
      include 'config/connection.php';
      $sql="SELECT * FROM host,student_request,attachment_request,
      user,region,allocation
      WHERE user.id=attachment_request.student
      and  attachment_request.att_id='$name'
      and host.hid=student_request.host
      and region.reg_id=host.region
      and allocation.attachment='$name'
      and student_request.id=attachment_request.request";
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

if ($_SESSION['role']=='6') {
  include 'include/hsnav.php';
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
        <div class="card ">
            <div class="card-header bg-dark">
              <h3 class="card-title"><i class="fa fa-user"></i> Student Assessment</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                     <?php

                    if (mysqli_num_rows($qry) == 0){


                    ?>
                   <h4 class="text-dark text-center">Sorry student is not found!</h4>
                   <div class="row">
                    <?php

                    }

                    else{
                        $row=mysqli_fetch_array($qry);
                        $student=$row['id'];
                        $year=date('Y');
                        $sql1="SELECT * FROM assessment WHERE student='$student' AND year='$year'";
                        $qry1=mysqli_query($conn,$sql1);

                        if (mysqli_num_rows($qry1)>0) {
                          $stud=mysqli_fetch_array($qry1);
                            ?>

                              <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                      <th>
                                      <h4>Student: <?php echo $row['fname'].' '.$row['mname'].' '.$row['lname']; ?> </h4>
                                      </th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <td>
                                    <label for="interest">Students's ability to get into working environment</label>
                                    </td>
                                    <td>
                                      <label for=""><?php  echo $stud['panctuality']; ?></label>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>
                                    <label for="interest">Students's devotion to and interest in his/her project</label>
                                    </td>
                                    <td>
                                      <label for="">
                                      <?php echo $stud['devotion']; ?>
                                      </label>

                                    </td>
                                  </tr>
                                  <tr>
                                    <td>
                                    <label for="interest">Students's willingness to receive advice and guidance related project</label>
                                    </td>
                                    <td>
                                    <label for=""><?php echo $stud['advice']; ?></label>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>
                                    <label for="interest">Students's ability to undertake and perform assigned tasks </label>
                                    </td>
                                    <td>
                                    <label for=""><?php echo $stud['tasks']; ?></label>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>
                                    <label for="interest">Students's progress in relation to his/her works plan</label>
                                    </td>
                                    <td>
                                    <label for=""><?php echo $stud['progress']; ?></label>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>
                                    <label for="interest">Students's relationship with fellow workers</label>
                                    </td>
                                    <td>
                                    <label for=""><?php echo $stud['relation']; ?></label>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>
                                    <label for="interest">General discipline (adherence to land down rules,regulations and procedures of the Organization) </label>
                                    </td>
                                    <td>
                                    <label for=""><?php echo $stud['discipline']; ?></label>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>
                                    <label for="interest">Ability to analyze,solve problems and work independently</label>
                                    </td>
                                    <td>
                                    <label for=""><?php echo $stud['independence']; ?></label>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>
                                    <label for="interest">Initiative and Creativity</label>
                                    </td>
                                    <td>
                                    <label for=""><?php echo $stud['creativity']; ?></label>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>
                                    <label for="interest">Attentiveness and willingness to learn new things</label>
                                    </td>
                                    <td>
                                    <label for=""><?php echo $stud['attentivenes']; ?></label>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>
                                    <h6>TOTAL MARKS</h6>
                                    </td>
                                    <td>
                                    <h6>
                                    <?php echo $stud['total']; ?>
                                    </h6>

                                    </td>

                                  </tr>
                                </tbody>
                                <tfoot>

                                </tfoot>
                              </table>
                              <hr>
                              <div class="card">
                                <div class="card-header bg-dark"> <i class="fa fa-user-tie"></i> Supervisor's Comment</div>
                                <div class="card-body">
                                  <textarea name="" class="form-control" disabled ><?php echo $stud['comment']; ?>
                                  </textarea >
                                </div>
                              </div>
<?php

                        }else{
                          if ($_SESSION['role']!='6') {
                            ?>

                        <h4>Names: <?php echo $row['fname'].' '.$row['mname'].' '.$row['lname']; ?> </h4>
                        <h5 class="text-center">Student has not been assessed !</h5>
<?php
                          }
                          else{
                      ?>


                      <div class="col-md-12">
                        <h4>Student: <?php echo $row['fname'].' '.$row['mname'].' '.$row['lname']; ?> </h4>
                        <form action="config/assessment.php" method="post">
                          <input type="text" name="id" value='<?php echo $name; ?>' hidden>
                          <input type="text" name="student" value='<?php echo $row['id']; ?>' hidden>
                          <div class="mb-3">
                            <label for="interest">Students's ability to get into working environment</label>
                            <input type="text" name="panctuality" class="form-control" placeholder="Maximum score 5">
                          </div>

                          <div class="mb-3">
                            <label for="interest">Students's devotion to and interest in his/her project</label>
                            <input type="text" name="devotion" class="form-control" placeholder="Maximum score 5">
                          </div>
                          <div class="mb-3">
                            <label for="interest">Students's willingness to receive advice and guidance related project</label>
                            <input type="text" name="advice" class="form-control" placeholder="Maximum score 10">
                          </div>
                          <div class="mb-3">
                            <label for="interest">Students's ability to undertake and perform assigned tasks </label>
                            <input type="text" name="tasks" class="form-control" placeholder="Maximum score 10">
                          </div>
                          <div class="mb-3">
                            <label for="interest">Students's progress in relation to his/her works plan</label>
                            <input type="text" name="progress" class="form-control" placeholder="Maximum score 10">
                          </div>
                          <div class="mb-3">
                            <label for="interest">Students's relationship with fellow workers</label>
                            <input type="text" name="relation" class="form-control" placeholder="Maximum score 10">
                          </div>
                          <div class="mb-3">
                            <label for="interest">General discipline (adherence to land down rules,regulations and procedures of the Organization) </label>
                            <input type="text" name="discipline" class="form-control" placeholder="Maximum score 10">
                          </div>
                          <div class="mb-3">
                            <label for="interest">Ability to analyze,solve problems and work independently</label>
                            <input type="text" name="independence" class="form-control" placeholder="Maximum score 15">
                          </div>
                          <div class="mb-3">
                            <label for="interest">Initiative and Creativity</label>
                            <input type="text" name="creativity" class="form-control" placeholder="Maximum score 10">
                          </div>
                          <div class="mb-3">
                            <label for="interest">Attentiveness and willingness to learn new things</label>
                            <input type="text" name="attentiveness" class="form-control" placeholder="Maximum score 10">
                          </div>



                      </div>



            </div>

          </div>



        <br>
        <div class="card">
            <div class="card-header bg-dark">
              <h3 class="card-title"><i class="fa fa-user-tie"></i> Organization Supervisor</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <?php
                  $sql="SELECT * FROM host_supervisors,allocation,attachment_request,user
                  WHERE user.id=allocation.host_supervisor
                  and  attachment_request.att_id='$name'
                  and host_supervisors.supervisor=user.id
                  and allocation.attachment=attachment_request.att_id";
                  $qry=mysqli_query($conn,$sql);
                    if (mysqli_num_rows($qry) == 0){


                    ?>
                   <h4 class="text-dark text-center">Sorry,Host Supervisor Supervisor has not been Assigned!</h4>

                    <?php

                    }

                    else{
                        $row=mysqli_fetch_array($qry);
                      ?>

                <div class="col-md-12">
                  <label for="comment">Supervisor's Comment</label>
                  <textarea name="comment" id="" class="form-control" rows="5"></textarea>
                  <input type="text" name="supervisor" value="<?php echo $row['id']; ?>" hidden>



                  <hr>
                  <div class="col-md-6">
                    <button type="submit" name="asses" class="bg-orange btn">Submit Assessment</button>
                  </div>
            </div>
                  </div>
            <!-- /.card-body -->
          </div>
        </div>
          </div>
          </div>
          </form>
          <?php }
                        }
                      }
                    }?>
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
