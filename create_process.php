<?php
include_once "config.php";
    session_start();
    $user=$_SESSION['user'];
    // echo $user;
    $sql="select * from users where email='$user';";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($result);
    $id=$row['id'];
    $title=mysqli_real_escape_string($conn,$_POST['title']);
    $body=mysqli_real_escape_string($conn,$_POST['body']);
    $date=date("Y-m-d H:i:s");
    // echo $date;
    if(isset($_POST))
    {
        if(!preg_match("/^[a-zA-Z0-9 ]*$/",$title))
        {
            header("Location:createpost.php?title=wrong");
        }
        else{
            $insert="insert into blogs(title,text,created_at,updated_at,id) values('$title','$body',now(),now(),'$id');";
        $check="select * from blogs where title='$title' && id='$id';";
        $res=mysqli_query($conn,$check);
        $Num=mysqli_num_rows($res);
        if($Num==0)
        {
            mysqli_query($conn,$insert);
            header('Location:dashboard.php?create=success');
        }// header('Location:dashboard.php?create=success');
        else
        header('Location:dashboard.php?create=fail');
        }
    }
    else{
        header('Location:login.php');
    }
?>
