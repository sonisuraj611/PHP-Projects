<?php

require 'dbconnect.php';
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
    <h1>Products: </h1>
    <div class="container">

        <table>
            <thead>
                <tr>
                    <th>Sno</th>
                    <th>Product Name</th>
                    <th>Product Price</th>
                    <th>Product quantity</th>
                    <th>Add to cart</th>
                </tr>
            </thead>
            <tbody>
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
        </tr>';
        }
        ?>
    </tbody>
</table>
<div class="container">
    <a href="admin.php">Go back</a>
</div>
</body>
</html>