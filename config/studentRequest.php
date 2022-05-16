<!-- This is the page that performs field student request submission  -->
<?php
session_start();

require 'connection.php';

$host=$_SESSION['id'];
 if (isset($_POST['submit'])) {
    $host=$_POST['host'];
    $description=$_POST['description'];
    $students=$_POST['students'];
    $category=$_POST['category'];
    $year=$_POST['year'];
  
      $sql="INSERT INTO `student_request`(`host`, `students`, `description`, `category`, `year`, `ostatus`,`remaining`) VALUES('$host', '$students', '$description', '$category', '$year', 'Available', '$students')";
      $qry=mysqli_query($conn,$sql);

      if (!$qry) {
        die(mysqli_error($conn));
      }
      else{
          header('Location:../request_students.php?success');
      }

 }
 ?>
