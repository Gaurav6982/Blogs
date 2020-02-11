
<?php
include_once('config.php');
?>


<?php

session_start();
    if(isset($_POST)){
        $email      =mysqli_real_escape_string($conn,$_POST['email']);
        $password   =md5(mysqli_real_escape_string($conn,$_POST['password']));
    
        $sql="select * from users where email='$email'&& password='$password';";
        $chk=mysqli_query($conn,$sql);
        $row=mysqli_fetch_assoc($chk);
        $result=mysqli_num_rows($chk);
        
        if($result>0)
        {
            echo '1';
            $_SESSION['user']=$email;
            $_SESSION['id']=$row['id'];
                        // echo $row['password']." ".$password;
            
            // $hashedcheck=password_verify($password,$row['password']);
            // echo $hashedcheck;
                
               
            
        }
        else{
            //$pass=password_hash($password,PASSWORD_DEFAULT);
            // $insert="insert into users (firstname,lastname,email,phone,password) values('$firstname','$lastname','$email','$phone','$password');";
            // mysqli_query($conn,$insert);
            echo "Combo Not Matched!!";
        }
    }else{
        echo "No data Found";
    }
?>