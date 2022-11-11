<?php

require 'dbconnect.php';
$loginuser = false;

if(isset($_GET['username'])){
    $loginuser = $_GET['username'];
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Your order has been placed</h1>
    <div class="container">

        <a href="user.php">Go back to shopping cart</a>
    </div>
    <div class="container">
        <a href="orderhistory.php?username=<?php echo $loginuser?>">View your order history</a>

    </div>
    <a href="welcome.php">Go to main page</a>
</div>
<a href="userlogout.php?username=<?php echo $loginuser?>">Logout</a>
</body>
</html>