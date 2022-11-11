
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
        session_start();
        if(isset($_SESSION['username'])){
            $count = count($_SESSION['username']);
            // for ($i=0; $i < $count; $i++) { 
            //     echo $_SESSION['username'][$i],"<br>";
            // }
    }
    ?>
    <h1>Logged in user: (<?php echo $count;?>) </h1>
    <?php
            for ($i=0; $i < $count; $i++) { 
                echo $_SESSION['username'][$i],"<br>";
            }
    ?>
    <a href="admin.php">Go back</a>
</body>
</html>