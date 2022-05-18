<?php

session_start();
$host=$_SESSION['fname'];
require_once('connection.php');

// For staff Registration
if(isset($_POST['staff']))
{
    $fname=$_POST['fname'];
    $mname=$_POST['mname'];
    $lname=$_POST['sname'];
    $password=$_POST['password'];
    $email=$_POST['email'];
    $pnumber=$_POST['pnumber'];
    $sex=$_POST['sex'];
    $title=$_POST['title'];




//    query preparation
    $qry="INSERT INTO `user`(`fname`, `mname`, `lname`, `user_id`, `sex`, `email`, `pnumber`, `password`, `avatar`, `role`) VALUES ('$fname', '$mname', '$lname','$lname','$sex','$email','$pnumber','$password','user.png', '6')";
// query execution
    $register=mysqli_query($conn,$qry);
    $sql1="select * from user where `user_id`='$lname'";
    $qry1=mysqli_query($conn,$sql1);
    $res=mysqli_fetch_array($qry1);

    if(!$register){

        header('Location:../Addstaff.php?NO');
    }
    else{
    if (mysqli_num_rows($qry1)==0) {
    header('Location:../Addstaff.php?fail');
    }


    else
    {
      $sql2="SELECT * FROM host,user
      WHERE host.name='$host'
      AND user.user_id='$lname'";
      $qry2=mysqli_query($conn,$sql2);
      $res2=mysqli_fetch_array($qry2);
      $supervisor=$res['id'];

      // echo $supervisor;
      // echo $host;
      $org= $res2['hid'];
      $year = date("Y");

      $query="INSERT INTO `host_supervisors`(`title`, `host`, `supervisor`, `year`) VALUES ('$title', '$org', '$supervisor', '$year')";
      $qry3=mysqli_query($conn,$query);
      if(!$qry3){
        die(mysqli_error($conn));
      echo "failed";
      }else{
        header('location:../AddHost_Supervisor.php?success');
      }

 }




}
}

