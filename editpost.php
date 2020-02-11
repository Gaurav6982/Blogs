<?php
    include_once "config.php";
    session_start();
    $mail=$_SESSION['user'];
    $id=$_SESSION['id'];
    if(isset($_GET['edit']))
    {
        $title=$_GET['edit'];

        $sql="select * from blogs where title='$title' && id=$id;";
        $result=mysqli_query($conn,$sql);
        $row=mysqli_fetch_assoc($result);
        // print_r($row);
        $body=$row['text'];
        $_SESSION['blog_number']=$row['blog_number'];
    }
    // if(isset($_GET['update'])){
    //     $title=$_GET['edit'];
    //         $update_sql="update blogs set title='$title',text='$body'";
        

    // }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    

    <title>Update Post</title>
</head>
<body>
        <div class="container">
            <div class="main">
                <div class="head">
                    <h1>Update POST</h1>
                    <p>Change Details!</p>
                </div>
                <div class="inputs">
                    <form action="edit_post_process.php" method="POST">
                        <div class="title">
                        <label for="Title">Title:</label>
                        <input type="text" class="form-control" id="title" required name="title" value="<?php echo $title;?>">
                        </div>
                        <div class="body">
                        <label for="body">BODY:</label>
                        <textarea name="body" id="body" cols="30" rows="10" class="form-control"  required><?php echo $body;?></textarea>
                        </div>
                        <br>
                        <input type="submit" id="submit" value="Update" class="btn btn-primary">
                    </form>
                </div>
            </div>
        </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<!-- <script>
    $(function(){
        $('#submit').click(function(){
            window.location.href="editpost.php?update=request&title=";
        })
    }) -->
</script>
</html>