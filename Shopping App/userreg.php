<?php

require 'dbconnect.php';
$showerr = false;
if($_SERVER['REQUEST_METHOD']=='POST'){

    $username = $_POST['username'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];

    if($password==$cpassword && $password != ""){
        $q = "INSERT INTO `userreg` (`username`, `password`, `time`) VALUES ( '$username', '$password', current_timestamp());";
        $res = mysqli_query($conn,$q);
    }
    else{
        $showerr = true;
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>


<body>
    <h1>User Registration</h1>
    <?php 
        if($showerr){
            echo ' Plese enter correct details';
        }
    ?>
    <div class="container">

        <form action="userreg.php" method="post">
            <label for="username">Enter username</label>
            <input type="text" id="username" name="username">
            <label for="password">Password</label>
            <input type="password" name="password" id="password">
            <label for="cpassword">Confirm password</label>
            <input type="password" name="cpassword" id="cpassword">
            <button type = "submit" >Register</button>
        </form>
    </div>
    <div class="container">
        <a href="userlogin.php"> Login </a>
    </div>
</body>

</html>