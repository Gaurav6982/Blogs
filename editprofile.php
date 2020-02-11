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
</head>
<?php
    session_start();
    $user=$_SESSION['user'];
    $sql="select * from users where email='$user';";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($result);
    // print_r($row);

?>
<body>
<div class="container">

    <form action="" method="post">
        <div class="row justify-content-center">
            <div class="col-md-6 ">
                <h1>Registration Form</h1>
                <p>Fill the form with required details.</p>
                <hr class="md-5">
                <label for="firstname">FirstName:</label>
                <input  class="form-control" id="firstname" type="text" name="first" value="<?php echo $row['firstname']?>"required>

                <label for="lastname">Lastname:</label>
                <input  class="form-control"  id="lastname"type="text" name="lastname" value="<?php echo $row['lastname']?>" required>
                
                <label for="email">Email:</label>
                <input  class="form-control" id="email" type="email" name="email" value="<?php echo $row['email']?>" required disabled>
                
                <label for="phone">Phone:</label>
                <input  class="form-control"  id="phone"type="number" name="phone" value="<?php echo $row['phone']?>" required>
                
                <label for="password">Enter Password:</label>
                <input  class="form-control"  id="password" type="password" name="password"  required>
                <hr class="md-5">
                <div class="buttons justify-content-between d-inline-block">
                <input type="submit" id="submit" value="Update" class="btn btn-outline-info justify-content-start">
                 <a href="dashboard.php" class="btn btn-dark justify-content-end">Back</a>   
                </div>
            </div>
        </div>
    </form>

</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script>

$('#submit').click(function(e)
{
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
                url:'editprofile_process.php',
                data:{first:firstname,lastname:lastname,email:email,phone:phone,password:password},
                success:function(data){
                    
                    if(data=="Updated")
                    {
                        Swal.fire({
                            title:'Successful',
                            text:data,
                            icon:'success'
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

</script>
</html>