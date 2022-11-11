<?php
session_start();
require 'dbconnect.php';
$loginuser = false;

if(isset($_GET['username'])){
    $loginuser = $_GET['username'];
    // echo var_dump($loginuser);
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
    <h1>Your order history: </h1>
        <table>
            <thead>
                <tr>
                    <th>Sno</th>
                    <th>Product Name</th>
                    <th>Product Price</th>
                    <th>Product quantity</th>
                    <th>Name</th>
                    <th>Phone Number</th>
                </tr>
            </thead>
            <tbody>
            <?php
            $total = 0;
        $q = "select * from history where sessionname = '$loginuser'";
        $res = mysqli_query($conn, $q);

        $sn = 1;
        while($row = mysqli_fetch_assoc($res)){
            $total = $total + ($row['productprice'] * $row['productquantity']);
            echo '
            <tr>
            <td>'.$sn++.'</td>
            <td>'.$row['productname'].'</td>
            <td>'.$row['productprice'].'</td>
            <td>'.$row['productquantity'].'</td>
            <td>'.$row['username'].'</td>
            <td>'.$row['userphone'].'</td>
        </tr>';
        }
        ?>
    </tbody>
</table>

<h3>Your total: <?php echo $total; ?></h3>
<a href="user.php?username=<?php echo $loginuser?>">Go to products</a>
<a href="welcome.php">Go to main page</a>
</body>

</html>