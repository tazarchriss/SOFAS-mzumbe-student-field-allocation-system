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
            <a href="host.php" class="nav-link active">
              <i class="nav-icon fas fa-users"></i>
                Dashboard
            </a>

          </li>

          <!-- request field students -->

          <li class="nav-item menu-open">
            <a href="request_students.php" class="nav-link active">
              <i class="nav-icon fas fa-download"></i>
                Request Field Students
            </a>

          </li>
          <?php

          $sql200="SELECT * FROM host,user,student_request,category WHERE user.id='$id' and host.name=user.user_id and student_request.host=host.hid and category.cat_id=student_request.category ";
          $qry200=mysqli_query($conn,$sql200);
          if(mysqli_num_rows($qry200)!=0){

          ?>
                  <!-- Student Request Status -->
            <li class="nav-item menu-open">
            <a href="students_requests.php" class="nav-link active">
              <i class="nav-icon fas fa-clock"></i>
                Student Requests
            </a>

          </li>

          <?php } ?>
          <!-- Field Requests -->
          <li class="nav-item menu-open">
            <a href="host_attachments.php" class="nav-link active">
              <i class="nav-icon fas fa-clipboard"></i>
              Attachment Requests
            </a>

          </li>
                   <!-- Field Students -->

          <li class="nav-item menu-open">
            <a href="host_students.php" class="nav-link active">
              <i class="nav-icon fas fa-users"></i>
                Field Students
            </a>

          </li>

          <!-- Add Host Supervisor -->
          <li class="nav-item menu-open">
            <a href="AddHost_Supervisor.php" class="nav-link active">
              <i class="nav-icon fas fa-user-plus"></i>
                Add Supervisor
            </a>

          </li>
          <!-- Our Supervisors -->
          <li class="nav-item menu-open">
            <a href="my_supervisors.php" class="nav-link active">
              <i class="nav-icon fas fa-user-tie"></i>
                Supervisors
            </a>

          </li>



          <!--Field Reports -->

          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-file"></i>
                Field Reports
            </a>

          </li>
          <!--profile -->

            <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-school"></i>
                Profile
            </a>

          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
