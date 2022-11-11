<?php 
session_start();
$loginuser = false;
if(isset($_GET['username'])){
    $loginuser = $_GET['username'];
    $count = count($_SESSION['username']);
    
    for ($i=0; $i < $count; $i++) { 
        
        if($loginuser == $_SESSION['username'][$i]){
            unset($_SESSION['username'][$i]);
            $_SESSION['username'] = array_values($_SESSION['username']);
            
            header('location: welcome.php');
        }
    }
}

exit;
?>
