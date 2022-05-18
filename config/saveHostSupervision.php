<?php
 session_start();
require_once('connection.php');
    if(isset($_POST['save'])){
      $supervisor=$_POST['supervisor'];
      $allocation=$_POST['allocation'];

      echo $supervisor;
      echo $allocation;

      $sql="UPDATE `allocation` SET `host_supervisor`='$supervisor',`alloc_status`='Assigned' WHERE `alloc_id`='$allocation'";
      $qry=mysqli_query($conn,$sql);
      if (!$qry) {
        die(mysqli_error($conn));
      }
      else{
        header('Location:../host_students.php?saved');
      }


    }


?>
