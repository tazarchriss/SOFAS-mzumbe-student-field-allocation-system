<!-- Database configuration file -->
<?php
    $server='127.0.0.1';
    $user='root';
    $pass='';
    $dbname='sofas';

    $conn=mysqli_connect($server,$user,$pass,$dbname);

    if(!$conn){
        die(mysqli_error($conn));
    }
    ?>
