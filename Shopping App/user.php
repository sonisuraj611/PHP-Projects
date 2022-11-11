<?php
session_start();
require 'dbconnect.php';
$showerr = false;
$productquantity = 0;

$loginuser = false;
if(isset($_GET['username'])){

    $loginuser = $_GET['username'];
}

if($_SERVER['REQUEST_METHOD']=='POST'){

    if(isset($_POST['productsno'])){

    $productsno = $_POST['productsno'];
    $productquantity = $_POST['productquantity'];
    $productname = $_POST['productname'];
    

    for ($i=0; $i < count($productquantity); $i++) { 
        if($productquantity[$i]>0){

            $q1 = "select * from cart where cart.productsno = '$productsno[$i]'";
            $res1 = mysqli_query($conn, $q1);
            $total = 0;

            while($row = mysqli_fetch_assoc($res1)){
                $total = $total + $row['cproductquantity'];
            }
            $total = $total + $productquantity[$i];
            // echo $total;

            $q2 = "select * from products where sno = '$productsno[$i]'";
            $res2 = mysqli_query($conn, $q2);
            $row2 = mysqli_fetch_assoc($res2);

            
            if($total > $row2['productquantity']){

                $actual = $row2['productquantity'];
                echo 'Added quantity is more than product quantity. Please remove '.$total - $actual.' quantity';
            }
            else{

                $q = "INSERT INTO `cart` ( `productsno`,`csessionname`, `cproductname` , `cproductquantity`) VALUES ('$productsno[$i]' ,'$loginuser' , '$productname[$i]', '$productquantity[$i]');";
                $res = mysqli_query($conn, $q); 
                echo 'Added to cart successfully ';
            }
        }
    }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users page</title>
</head>

<body>
    <?php 
    if($showerr){
        echo $showerr;
    }
    ?>
    <h1>Shopping Cart</h1>
    <div class="container">
        <h1>Purchase products: </h1>
        <br>

        <table>
            <thead>
                <tr>
                    <th>Sno</th>
                    <th>Product Name</th>
                    <th>Product Price</th>
                    <th>Product quantity</th>
                    <th>Value</th>
                </tr>
            </thead>
            <tbody>
                <form action="user.php?username=<?php echo $loginuser?>" method="post">
                    <?php
        $q = "select * from products";
        $res = mysqli_query($conn, $q);

        $sn = 1;
        while($row = mysqli_fetch_assoc($res)){
            echo '
            <tr>
            <td>'.$sn++.'</td>
            <td>'.$row['productname'].'</td>
            <td>'.$row['productprice'].'</td>
            <td>'.$row['productquantity'].'</td>
            <td>

            <input type="number" id="productquantity" min="1" max="'.$row['productquantity'].'" name="productquantity[]">
            <input type="hidden" name="productsno[]" value="'.$row['sno'].'"> 
            <input type="hidden" name="productname[]" value="'.$row['productname'].'"> 

             </td>
        </tr>';
        }
        ?>
            </tbody>
        </table>
        <button type="submit"> Add To Cart</button>
        </form>
    </div>

    <h3><a href="usercart.php?username=<?php echo $loginuser?>">Go to cart</a></h3>
    <div class="container">

        <a href="userlogout.php?username=<?php echo $loginuser?>">Logout</a>
    </div>

    <a href="welcome.php">Go to main page</a>
    <!-- <?php echo $loginuser; ?> -->
</body>

</html>