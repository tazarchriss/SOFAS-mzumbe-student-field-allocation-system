<?php
session_start();
include'connection.php';



// For logbook creation
if (isset($_POST['create'])) {
    $owner=$_POST['owner'];
  for ($i=8; $i>=1; $i--){
      echo $i;
      echo $owner;
      $sql="INSERT INTO `logbook`(`student`,`week`) VALUES('$owner','$i')";
      $qry=mysqli_query($conn,$sql);

      if (!$qry) {
        die(mysqli_error($conn));

      }




  }
  header(
    'Location:../my_logbooks.php?generated'
  );
}

// For activity insertion
if (isset($_POST['draft'])) {
  $day=$_POST['day'];
  $description=$_POST['description'];
  $hours=$_POST['hours'];
  $log=$_POST['logbook'];

  $sq="SELECT * FROM `logbook` WHERE `week`='$log'";
  $qr=mysqli_query($conn,$sq);
  $row=mysqli_fetch_array($qr);
  if (!$sq) {
    die(mysqli_error($conn));
  }
  else {

    $id=$row['log_id'];

    $sql="INSERT INTO `activity`(`day`,`logbook`,`hours`,`description`)
    VALUES('$day','$id','$hours','$description')";
    $qry=mysqli_query($conn,$sql);

    if (!$qry) {
      header(
        'Location:../my_logbooks.php?id='.$log
      );

    }


    header(
      'Location:../log_books.php?id='.$id
    );
  }



}



?>
