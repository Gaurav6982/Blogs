<?php
    session_start();
    if(isset($_SESSION['user']))
    {
        header("Location:dashboard.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>LOGIN FORM</title>
</head>
<style>

    .user-card{
        position:absolute;
        height:400px;
        width:250px;
        top: 50%;
        left:50%;
        transform:translate(-50%,-50%);
        /* border:2px solid black;         */
        align-items:center;
    }
    form{
        margin-top:20px;
    }
    .block{
        display:flex;
        background-color:grey;
        border-radius:8px;
    }
    .block:nth-child(1){
        margin-bottom:30px;
    }
    #check{
        margin-bottom:30px;
    }
    i{
        height: 25px;
        width: 25px;
        text-align:center;
        margin-top:12px;
        
    }
    .signup a{
        text-decoration:none;
        color:white;
        background-color:grey;
        padding: 2px 5px;
        border-radius:20px;
        font-weight:400;
    }
    .forget{
        /* border:2px solid black; */
        display:block;
        text-align:center;
    }
</style>
<body>
    <div class="container">
        <div class="user-card">
            <div class="header">
                <h3>LOGIN</h3>
                <p>Enter Your Login Deatils</p>
            </div>
            <div class="form-group">
                <form action="" method="post">
                <div class="block">
                    <span><i class="fa fa-user" aria-hidden="true"></i></span>
                    <input type="text" name="username" id="username"  class="form-control" required autofocus placeholder="Enter Your E-mail">
                </div>
                <div class="block">
                    <span><i class="fa fa-key" aria-hidden="true"></i></span>
                    <input type="password" name="password" id="password"  class="form-control" required placeholder="Enter Your Password">
                </div>
                <input type="checkbox" name="remember" id="check">Remember Me
                <input type="button" value="Login" name="submit" id="login" class="btn btn-block btn-dark">
                </form>
            </div>
            <div class="more-options">
                <div class="signup">
                Don't have an account?  <a href="registration.php">Sign Up</a>
                </div>
                <div class="forget">
                <a href="#">Forget your Password</a>
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
        $('#login').click(function(e){
            var valid=this.form.checkValidity();
            if(valid)
            {
                var username=$('#username').val();
                var password=$('#password').val();
                e.preventDefault();
            $.ajax({
                type:'POST',
                url:'lprocess.php',
                data:{email:username,password:password},
                success:function(data)
                {
                    if($.trim(data)==="1")
                    {
                        Swal.fire({
                            title:'Successful',
                            text:"Login Successfull",
                            icon:'success'
                        });  
                        setTimeout('window.location.href="dashboard.php"', 1000);
                    }
                    else
                    {
                        Swal.fire({
                            title:'ERROR',
                            text:data,
                            icon:'error'
                        }); 
                       
                    }  
                },

                    error:function(data){
                        Swal.fire({
                        title:'Error',
                        text:'Some Error Occured!',
                        icon:'error'
                    })
                    }
            });


            }
        });
        
        
    });
</script>

</html>