<!-- This file is used to upload users profile image -->
<?php
session_start();
include'connection.php';
if (isset($_POST['upload'])) {
    $file=$_FILES['file'];
    print_r($file);
    $fileName=$_FILES['file']['name'];
    $fileTmpName=$_FILES['file']['tmp_name'];
    $fileSize=$_FILES['file']['size'];
    $fileError=$_FILES['file']['error'];

    $fileExt=explode('.',$fileName);
    $fileActualExt=strtolower(end($fileExt));

    $allowed=array('doc','docx','pdf');
    if(in_array($fileActualExt,$allowed)){
        if ($fileError===0) {
            if ($fileSize<10000000) {
                $fileNameNew=uniqid('',true).".".$fileActualExt;
                $fileDestination='../uploads/reports/'.$fileNameNew;
                $id=$_SESSION['id'];
                $year=date('Y');
                $sql1="INSERT INTO `report`(`owner`, `document`,`year`,`rep_status`) VALUES ('$id','$fileNameNew','$year','submitted')";
                $qry1=mysqli_query($conn,$sql1);
                move_uploaded_file($fileTmpName,$fileDestination);

                header("Location:../submit_report.php?success");
            }else {
                echo "You file is too big !";
            }
        }else {
            echo "There was an error uploading your file !";
        }
    }else{
        echo 'you cannot upload files of this type !';
    }
}
?>
