<?php
 session_start();
require_once('connection.php');
    if(isset($_POST['login'])){
        $userID=$_POST['userID'];
        $pass=$_POST['password'];

        $qry="SELECT * FROM user where user_id='$userID' and password='$pass' limit 1 ";

        $login=mysqli_query($conn,$qry);

        if(!$login) 
        {
            echo mysqli_error($login);
        }
        
        else{
        $rows=mysqli_num_rows($login);
        if($rows==0){
            header('location:../index.php?request=1');
           
        }
        else{
            $res=mysqli_fetch_array($login);
            $id=$res['id'];
            $fname=$res['fname'];
            $mname=$res['mname'];
            $lname=$res['lname'];
            $role=$res['role'];
            $userID=$res['user_id'];
       

            // session creation
            $_SESSION['id']=$id;
            $_SESSION['fname']=$fname;
            $_SESSION['mname']=$mname;
            $_SESSION['lname']=$lname;
            $_SESSION['role']=$role;
            $_SESSION['userID']=$userID;
      
            if ($_SESSION['role']=='1') {
                header('Location:../admin.php');
            }
            elseif ($_SESSION['role']=='2') {

                $sql="SELECT position FROM staff WHERE userId='$id'";
                $qry=mysqli_query($conn,$sql);
                $row=mysqli_fetch_array($qry);

                if ($row['position']=='HOD') {
                    header('Location:../hod.php');
                }
                elseif ($row['position']=='Coordinator') {
                    header('Location:../coordinator.php');
                    
                }
                elseif ($row['position']=='Staff') {
                    header('Location:../staff.php');
                    
                }
            }
            elseif ($_SESSION['role']=='3') {
                header('Location:candidate.php');
            }
            else {
                header('Location:voter.php');
            }
            
        }
           
        }
    }
    ?>
