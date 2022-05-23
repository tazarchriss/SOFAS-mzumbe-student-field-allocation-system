<?php

include 'connection.php';

$id=$_GET['id'];
$year = date("Y");
$Date = "2019-05-10";

// Add days to date and display it
$end_date=date('Y-m-d', strtotime($Date. ' + 56 days'));

$sql="UPDATE `allocation`  SET `alloc_status`='Arrived'  WHERE `alloc_id`='$id'";
$qry=mysqli_query($conn,$sql);



if (!$qry) {
  die(mysqli_error($conn));
}
else
{
  header(
    'Location:../host_students.php'
  );
}


?>
