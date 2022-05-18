<!-- This file contain the navbar of the host dashboard -->

   <!-- Navbar -->
   <nav class="main-header navbar navbar-expand navbar-white bg-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
        <a class="nav-link text-light" data-widget="pushmenu" href="#" role="button"><i class="fa fa-bars"></i></a>
      </li>

      <li class="nav-item d-none d-sm-inline-block">
        <a href="index.html" class="nav-link text-light text-bold">
            <img src="logo.jpg" style="width:30px;">
            MU-SOFAS
        </a>
      </li>

    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">




        <li class="nav-item">
          <a class="nav-link text-light" data-widget="fullscreen" href="#" role="button">

            <i class="fas fa-school"></i>  <?php echo $_SESSION['userID']; ?>
          </a>
        </li>
        <li class="nav-item">
        <a class="nav-link text-light" href="config/logout.php" role="button">
            <i class="fas fa-power-off"></i> Log Out
          </a>
        </li>
      </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-orange elevation-4">


    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-1 d-flex">
        <div class="image">
          <img src="user.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Username</a>
        </div>
      </div>



      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

        <!-- Dashboard Section -->
        <li class="nav-item menu-open">
            <a href="student.php" class="nav-link active">
              <i class="nav-icon fas fa-users"></i>
                Dashboard
            </a>

          </li>
                <?php

                $student=$_SESSION['id'];
                $sql100="SELECT * FROM attachment_request WHERE student='$student'";
                $qry100=mysqli_query($conn,$sql100);
                if(mysqli_num_rows($qry100)==0){

          ?>

          <!-- request field students -->
          <li class="nav-item menu-open">
            <a href="request_attachment.php" class="nav-link active">
              <i class="nav-icon fas fa-download"></i>
                Request Attachment
            </a>

          </li>
          <?php } ?>
          <!-- Attachment request status -->
          <?php

                // $student=$_SESSION['id'];
                // $sql100="SELECT * FROM attachment_request WHERE student='$student'";
                // $qry100=mysqli_query($conn,$sql100);
                if(mysqli_num_rows($qry100)!=0){
                $data=mysqli_fetch_array($qry100);

                if($data['status']!='Allocated'){
          ?>

          <li class="nav-item menu-open">
            <a href="student_allocation.php" class="nav-link active">
              <i class="nav-icon fas fa-clipboard"></i>
                Request Status
            </a>
           <?php }
           else { ?>
          </li>

                 <!-- Field Requests -->
                 <li class="nav-item menu-open">
            <a href="my_allocation.php" class="nav-link active">
              <i class="nav-icon fas fa-clipboard"></i>
                My Allocation
            </a>

          </li>
          <?php }
                }?>

  <!-- Add Host Supervisor -->
          <li class="nav-item menu-open">
            <a href="my_supervision.php" class="nav-link active">
              <i class="nav-icon fas fa-user-tie"></i>
                My Supervisors
            </a>

          </li>

                   <!-- Field Students -->

          <li class="nav-item menu-open">
            <a href="log_books.php" class="nav-link active">
              <i class="nav-icon fas fa-file"></i>
                Log Books
            </a>

          </li>




          </li>



          <!--Field Reports -->

          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-download"></i>
                Submit Report
            </a>

          </li>
          <!--profile -->

            <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-user"></i>
                Profile
            </a>

          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
