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
    <title>MyCart</title>
</head>

<body>
    <h1>My cart: </h1>
    <table>
        <thead>
            <tr>
                <th>Sno</th>
                <th>Product Name</th>
                <th>Product Price</th>
                <th>Product quantity</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $total = 0;
                $sn = 1;
                $q = "select * from cart,products where products.sno = cart.productsno and cart.csessionname = '$loginuser'"; 
                $res = mysqli_query($conn,$q);
                while($row = mysqli_fetch_assoc($res)){
                    $total = $total + ($row['productprice'] * $row['cproductquantity']);
                echo '<tr>
                <td>'.$sn++.'</td>
                <td>'.$row['productname'].'</td>
                <td>'.$row['productprice'].'</td>
                <td>'.$row['cproductquantity'].'</td>
                <td>';
                }
            ?>
        </tbody>
    </table>
            <div class="container">

            <h2>Your total is : <?php   echo $total; ?></h2>
            <h3>Products will be delivered between 24-36 hours </h3>
            </div>
            <div class="container">
                <input type="radio" name="cod" id="cod" checked readonly>
                <label for="cod">Cash On delivery</label>
            </div>
            <h3><a href="checkout.php?username=<?php echo $loginuser?>">Proceed to checkout</a></h3>
            <a href="welcome.php">Go to main page</a>
</body>

</html>