<?php
    include_once "config.php";
    session_start();
    $id=$_SESSION['id'];
    if(!isset($_SESSION['user']))
    {
        header("Location:login.php");
    }
    if(isset($_GET['logout'])){
        session_destroy();
        unset($_SESSION);
        header("Location:login.php");
    }
    if(isset($_GET['delete'])){
        $user=$_SESSION['user'];
        $id=$_SESSION['id'];
        $sql="delete from users where email='$user';";
        $sql2="delete from blogs where id='$id';";
        mysqli_query($conn,$sql);
        mysqli_query($conn,$sql2);
        session_destroy();
        unset($_SESSION);
        header("Location:login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/dash.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>DASHBOARD</title>
</head>
<!-- <style>
    .details{
        display:block;
        justify-content:space-between;
        border:1px solid black;
    }
    .name{
        justify-content:end;
    }

</style> -->
<style>
.username{
    line-height:35px;
    font-weight:700;
    font-style:"Curlz MT";
    height:35px;
    margin-top:17px;
    margin-right:20px;
}
</style>
<body>
<div class="parent coll">
    <div class="topbar">
        <div class="hamburger">
            <div></div>
            <div></div>
            <div></div>
        </div>
        <div class="topmenu">
            <div class="logo">DASHBOARD</div>
            <div class="icons">
                <ul>
                <li class="username">
                    <?php  
                        $fetch_name="select * from users where id='$id'";
                        $run=mysqli_query($conn,$fetch_name);
                        $fetch=mysqli_fetch_assoc($run);
                        $name=$fetch['firstname']." ".$fetch['lastname'];
                        echo "Welcome ".$name;
                    ?> 
                </li>
                <li>
                    <a href="dashboard.php?logout=true" class="btn btn-dark">
                    <span class="title">Log Out</span>
                    <span class=""><i class="fa fa-sign-out" aria-hidden="true"></i></span>
                    </a>
                </li> 
                </ul>
            </div>
        </div>
    </div>
    <div class="sidebar">
        <ul class="list">
            <li class="list-item">
            <a href="changepass.php?pass=empty" class="btn btn-primary">
                <span class="icon"><i class="fa fa-unlock-alt" aria-hidden="true"></i></i></span>
                <span class="title">Change Password</span>
                </a> 
            </li>
            <li class="list-item">
                <a href="createpost.php" class="btn btn-primary">
                <span class="icon"><i class="fa fa-plus-square" aria-hidden="true"></i></span>
                <span class="title">Create Blog</span>
                </a>
            </li>

            <li class="list-item">
                <a href="editprofile.php" class="btn btn-primary">
                <span class="icon"><i class="fa fa-pencil-square" aria-hidden="true"></i></span>
                <span class="title">Update Profile</span>
                </a>
            </li>

            <li class="list-item">
                <a href="manage_blogs.php" class="btn btn-primary">
                <span class="icon"><i class="fa fa-tasks" aria-hidden="true"></i></span>
                <span class="title">Manage blogs</span>
                </a>
            </li>

            <li class="list-item">
                <a href="dashboard.php?delete=true" class="btn btn-danger delete">
                <span class="icon"><i class="fa fa-trash" aria-hidden="true"></i></i></span>
                <span class="title ">Delete Account</span>
                </a>
            </li>
            <!-- <li class="list-item">
                <a href="dashboard.php?logout=true" class="btn btn-dark logout">
                <span class="logo"><i class="fa fa-sign-out" aria-hidden="true"></i></span>
                <span class="title ">Log Out</span>
                </a>
            </li> -->
        </ul>
    </div>
    
    <div class="container main">
    <!-- <a href="dashboard.php?logout=true" class="btn btn-dark">LOGOUT</a>
        <a href="dashboard.php?delete=true" id="delete"class="btn btn-danger">DELETE MY ACCOUNT</a> -->
        <div class="blogs">
            <div class="details">
                <?php
                    //fetching user details
                    $sql="select * from blogs order by updated_at desc;";
                    $blogs=mysqli_query($conn,$sql);
                    $user=$_SESSION['user'];
                    foreach($blogs as $blog)
                    {
                        $title=$blog['title'];
                        $body=$blog['text'];
                        $time=$blog['updated_at'];
                        $id=$blog['id'];
                        $fetch_name="select * from users where id='$id'";
                        $run=mysqli_query($conn,$fetch_name);
                        $fetch=mysqli_fetch_assoc($run);
                        $name=$fetch['firstname']." ".$fetch['lastname'];
                        echo "<div class='well'>
                        <h3>$title</h3><p>$body</p>
                        <p class='name'>Created by: $name on $time</p>
                    </div>";
                        echo "<hr>";
                    }  
                    
                    // $num=mysqli_num_rows($blogresult);
                    // $blogs=mysqli_fetch_assoc($blogresult);
                    // print_r($blogs);
                    
                    // for($var=0;$var<$num;$var=$var+1)
                    // {
                    //     $title=$blogs['title'][$var];
                    //     $body=$blogs['body'][$var];
                    //     echo "<h3>$title</h3>
                    //     <p>$body</p>";
                        
                    // }
                ?>
            </div>
        </div>
    </div>
</div>

</body>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script>
    $(function(){
        $(".hamburger").click(function(){
            $(".parent").toggleClass("coll");
        });
        // window.location.href="dashboard.php?del=false";
        // $('.delete').click(function(){
        //     $.ajax({
        //         type:'POST',
        //         url:'delete.php',
        //         success:function(data){
                        
        //         }
                   
        //         })
        // });
    });


</script>
</html>


<!-- //fetching user specific blogs; -->
<!-- 
$user=$_SESSION['user'];
                    $sql="select * from users where email='$user';";
                    $result=mysqli_query($conn,$sql);
                   $row=mysqli_fetch_assoc($result);
                   $id=$row['id'];
                   //Fetching from blog
                   $blogsql="select * from blogs where id='$id';";
                    $blogresult=mysqli_query($conn,$blogsql);
                    foreach($blogresult as $blog)
                    {
                        $title=$blog['title'];
                        $body=$blog['text'];
                        echo "<a href='' class='post_title'><h3>$title</a></h3><p>$body</p>";
                    }     -->