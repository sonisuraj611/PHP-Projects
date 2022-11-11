<?php
session_start();
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
    <h1>Order histories: </h1>
        <table>
            <thead>
                <tr>
                    <th>Sno</th>
                    <th>Product Name</th>
                    <th>Product Price</th>
                    <th>Product quantity</th>
                    <th>User Name</th>
                    <th>Address</th>
                    <th>Delivery by</th>

                </tr>
            </thead>
            <tbody>
            <form action="user.php" method="post">
            <?php
            $total = 0;
            $username = $_SESSION['adminname'];
            echo $username;
        $q = "select * from history";
        $res = mysqli_query($conn, $q);

        $sn = 1;
        while($row = mysqli_fetch_assoc($res)){
            $total = $total + $row['productprice'];
            echo '
            <tr>
            <td>'.$sn++.'</td>
            <td>'.$row['productname'].'</td>
            <td>'.$row['productprice'].'</td>
            <td>'.$row['productquantity'].'</td>
            <td>'.$row['username'].'</td>
            <td>'.$row['useraddress'].'</td>
            <td>24-36 hours</td>
            <td>
             </td>
        </tr>';
        }
        ?>
    </tbody>
</table>

<!-- <h3>Your total: <?php echo $total; ?></h3> -->
<a href="admin.php">Go back</a>
<a href="welcome.php">Go to main page</a>
</body>

</html>