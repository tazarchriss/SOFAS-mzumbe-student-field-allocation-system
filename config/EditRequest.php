<?php
session_start();

require 'connection.php';

$host=$_SESSION['id'];
 if (isset($_POST['update'])) {
    $host=$_POST['host'];
    $description=$_POST['description'];
    $students=$_POST['students'];
    $category=$_POST['category'];
    $year=$_POST['year'];
    $status=$_POST['status'];
    $request=$_POST['request'];

      $sql="UPDATE `student_request` SET
      `students`='$students',
      `description`='$description',
      `category`='$category',
      `year`='$year',
      `ostatus`='$status'
      WHERE id='$request'";
      $qry=mysqli_query($conn,$sql);

      if (!$qry) {
        die(mysqli_error($conn));
      }
      else{
          header('Location:../SingleHostRequest.php?id='.$request);
      }

 }
 ?>
