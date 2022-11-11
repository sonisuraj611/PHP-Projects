<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Progress</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/gamesStyle.css">
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
        <section class="section1 inmain">
            <div class="heading">Tic Tac Toe </div>
        </section>
        <!-- <hr> -->
        <section class="section2 inmain">
            <div class="container">
                <!-- <div class="line"></div> -->
              <div class="box bt-0 bl-0"><span class="boxtext"></span></div>
              <div class="box bt-0"><span class="boxtext"></span></div>
              <div class="box bt-0 br-0"><span class="boxtext"></span></div>
              <div class="box bl-0"><span class="boxtext"></span></div>
              <div class="box"><span class="boxtext"></span></div>
              <div class="box br-0"><span class="boxtext"></span></div>
              <div class="box bl-0 bb-0"><span class="boxtext"></span></div>
              <div class="box bb-0"><span class="boxtext"></span></div>
              <div class="box bb-0 br-0"><span class="boxtext"></span></div>
            </div>
            <div class="gameInfo">
                <p id="infoHead">Welcome to the Game</p>
                <div class="info">
                    <span class="turn">Turn for X</span>
                    <button id="reset">Reset</button>
                </div>
                <div class="imgbox">
                    <img src="img/won.png" alt="img">
                </div>
            </div>
        </section>
    </div>
</div>
<script src="js/tictactoe.js"></script>
</body>
</html>