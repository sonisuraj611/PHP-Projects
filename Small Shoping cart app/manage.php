<?php
session_start();
    if($_SERVER['REQUEST_METHOD']=='POST'){
        if(isset($_POST['AddToCart'])){
            if(isset($_SESSION['cart'])){
                $myitems = array_column($_SESSION['cart'],'Item_name');
                if(in_array($_POST['Item_name'],$myitems)){
                    echo '<script>
                    alert("Item already in the cart");
                    window.location = "index.php";
                    </script>';
                }
                else{

                    $count = count($_SESSION['cart']);
                    $_SESSION['cart'][$count] = array('Item_name'=>$_POST['Item_name'],'Price'=>$_POST['Price'],'Quantity'=>'1');
                    echo '<script>
                    alert("Item added successfully");
                    window.location = "index.php";
                    </script>';
                }
            }
            else{
                $_SESSION['cart'][0] = array('Item_name'=>$_POST['Item_name'],'Price'=>$_POST['Price'],'Quantity'=>'1');
                echo '<script>
                    alert("Item added successfully");
                    window.location = "index.php";
                    </script>';
            }
        }
        if(isset($_POST['Remove'])){
            foreach($_SESSION['cart'] as $key=>$value){
                if($_POST['Item_name']==$value['Item_name']){
                    unset($_SESSION['cart'][$key]);
                    $_SESSION['cart'] = array_values($_SESSION['cart']);
                    echo "<script>
                        alert('Item removed');
                        window.location = 'mycart.php';
                    </script>";
                }
            }
        }
    }
?>