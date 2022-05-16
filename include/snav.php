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
          
          <!-- request field students -->
          <li class="nav-item menu-open">
            <a href="request_attachment.php" class="nav-link active">
              <i class="nav-icon fas fa-download"></i>
                Request Attachment
            </a>
           
          </li>
          <!-- Attachment request status -->
          <?php 

                $student=$_SESSION['id'];
                $sql100="SELECT * FROM attachment_request WHERE student='$student'";
                $qry100=mysqli_query($conn,$sql100);
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
            <a href="student_allocation.php" class="nav-link active">
              <i class="nav-icon fas fa-clipboard"></i>
                Allocation Status
            </a>
           
          </li>
          <?php }
                }?>

   
                   <!-- Field Students -->

          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-users"></i>
                Field Students
            </a>
           
          </li>

          <!-- Add Host Supervisor -->
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-user-plus"></i>
                Add Supervisor
            </a>
           
          </li>          
          <!-- Our Supervisors -->
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
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
