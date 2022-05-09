<!-- This file performs the operations for adding various users -->
<?php

require_once('connection.php');

// For staff Registration
if(isset($_POST['staff']))
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

  
//    query preparation
    $qry="INSERT INTO `user`(`fname`, `mname`, `lname`, `user_id`, `sex`, `email`, `pnumber`, `password`, `avatar`, `role`) VALUES ('$fname', '$mname', '$lname','$user_id','$sex','$email','$pnumber','$password','user.png', '2')";
// query execution 
    $register=mysqli_query($conn,$qry);
    $sql1="select * from user where `user_id`='$user_id'";
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
      $sql2="select * from users where `user_no`='$user_no'";
      $qry2=mysqli_query($conn,$sql2);
      $res2=mysqli_fetch_array($qry2);
      $userId=$res['id'];
      

      $query="INSERT INTO `staff`(`title`, `department`, `position`, `userId`) VALUES ('$title', '$department', '$position', '$userId')";
      $qry3=mysqli_query($conn,$query);
      if(!$qry3){
        die(mysqli_error($conn));
      echo "failed";
      }else{
        header('location:../AddStaff.php?success');
      }
   
 }
}
}


// For student registration

if(isset($_POST['student']))
{
    $fname=$_POST['fname'];
    $mname=$_POST['mname'];
    $lname=$_POST['sname'];
    $password=$lname;
    $user_id=$_POST['regno'];
    $email=$_POST['email'];
    $pnumber=$_POST['pnumber'];
    $sex=$_POST['sex'];
    $programme=$_POST['programme'];
    $year=$_POST['year'];
 

  
//    query preparation
    $qry="INSERT INTO `user`(`fname`, `mname`, `lname`, `user_id`, `sex`, `email`, `pnumber`, `password`, `avatar`, `role`) VALUES ('$fname', '$mname', '$lname','$user_id','$sex','$email','$pnumber','$password','user.png', '3')";
// query execution 
    $register=mysqli_query($conn,$qry);
    $sql1="select * from user where `user_id`='$user_id'";
    $qry1=mysqli_query($conn,$sql1);
    $res=mysqli_fetch_array($qry1);

    if(!$register){
      
        header('Location:../Addstudent.php?NO');
    }
    else{
    if (mysqli_num_rows($qry1)==0) {
    header('Location:../Addstudent.php?fail');
    }
    

 

    else
    {
      $sql2="select * from users where `user_no`='$user_no'";
      $qry2=mysqli_query($conn,$sql2);
      $res2=mysqli_fetch_array($qry2);
      $userId=$res['id'];
      

      $query="INSERT INTO `student`(`program`, `year`, `status`, `userId`) VALUES ('$programme', '$year', 'continous', '$userId')";
      $qry3=mysqli_query($conn,$query);
      if(!$qry3){
        die(mysqli_error($conn));
      echo "failed";
      }else{
        header('location:../AddStaff.php?success');
      }
   
 }
}
}


// For Organization registration
if(isset($_POST['organization']))
{
    $name=$_POST['name'];
    $address=$_POST['address'];
    $email=$_POST['email'];
    $email=$_POST['email'];
    $tel=$_POST['tel'];
    $region=$_POST['region'];
    $type=$_POST['type'];
    
 

  
//    query preparation
    $qry="INSERT INTO `host`(`name`, `type`, `Address`, `email`, `tel`, `region`) VALUES ('$name', '$type', '$address','$email','$tel','$region')";
// query execution 
    $register=mysqli_query($conn,$qry);
 

    if(!$register){
      die(mysqli_error($conn));
        // header('Location:../AddOrganization.php?NO');
    }
    else{
  
    header('Location:../organizations.php?success');
    }
    
}
// <!-- For university officers -->
if(isset($_POST['officer1']))
{
    $fname=$_POST['fname'];
    $mname=$_POST['mname'];
    $lname=$_POST['lname'];
    $password=$_POST['password'];
    $university=$_POST['university'];
    $email=$_POST['email'];
    $pnumber=$_POST['pnumber'];
    $cpassword=$_POST['password'];

    if ($password!=$cpassword) {
      header('Location:../adduniofficer.php');
    }
  
//    query preparation
    $qry="INSERT INTO `users`(`fname`, `mname`, `sname`, `email`, `pnumber`, `password`, `role`, `user_no`) VALUES ('$fname','$mname','$lname', '$email', '$pnumber','$password', '3','$university ')";
// query execution 
   $register=mysqli_query($conn,$qry);
  if(!$register){
      die(mysqli_error($conn));
    echo "failed";
    }

    else {
    $sql2="Select* from users where email='$email'";
    $qry2=mysqli_query($conn,$sql2);
    $row2=mysqli_fetch_array($qry2);
    $usr=$row2['user_id'];
    $sql3="INSERT INTO `officer`( `user_id`, `university_id`) VALUES ('$usr','$university')";
    $qry3=mysqli_query($conn,$sql3);
   

   header('location:../viewuniofficer.php?success');
 }
}

// For Administrators

if(isset($_POST['officer2']))
{
    $fname=$_POST['fname'];
    $mname=$_POST['mname'];
    $lname=$_POST['lname'];
    $password=$_POST['password'];
    $role=$_POST['role'];
    $email=$_POST['email'];
    $pnumber=$_POST['pnumber'];
    $cpassword=$_POST['password'];

    if ($password!=$cpassword) {
      header('Location:../addtcuofficer.php');
    }
  
//    query preparation
    $qry="INSERT INTO `users`(`fname`, `mname`, `sname`, `email`, `pnumber`, `password`, `role`, `user_no`) VALUES ('$fname','$mname','$lname', '$email', '$pnumber','$password', '$role','admin')";
// query execution 
   $register=mysqli_query($conn,$qry);
  if(!$register){
      die(mysqli_error($conn));
    echo "failed";
    }

    else {
   

   header('location:../viewuniofficer.php?success');
 }
}
?>
