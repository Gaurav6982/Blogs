<?php
    include_once "config.php";
    session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Change Password</title>
</head>
<style>
    .dang{
        color:red;
    }
    .success{
        color:green;
    }
</style>
<body>
    <div class="container">
        <div class="center">
            <h1>Change Password</h1>
            <p>Enter Your Current and new password!</p>
            <form action="chpassprocess.php" method="post">
                <div>
                    <label for="current">CURRENT PASSWORD</label>
                    <input type="password" name="current" class="form-control">
                </div><span class="success"><?php
                    if($_GET['pass']=='success')
                    echo "Password Updated";
                ?>
                </span>

                <div>
                    <label for="new">New PASSWORD</label>
                    <input type="password" name="new" class="form-control">
                </div>
                <div >
                    <label for="confirm">Confirm PASSWORD</label>
                    <input type="password" name="confirm" class="form-control">
                </div>
                <span class="dang"><?php
                    if($_GET['pass']=='notm')
                    echo "Password Not Matched!";
                    elseif($_GET['pass']=='inco')
                    echo "Incorrect Password";
                ?>
                </span>
                <br>
                <div class="buttons">
                <input type="submit" value="submit"  class="btn btn-primary">
                <a href="dashboard.php" class="btn btn-dark justify-content-end">Back</a>
                </div>
            </form>
        </div>
    </div>
</body>
<script src="https://kit.fontawesome.com/988756cd88.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

</html>