<?php
    include_once "config.php";
    session_start();
    $user=$_SESSION['user'];
    $current=md5(mysqli_real_escape_string($conn,$_POST['current']));
    $new=md5(mysqli_real_escape_string($conn,$_POST['new']));
    $confirm=md5(mysqli_real_escape_string($conn,$_POST['confirm']));

    $sql="select * from users where email='$user';";
    $pas=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($pas);
    $pass=$row['password'];
    if($current===$pass)
    {
        if($new===$confirm)
        {
            $sqlup="update users set password='$new' where email='$user';";
            mysqli_query($conn,$sqlup);
            header("Location:changepass.php?pass=success");
        }
        else{
            header("Location:changepass.php?pass=notm");
        }
    }
    else{
        header("Location:changepass.php?pass=inco");
    }
?>