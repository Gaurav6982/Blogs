<?php
    include_once "config.php";

    $again=0;
    if(isset($_GET['title']))
    {
        if($_GET['title']='wrong')
        {
            $again=1;
        }
        
           
        
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
    

    <title>Create Post</title>
</head>
<body>
        <div class="container">
            <div class="main">
                <div class="head">
                    <h1>CREATE POST</h1>
                    <p>Enter Details!</p>
                </div>
                <div class="inputs">
                    <form action="create_process.php" method="POST">
                        <div class="title">
                        <label for="Title">Title:</label>
                        <input type="text" class="form-control" id="title" required name="title">
                        <p style='color:red'><?php if($again==1)echo "Enter Alphabet and Number Only"?></p>
                        </div>
                        <div class="body">
                        <label for="body">BODY:</label>
                        <textarea name="body" id="body" cols="30" rows="10" class="form-control" required></textarea>
                        </div>
                        <br>
                        <input type="submit" value="Submit" id="submit" class="btn btn-primary">
                        <a href="dashboard.php" class="btn btn-dark justify-content-end">Back</a>
                    </form>

                </div>
            </div>
        </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script>
    // $(function(){
    //     $('#submit').click(function(){
    //         var valid=this.form.checkValidity();
    //         if(valid){
    //             $title=$('#title').val();
    //             $body=$('#body').val();
    //             // $.ajax({
    //             //     type:'POST',
    //             //     url:'create_process.php',
    //             //     data:{title:title,body:body},
    //             //     success:function(data){
    //             //         if(data=='Post Created Succesfully!')
    //             //         Swal.fire({
    //             //             title:'Successful',
    //             //             text:"Post Created Succesfully!",
    //             //             icon:'success'
    //             //         });  
    //             //         setTimeout('window.location.href="dashboard.php"', 1000);
    //             //     },
    //             //     error:{}
    //             // })
    //         }
    //     });
    // });
</script>
</html>