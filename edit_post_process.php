<?php
    include_once "config.php";
    session_start();
    if(isset($_POST))
    {
        $title=mysqli_real_escape_string($conn,$_POST['title']);
        $body=mysqli_real_escape_string($conn,$_POST['body']);
        // echo $title." ".$body;
        $number=$_SESSION['blog_number'];
        // echo $number;
        $sql="update blogs set title='$title',text='$body',updated_at=now() where blog_number='$number';";
        if(mysqli_query($conn,$sql))
        {
        header("Location:dashboard.php?update=success");
        unset($_SESSION['blog_number']);
        }
        else{
            header("Location:dashboard.php?update=fail");
        }
    }

?>