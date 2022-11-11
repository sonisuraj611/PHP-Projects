<?php

require 'dbconnect.php';

$loginuser = false;

if(isset($_GET['username'])){
    $loginuser = $_GET['username'];
}

if($_SERVER['REQUEST_METHOD']=='POST'){

    $name = $_POST['name'];
    $address = $_POST['address'];
    $phonenumber = $_POST['phonenumber'];

    $q = "select * from cart,products where cart.productsno = products.sno";
    $res = mysqli_query($conn,$q);

    
    $total = 0;
    while($row = mysqli_fetch_assoc($res)){
        $productname = $row['productname'];
        $productprice = $row['productprice'];
        $cproductquantity = $row['cproductquantity'];

        $q2 = "INSERT INTO `history` (`productname`, `productprice`, `productquantity`, `username`, `useraddress`, `userphone`, `sessionname`, `time`) VALUES ('$productname', '$productprice', '$cproductquantity', '$name', '$address','$phonenumber', '$loginuser', current_timestamp());";
        $res2 = mysqli_query($conn,$q2);

        $mainquantity = $row['productquantity'];
        $update = $mainquantity - $cproductquantity;
        $sno = $row['sno'];

        $q4 = "UPDATE `products` SET `productquantity` = '$update' WHERE `products`.`sno` = '$sno';" ;
        $res4 = mysqli_query($conn, $q4);
    }
    

    // $q1 = "TRUNCATE TABLE `main`.`cart`";
    $q1 = "delete from cart where csessionname = '$loginuser'";
    $res1 = mysqli_query($conn,$q1);
    header('location: done.php?username='.$loginuser.'');
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
    <h1>Complete your order</h1>
<div class="container">
<h4> Enter details: </h4>
<form action="checkout.php?username=<?php echo $loginuser?>" method="post">
    <label for="name">Enter Name</label>
    <input type="text" id="name" name="name">

    <label for="address">Address</label>
    <input type="text" name="address" id="address">

    <label for="phonenumber">Phone Number</label>
    <input type="number" min="1" name="phonenumber" id="phonenumber">

    <button type = "submit" > Order </button>
</form>
</div>
</body>
</html>