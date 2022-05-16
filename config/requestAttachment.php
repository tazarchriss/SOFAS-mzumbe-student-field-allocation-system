<!-- This is the page that sends the student's Attachment request -->
<?php
session_start();

require 'connection.php';

$student=$_SESSION['id'];
$request=$_GET['id'];
echo $request;
      $sql="INSERT INTO `attachment_request`(`request`, `student`,`status`)  VALUES('$request', '$student', 'Pending')";
      $qry=mysqli_query($conn,$sql);
echo $id;
      if (!$qry) {
        die(mysqli_error($conn));
      }
      else{
          header('Location:../request_attachment.php?success');
      }

 ?>
