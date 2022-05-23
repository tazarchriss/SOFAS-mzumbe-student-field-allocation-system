<!-- This file allows organizations to accepts the Student's attachment Request -->
<?php

include 'connection.php';

$id=$_GET['id'];
$year = date("Y");
$Date = "2019-05-10";

// Add days to date and display it
$end_date=date('Y-m-d', strtotime($Date. ' + 56 days'));

$sql="UPDATE `attachment_request`  SET `status`='Allocated'  WHERE `att_id`='$id'";
$qry=mysqli_query($conn,$sql);



if (!$qry) {
  die(mysqli_error($conn));
}
else
{
$sql="INSERT INTO `allocation`(`attachment`,`year`,`start_date`,`end_date`) VALUES ('$id','$year','$Date','$end_date')";
$qry=mysqli_query($conn,$sql);
if (!$qry) {
  die(mysqli_error($conn));
}
else{
  header(
    'Location:../host_students.php'
  );
}
}


?>
