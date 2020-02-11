<?php
    include_once('config.php');
?>
<?php
   if(isset($_POST)){
    $firstname  =mysqli_real_escape_string($conn,$_POST['first']);
    $lastname   =mysqli_real_escape_string($conn,$_POST['lastname']);
    $email      =mysqli_real_escape_string($conn,$_POST['email']);
    $phone      =mysqli_real_escape_string($conn,$_POST['phone']);
    $password   =md5(mysqli_real_escape_string($conn,$_POST['password']));
   
    $ext=explode("@",$email);
    $sql="select * from users where email='$email';";
    $chk=mysqli_query($conn,$sql);
    $result=mysqli_num_rows($chk);
    if($result>0)
    {
        echo 'User Already Taken';
    }
    else  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format";
      }
    else if(!preg_match("/^[0-9]*$/",$phone)){
        echo "Phone Number should be Numeric!";
    }
    else{
        if($ext[1]=='gmail.com'||$ext[1]=='yahoo.in'||$ext[1]=='yahoo.com')
        {
            $insert="insert into users (firstname,lastname,email,phone,password) values('$firstname','$lastname','$email','$phone','$password');";
            mysqli_query($conn,$insert);
            echo "Registration Succesful";
        }
        else{
            echo "Enter Valid Email!";
        }
    }
}else{
    echo "No data Found";
}
?>