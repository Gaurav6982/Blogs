<?php
    include_once "config.php";
    session_start();
    $user=$_SESSION['user'];
    
    $firstname  =mysqli_real_escape_string($conn,$_POST['first']);
    $lastname   =mysqli_real_escape_string($conn,$_POST['lastname']);
    $email      =mysqli_real_escape_string($conn,$_POST['email']);
    $phone      =mysqli_real_escape_string($conn,$_POST['phone']);
    $pass=md5(mysqli_real_escape_string($conn,$_POST['password']));
    
    if(isset($_POST))
    {
        $sql="select password from users where email='$user';";
        $result=mysqli_query($conn,$sql);
        $row=mysqli_fetch_assoc($result);
        $pass2=$row['password'];
        if($pass==$pass2)
        {
            $update="update users set firstname='$firstname',lastname='$lastname',phone='$phone' where email='$user';";
            mysqli_query($conn,$update);
            echo "Updated";
        }
        else{
            echo "Incorrect Password!";
        }
    }
    else
    {
        echo "Some Error Occured";
    }
?>