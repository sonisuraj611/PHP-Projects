<?php

require 'dbconnect.php';
$showerr = false;
if($_SERVER['REQUEST_METHOD']=='POST'){

    $username = $_POST['username'];
    $password = $_POST['password'];
    echo $username;

    $q = "select * from adminreg where username = '$username'";
    $res = mysqli_query($conn, $q);

    $numrows = mysqli_num_rows($res);
    if($numrows>0){
        while($row = mysqli_fetch_assoc($res)){
            if($password == $row['password']){
                session_start();
                
                if(isset($_SESSION['adminname'])){

                    $count = count($_SESSION['adminname']);
                    $_SESSION['adminname'][$count] = $username;
                    header('location: admin.php');
                }
                else{
                    $_SESSION['adminname'][0] = $username;
                    header('location: admin.php');
                }
            }
        }
    }
    else{
        $showerr = 'Invalid credentials';
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
<h1>Admin login</h1>
    <?php 
        if($showerr){
            echo $showerr;
        }
    ?>
    <div class="container">

        <form action="adminlogin.php" method="post">
            <label for="username">Enter username</label>
            <input type="text" id="username" name="username">
            <label for="password">Password</label>
            <input type="password" name="password" id="password">
            <button type = "submit" >login</button>
        </form>
    </div>

    <a href="adminreg.php">signup</a>
    <div class="container">
    <a href="welcome.php">Go to main page</a>
    </div>
</body>

</html>