<!-- User Editing Page -->

<?php

require_once('connection.php');

// For staff Editing
if(isset($_POST['Editstaff']))
{
    $fname=$_POST['fname'];
    $mname=$_POST['mname'];
    $lname=$_POST['sname'];
    $password=$lname;
    $user_id=$_POST['sid'];
    $email=$_POST['email'];
    $pnumber=$_POST['pnumber'];
    $sex=$_POST['sex'];
    $title=$_POST['title'];
    $school=$_POST['school'];
    $position=$_POST['position'];
    $department=$_POST['department'];
    $user=$_POST['user'];


//    query preparation
    $qry="UPDATE `user` SET
    `fname`='$fname',
    `mname`='$mname',
    `lname`='$lname',
    `user_id`='$user_id',
    `sex`='$sex',
    `email`='$email',
    `pnumber`='$pnumber'
    WHERE `user_id`='$user'";
// query execution
    $register=mysqli_query($conn,$qry);
    $sql1="select * from user where `user_id`='$user_id'";
    $qry1=mysqli_query($conn,$sql1);
    $res=mysqli_fetch_array($qry1);

    if(!$register){

        header('Location:../EditStaff.php?NO');
    }
    else{
    if (mysqli_num_rows($qry1)==0) {
    header('Location:../EditStaff.php?fail');
    }
    else
    {
      $sql2="select * from user where `user_id`='$user_id'";
      $qry2=mysqli_query($conn,$sql2);
      $res2=mysqli_fetch_array($qry2);
      $userId=$res['id'];


      $query="UPDATE `staff` SET
      `title`='$title',
      `department`='$department',
      `position`='$position'
      WHERE userId='$userId'
      ";
      $qry3=mysqli_query($conn,$query);
      if(!$qry3){
        die(mysqli_error($conn));
      echo "failed";
      }else{
        header('location:../SingleStaff.php?id='.$user_id);
      }

 }
}
}



// For student Editing

if(isset($_POST['EditStudent']))
{



  $fname=$_POST['fname'];
  $mname=$_POST['mname'];
  $lname=$_POST['sname'];
  $user_id=$_POST['regno'];
  $email=$_POST['email'];
  $pnumber=$_POST['pnumber'];
  $sex=$_POST['sex'];
  $programme=$_POST['programme'];
  $year=$_POST['year'];

      $qry="UPDATE `user` SET
      `fname`='$fname',
      `mname`='$mname',
      `lname`='$lname',
      `user_id`='$user_id',
      `sex`='$sex',
      `email`='$email',
      `pnumber`='$pnumber'
      WHERE `user_id`='$user_id'";
    // query execution
      $register=mysqli_query($conn,$qry);
      $sql1="select * from user where `user_id`='$user_id'";
      $qry1=mysqli_query($conn,$sql1);
      $res=mysqli_fetch_array($qry1);

    if(!$register){

        header('Location:../EditStudent.php?NO');
    }
    else{
    if (mysqli_num_rows($qry1)==0) {
    header('Location:../EditStudent.php?fail');
    }
    echo 'updated !';


}
      $user=$res['id'];
      $sql="UPDATE `student` SET
      `program`='$programme',
      `year`='$year'
      WHERE `userid`='$user'
      ";
      $qry=mysqli_query($conn,$sql);

      if (!$qry) {
        die(mysqli_error($conn));
      }
      else{
        header('Location:../SingleStudent.php?id='.$user_id);
      }
}


// For Organization registration
if(isset($_POST['EditOrganization']))
{
    $name=$_POST['name'];
    $address=$_POST['address'];
    $email=$_POST['email'];
    $tel=$_POST['tel'];
    $region=$_POST['region'];
    $type=$_POST['type'];
    $user=$_POST['user'];
    $hname=$_POST['hname'];




//    query preparation
    $qry="UPDATE `host` SET
    `name`='$name',
    `type`='$type',
    `Address`='$address',
    `email`='$email',
    `tel`='$tel',
    `region`='$region'
    WHERE `hid`='$user'";
// query execution
    $register=mysqli_query($conn,$qry);


    if(!$register){
      die(mysqli_error($conn));
        // header('Location:../AddOrganization.php?NO');
    }
    else{
      $sql1="select * from user where `fname`='$hname'";
      $qry1=mysqli_query($conn,$sql1);
      $res=mysqli_fetch_array($qry1);
      $userId=$res['id'];

      $query="UPDATE `user` SET
      `fname`='$name',
      `mname`='$name',
      `lname`='$name',
      `user_id`='$name',
      `email`='$email'
      WHERE `id`='$userId'";
      $qry3=mysqli_query($conn,$query);
      if(!$qry3){
        die(mysqli_error($conn));
      echo "failed";
      }else{
        header('location:../SingleOrganization.php?id='.$user);
      }
    }

}


?>
