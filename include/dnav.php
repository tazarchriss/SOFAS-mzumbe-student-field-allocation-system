<!-- This is the page containing admin navbar -->
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
          <a class="nav-link text-light" >
            <i class="fas fa-user-tie"></i>  <?php echo $_SESSION['userID']; ?>
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
  <aside class="main-sidebar sidebar-dark-primary elevation-4">


    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-1 d-flex">
        <div class="image">
          <img src="uploads/avatars/<?php echo $_SESSION['avatar']?>" class="img-circle elevation-3"   alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"> <?php echo $_SESSION['fname'].' '.$_SESSION['lname']; ?></a>
        </div>
      </div>


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column " data-widget="treeview" role="menu" data-accordion="false">

        <!-- Dashboard -->
        <li class="nav-item ">
            <a href="dean.php" class="nav-link text-light bg-orange">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard

              </p>
            </a>

          </li>
          <div class="dropdown-divider"></div>
        <!-- Manage users  -->
          <li class="nav-item ">
            <a href="#" class="nav-link bg-orange ">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Manage School
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="dean_hods.php" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>HODs</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="dean_coordinators.php" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Coordinators</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="dean_staffs.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Staffs</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="dean_students.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Students</p>
                </a>
              </li>
            </ul>
          </li>
          <div class="dropdown-divider"></div>
        <!--Manage Organizations  -->
        <li class="nav-item ">
            <a href="#" class="nav-link bg-orange ">
              <i class="nav-icon fas fa-school"></i>
              <p>
                Organizations
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <!-- <li class="nav-item">
                <a href="AddOrganization.html" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Register Organization</p>
                </a>
              </li> -->
              <li class="nav-item">
                <a href="organizations.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Organizations</p>
                </a>
              </li>

            </ul>
          </li>
          <div class="dropdown-divider"></div>
        <!-- Manage Supervision -->
        <li class="nav-item ">
            <a href="#" class="nav-link bg-orange ">
              <i class="nav-icon fas fa-user-tie"></i>
              <p>
                Supervisions
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="usupervisors.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Mu-Supervisors</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="hsupervisors.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Host-Supervisors</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index3.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Grades</p>
                </a>
              </li>
            </ul>
          </li>
          <div class="dropdown-divider"></div>
              <!-- students reports -->
              <li class="nav-item ">
            <a href="" class="nav-link text-light bg-orange">
              <i class="nav-icon fas fa-file"></i>
              <p>
                Reports

              </p>
            </a>

          </li>
          <div class="dropdown-divider"></div>
        <!-- profile -->
        <li class="nav-item ">
            <a href="user_profile.php?id=<?php echo $_SESSION['id']?>" class="nav-link text-light bg-orange">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Profile

              </p>
            </a>

          </li>

        </ul>

      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
