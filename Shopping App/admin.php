<?php

require 'dbconnect.php';
// $showerr = false;
if($_SERVER['REQUEST_METHOD']=='POST'){

    $productname = $_POST['productname'];
    $productprice = $_POST['productprice'];
    $productquantity = $_POST['productquantity'];

    $q = "INSERT INTO `products` (`productname`, `productprice`, `productquantity`) VALUES ('$productname', '$productprice', '$productquantity');";
    $res = mysqli_query($conn, $q);

}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin page</title>
</head>
<body>
    <h1>Admins Page</h1>
    <div class="container">
        <h1>Add products : </h1>
        <br>
        <form action="admin.php" method="post">
            <label for="productname">Product Name</label>
            <input type="text" id="productname" name="productname">

            <label for="productprice">Product Price</label>
            <input type="number" id="productprice" name="productprice">

            <label for="productquantity">Product Quantity</label>
            <input type="number" id="productquantity" name="productquantity">
            <button type="submit">Add product</button>
        </form>

    </div>
    <div class="container">
        <a href="welcome.php">Go to main page</a>
    </div>
    <br>
    <div class="container">
        <a href="products.php">See product list</a>
    </div>
    <br>
    <div class="container">
        <a href="vieworders.php">View Order histories</a>
    </div>
    <br>
    <div class="container">
        <a href="loggedusers.php">Logged in users</a>
    </div>
</body>
</html>