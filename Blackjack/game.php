<?php
session_start();
include 'blackJack.php';
$startDeal = false;
$showDeal = false;
$showDeal = $_SESSION['showDeal'];
$startDeal = $_SESSION['startDeal'];

if ($startDeal == false){
    $_SESSION['playerOne'] = new blackJack();

    
    $_SESSION['dealer'] = new blackJack();


    $_SESSION['startDeal'] = true;

}




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="style.css" type="text/css">
</head>
<body>
<div class="wrapper">

    <div class="background" id="background">
        <div class="players">
            <div class="DC">
                <div class="dealer">
                    <form action="session.php" method="POST">
                        <input type="submit" name="restart" value="Restart game">
                        <input type="submit" name="quit" value="Quit game">
                    </form>
                </div>
                <div class="cardDealer">cardD
                    <?php
                    if ($showDeal == false) {
                        $_SESSION['showDeal'] = true;
                        $showDeal = true;
                        $_SESSION['dealer']->Deal();


                    } else {
                        echo '<img src="deckOfCards/' . $_SESSION['card0'] .'.png" class="player-hand"></br>';
                        echo '<img src="deckOfCards/' . $_SESSION['card1'] .'.png" class="player-hand"></br>';
                    }
                    ?>
                </div>
            </div>
            <div class="PC">
                <div class="cardPlayer">cardP
                    <?php
                    if ($showDeal == false) {
                        $_SESSION['showDeal'] = true;
                        $showDeal = true;
                        $_SESSION['playerOne']->Deal();


                    } else {

                        echo '<img src="deckOfCards/' . $_SESSION['card0'] .'.png" class="player-hand"></br>';
                        echo '<img src="deckOfCards/' . $_SESSION['card1'] .'.png" class="player-hand"></br>';
                    }
                    ?>
                    </div>
                <div class="player">player</div>
            </div>
        </div>
    </div>

    <div class="sidebar">

        <div class="scoreDisplay">
            <div id="scoreDealer">scoreDealer</div>

        </div>
        <div id="buttons">
            <button id="hit">hit</button>
            <button id="stand">stand</button>
            <button id="surrender">give up</button>
            <div id="scorePlayer">scorePlayer</div>
        </div>
    </div>
</div>
</body>
</html>
