<?php
    require_once("config.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registration</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head><style>
.danger{
    background-color:red;
    border-radius:10px;
    font-weight:700;
    height:50px;
    font-size:15px;
}
.success{
    background-color:green;
    border-radius:10px;
    font-weight:700;
    height:50px;
    font-size:15px;
}
.cont{
    position:relative;
    text-align:center;
}
.p{
    line-height:50px;
}
</style>
<?php
    
?>
<body>
<div class="container">

    <form action="registration.php" method="post">
        <div class="row justify-content-center">
            <div class="col-md-6 ">
                <h1>Registration Form</h1>
                <p>Fill the form with required details.</p>
                <hr class="md-5">
                <label for="firstname">FirstName:</label>
                <input  class="form-control" id="firstname"type="text" name="first" required>

                <label for="lastname">Lastname:</label>
                <input  class="form-control"  id="lastname"type="text" name="lastname" required>
                
                <label for="email">Email:</label>
                <input  class="form-control" id="email" type="email" name="email" required>
                
                <label for="phone">Phone:</label>
                <input  class="form-control"  id="phone"type="number" name="phone" required>
                
                <label for="password">Password:</label>
                <input  class="form-control"  id="password"type="password" name="password" required>
                <hr class="md-5">
                <div class="button d-flex justify-content-lg-between">
                    <div class="signup">
                    <input type="submit" value="Sign Up" id="submit"name="submit" class="btn btn-primary">
                    </div>
                    <div class="login justify-content-end d-block">
                    <a href="login.php" class="btn btn-danger">Login</a>
                    </div>
                </div>
            </div>
        </div>
    </form>

</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
$(function(){
    $('#submit').click(function(e){
        var valid=this.form.checkValidity();
        if(valid){
            var firstname   =$('#firstname').val();
            var lastname    =$('#lastname').val();
            var email       =$('#email').val();
            var phone       =$('#phone').val();
            var password    =$('#password').val();
            e.preventDefault();
            $.ajax({
                type:'POST',
                url:'process.php',
                data:{first:firstname,lastname:lastname,email:email,phone:phone,password:password},
                success:function(data){
                    
                    if(data==="Registration Succesful")
                    {
                        Swal.fire({
                            title:'Successful',
                            text:data,
                            icon:'success'
                        }); 
                    }
                    else if(data=='Enter Valid Email!' ||data=='Phone Number should be Numeric!'){
                        Swal.fire({
                            title:'NOT VALID!',
                            text:data,
                            icon:'info'
                        }); 
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

            
            //alert('true');
        }
        else{
            //alert('false');
        }
    });
})
    
    
    // $(function(){
    //    Swal.fire({
    //        title:'Successful',
    //        text:'THis is form sweetalert',
    //        icon:'success'
    //    })
    // });
</script>
</html>