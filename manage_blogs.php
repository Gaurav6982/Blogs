<?php
    include_once "config.php";
    session_start();
    $id=$_SESSION['id'];
    $sql="select * from blogs where id='$id';";
    $result=mysqli_query($conn,$sql);
    $num=mysqli_num_rows($result);
    if(isset($_GET['del']))
    {
        $title=$_GET['del'];
        $delete="delete from blogs where title='$title' && id='$id';";
        mysqli_query($conn,$delete);
        header('Location:manage_blogs.php?delete=success');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Blogs</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<style>
    th{
        width:300px;
        border:2px solid black;
    }
    .blogs{
        text-align:center;
    }
</style>
<body>
    <div class="container">
        <h1>Your Blogs.</h1>
        <?php

            // $num_blogs_sql="select * from blogs where id='$id';";
            if($num>0)
            {
                echo "
                <table>
                <tr>
                    <th>Blog Title</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>";
                
                    foreach($result as $blog)
                    {
                        $title=$blog['title'];
                        $_SESSION['title']=$title;
                        echo "<tr class='blogs'>
                                <td class='title'>$title</td>
                                <td class='edit'><a href='editpost.php?edit=$title' class='btn btn-primary'>Edit</a></td>
                                <td class='delete'><a href='manage_blogs.php?del=$title' class='btn btn-danger del' value='$title'>Delete</a></td>
                                </tr>";
                    }
            
            echo"</table>";
            }
            else
            {
               echo "
                    <div class='mess'>
                    <p>No Blogs From This Account</p>
                    </div>
               ";
               echo "<a href='createpost.php' class='btn btn-primary'>Create post</a>";
               
            }
        ?>
        <hr>
        <div class="back">
            <a href="dashboard.php" class="btn btn-dark">Back</a>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script>
    $(function(){
        $('.del').click(function(){
            // var title=$('.del').val();
            // alert(title);
            // $.ajax({
            //     type:'POST',
            //     url:'delete_blog.php',
            //     success:function(data){
            //         Swal.fire({
            //                 title:data,
            //                 text:"Post Deleted",
            //                 icon:'success'
            //             });  
            //     }
            // })
        });
    })
</script>
</html>