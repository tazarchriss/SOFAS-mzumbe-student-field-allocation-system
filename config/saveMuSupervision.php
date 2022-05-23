<?php
 session_start();
require_once('connection.php');
    if(isset($_POST['save'])){

      $zone=$_POST['zone'];
      $supervisor=$_POST['supervisor'];
      $year = date("Y");


      $sql="INSERT INTO `mu_supervision`(`supervisor`, `zone`, `year`) VALUES ('$supervisor', '$zone','$year')";
      $qry=mysqli_query($conn,$sql);


      if (!$qry) {
        die(mysqli_error($conn));
      }
      else {

           header('Location:../usupervisors.php?success');


          }



      }

      // For Update
      if(isset($_POST['update'])){

        $zone=$_POST['zone'];
        $supervisor=$_POST['supervisor'];
        $year = date("Y");


        $sql="UPDATE `mu_supervision`

        SET
         `zone`='$zone'
        WHERE
         `supervisor`='$supervisor'";
        $qry=mysqli_query($conn,$sql);


        if (!$qry) {
          die(mysqli_error($conn));
        }
        else {

             header('Location:../usupervisors.php?success');


            }



        }


?>
