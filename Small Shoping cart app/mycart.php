<?php require 'header.php'; 
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Shopping Cart</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center border rounded bg-light my-5">
                <h1>My Cart</h1>
            </div>

            <div class="col-lg-9">
                <table class="table">
                    <thead class="text-center">
                        <tr>
                            <th scope="col">Serial No.</th>
                            <th scope="col">Item Name</th>
                            <th scope="col">Item Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <?php 
                    $total = 0;
                    if(isset($_SESSION['cart'])){
                        foreach ($_SESSION['cart'] as $key => $value) {
                            $total = $total + $value['Price'];
                            $n = $key+1;
                            // print_r($value);
                            echo "<tr>
                            <td>$n</td>
                            <td>$value[Item_name]</td>
                            <td>$value[Price]</td>
                            <td><input type='number' class='text-center' min='1' max='10' value='$value[Quantity]'></td>
                            <form action='manage.php' method='post'>
                                <td><button name='Remove' class='btn btn-sm btn-outline-danger'>Remove</button></td>
                                <input type='hidden' name='Item_name' value='$value[Item_name]'>
                            </form>
                        </tr>";
                        }
                    }
                    ?>
                    </tbody>
                </table>
            </div>

            <div class="col-lg-3">
                <div class="border rounded bg-light p-4">
                    <h4>Total:</h4>
                    <h5 class="text-center"><?php echo $total ?></h5>
                    <br>
                    <form action="">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" checked>
                            <label class="form-check-label" for="flexRadioDefault1">
                                UPI
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2">
                            <label class="form-check-label" for="flexRadioDefault2">
                                Cash on Delivery
                            </label>
                        </div>
                        <div class="d-grid gap-2 mt-2">
                            <button class="btn btn-primary" type="button">Purchase</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>