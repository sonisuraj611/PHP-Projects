<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "hipa";

$conn  = mysqli_connect($server,$username,$password,$database);

if(!$conn){
    die('Sorry we failed to connect'.mysqli_connect_error());
}
if($_SERVER['REQUEST_METHOD']=='POST'){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $desc = $_POST['desc'];

    $q = "INSERT INTO `contact` (`name`, `emial`, `description`) VALUES ('$name', '$email', '$desc');";
    $res = mysqli_query($conn,$q);

}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Progress</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/welcome.css">
    <script src="https://kit.fontawesome.com/3262449088.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="mainContainer">
        <div class="header">
            <nav>
                <div id="logo">Progress <i class="fa-solid fa-gem"></i></div>
                <ul>
                    <li><a href="/hipa/news.php">Latest News</a></li>
                    <li><a href="/hipa/game.php">Game</a></li>
                    <li><a href="/hipa/about.php">About</a></li>
                    <li><a href="/hipa/welcome.php">Home</a></li>
                </ul>
            </nav>
        </div>
        <!-- <hr> -->
        <div class="main">
            <section class="section1 inmain"><i class="fa-solid fa-hand-horns"></i>`
                <div class="heading">Welcome To Progress <i class="fa-solid fa-gem"></i></div>
            </section>
            <section class="section2"></section>
            <section class="section3 inmain">
                <div class="contactheading">Contact</div>
                <form action="/hipa/welcome.php" method="post">
                    <!-- <div class="formtext">
                        <label for="name">Name:</label>
                        <input type="text" name="name" id="name" class="forminput">
                    </div>
                    <div class="formtext">
                        <label for="email">Eamil:</label>
                        <input type="email" name="email" id="email" class="forminput">
                    </div>
                    <div class="textarea formtext">
                        <label for="concern">Concern:</label>
                        <input type="text" name="concern" id="concern" class="forminput"> 
                        <textarea name="concern" id="concern" cols="21" rows="2" class="forminput"></textarea>
                    </div>
                    <div class="formtext">
                        <button type="submit">Send</button>
                    </div> -->

                    <label for="name" class="formlabel">Name</label>
                    <input type="text" name="name" id="name" class="forminput" placeholder="Enter your name">
                    <label for="email" class="formlabel">Eamil</label>
                    <input type="email" name="email" id="email" class="forminput" placeholder="Enter your email">
                    <label for="desc" class="formlabel">Description</label>
                    <textarea name="desc" id="desc" cols="20" rows="5" class="formtextarea"
                        placeholder="Your text here"></textarea>
                    <div class="btndiv">
                        <button type="submit" id="btn">Send</button>
                    </div>
                </form>
            </section>
        </div>
    </div>
</body>

</html>