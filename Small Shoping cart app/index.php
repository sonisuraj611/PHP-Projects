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

    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-3">
                <form action="manage.php" method="post">
                    <div class="card">
                        <img src="img/1.jpg" class="card-img-top" alt="...">
                        <div class="card-body text-center">
                            <h5 class="card-title">Bag 1</h5>
                            <p class="card-text">Price: Rs. 450</p>
                            <button type="submit" name="AddToCart" class="btn btn-info" style="color:white">Add to
                                cart</button>
                            <input type="hidden" name="Item_name" value="Bag 1">
                            <input type="hidden" name="Price" value="450">
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-3">
                <form action="manage.php" method="post">
                    <div class="card">
                        <img src="img/1.jpg" class="card-img-top" alt="...">
                        <div class="card-body text-center">
                            <h5 class="card-title">Bag 2</h5>
                            <p class="card-text">Price: Rs. 650</p>
                            <button type="submit" name="AddToCart" class="btn btn-info" style="color:white">Add to
                                cart</button>
                            <input type="hidden" name="Item_name" value="Bag 2">
                            <input type="hidden" name="Price" value="650">
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-3">
                <form action="manage.php" method="post">
                    <div class="card">
                        <img src="img/1.jpg" class="card-img-top" alt="...">
                        <div class="card-body text-center">
                            <h5 class="card-title">Bag 3</h5>
                            <p class="card-text">Price: Rs. 850</p>
                            <button type="submit" name="AddToCart" class="btn btn-info" style="color:white">Add to
                                cart</button>
                            <input type="hidden" name="Item_name" value="Bag 3">
                            <input type="hidden" name="Price" value="850">
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-3">
                <form action="manage.php" method="post">
                    <div class="card">
                        <img src="img/1.jpg" class="card-img-top" alt="...">
                        <div class="card-body text-center">
                            <h5 class="card-title">Bag 4</h5>
                            <p class="card-text">Price: Rs. 1050</p>
                            <button type="submit" name="AddToCart" class="btn btn-info" style="color:white">Add to
                                cart</button>
                            <input type="hidden" name="Item_name" value="Bag 4">
                            <input type="hidden" name="Price" value="1050">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>