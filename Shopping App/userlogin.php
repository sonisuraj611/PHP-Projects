<?php
session_start();
require 'dbconnect.php';
$showerr = false;
if($_SERVER['REQUEST_METHOD']=='POST'){

    $username = $_POST['username'];
    $password = $_POST['password'];

    $q = "select * from userreg where username = '$username'";
    $res = mysqli_query($conn, $q);

    $numrows = mysqli_num_rows($res);
    if($numrows==1){
        while($row = mysqli_fetch_assoc($res)){
            if($password == $row['password']){
                
                if(isset($_SESSION['username'])){
                    $add = true;
                    $count = count($_SESSION['username']);
                    for ($i=0; $i < $count; $i++) { 
                        if($_SESSION['username'][$i] == $username){
                            $add = false;
                            header('location: user.php?username='.$username.'');
                        }
                    }
                    if($add){

                        $_SESSION['username'][$count] = $username;
                        // echo $count;
                        header('location: user.php?username='.$username.'');
                    }
                }
                else{
                    $_SESSION['username'][0] = $username;
                    // print_r($_SESSION['username']);
                    header('location: user.php?username='.$username.'');
                    // echo 'else me';
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
<h1>User login</h1>
    <?php 
        if($showerr){
            echo $showerr;
        }
    ?>
    <div class="container">

        <form action="userlogin.php" method="post">
            <label for="username">Enter username</label>
            <input type="text" id="username" name="username">
            <label for="password">Password</label>
            <input type="password" name="password" id="password">
            <button type = "submit" >login</button>
        </form>
    </div>
    <a href="userreg.php">signup</a>
    <div class="container">
    <a href="welcome.php">Go to main page</a>
    </div>
</body>

</html>