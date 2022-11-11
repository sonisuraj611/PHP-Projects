<?php
$showAlert = false;
$showError = false;

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    require 'partials/_dbconnect.php';
    $username =  $_POST['username'];
    $password =  $_POST['password'];
    $cpassword =  $_POST['cpassword'];

    $existSql = "select * from users where username = '$username'";
    $existRes = mysqli_query($conn,$existSql);
    $numExistRows = mysqli_num_rows($existRes);

    if($username==""){
        $showError = "Username can't be empty";
    }
    else if($numExistRows>0){
        $showError = "Username already exist";
    }
    else if(($cpassword == $password && $password != "")){
        $hash = password_hash($password,PASSWORD_DEFAULT);
        $q = "INSERT INTO `users` (`username`, `password`, `dt`) VALUES ('$username', '$hash', current_timestamp());";
        $res = mysqli_query($conn,$q);
        $showAlert = true;
    }else{
        $showError = "Please type correct password";
    }
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Signup</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  </head>
  <body>
    <?php require 'partials/_nav.php';
    if($showAlert){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> Your account has been created successfully. Login to continue
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
    }
    if($showError){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong> '.$showError.'
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
    }
     ?>
    <div class="container">
        <h1 class="text-center my-3">SignUp to our website</h1>
        <form action="/loginsystem/signup.php" method="post" autocomplete="off">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" maxlength="11" class="form-control" id="username" name="username" aria-describedby="emailHelp" autocomplete="off">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" maxlength="23" class="form-control" id="password" name="password">
            </div>
            <div class="mb-3">
                <label for="cpassword" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="cpassword" name="cpassword">
                <div id="passHelp" class="form-text">Make sure the password is same</div>
            </div>
            <button type="submit" class="btn btn-primary">SignUp</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  </body>
</html>