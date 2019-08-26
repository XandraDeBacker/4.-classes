<?php
session_start(); //initialize sessions, needs to be on top of page
include 'blackJack.php'; //include the class
//initialize variables and session variables
$startDeal = false;
$showDeal = false;
$showDeal = $_SESSION['showDeal'];
$playerOne = new blackJack();
$_SESSION['dealer'] = new blackJack();
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
                <div class="cardDealer">
                    <?php
                    if(isset($_POST['player-stand'])) {
                        $_SESSION['turn'] = true;
                        $_SESSION['stand'] = true;

                    }
                    if(isset($_POST['player-surrender'])) {
                        $_SESSION['turn'] = true;
                        $_SESSION['surrender'] = true;

                    }


                    if ($showDeal == false) { //check first time run
                        $_SESSION['showDeal'] = true;
                        $showDeal = true;
                        $_SESSION['dealer']->Deal(); // execute method Deal from class blackjack
                        echo '<img src="deckOfCards/' . $_SESSION['card3'] .'.png" class="player-hand">';
                        echo '<img src="deckOfCards/' . $_SESSION['card4'] .'.png" class="player-hand">';

                    } else {
                        echo '<img src="deckOfCards/' . $_SESSION['card3'] .'.png" class="player-hand">';
                        echo '<img src="deckOfCards/' . $_SESSION['card4'] .'.png" class="player-hand">';

                    }
                    $playerOne->PlayDealer();
                    if($_SESSION['turn'] == true){
                        $restofD = $_SESSION['newcardarrayD'];
                        foreach ($restofD as $key => $value) {
                            echo '<img src="deckOfCards/' . $key . '.png" class="player-hand">';
                        }
                    }
                    ?>
                </div>
            </div>
            <div class="PC">
                <div class="cardPlayer">
                    <?php
                    if ($showDeal == false) {  //check first time run
                        $_SESSION['showDeal'] = true;
                        $showDeal = true;
                        $playerOne->Deal(); // execute method Deal from class blackjack


                    } else {


                        echo '<img src="deckOfCards/' . $_SESSION['card0'] .'.png" class="player-hand">';
                        echo '<img src="deckOfCards/' . $_SESSION['card1'] .'.png" class="player-hand">';
                        if (isset($_POST['player-hit'])) {

                            $playerOne->Hit();



                        }
                        $restof = $_SESSION['newcardarray'];
                        foreach ($restof as $key => $value) {
                            echo '<img src="deckOfCards/' . $key . '.png" class="player-hand">';
                        }

                    }



                    ?>
                </div>
                <div class="player">
                    <?php $playerOne->Ace();
                    if(isset($_POST['ace1'])) {
                        $_SESSION['scorePlayer'] -= 10;
                        echo '<script>';
                        echo 'document.getElementById("ace1").remove();';
                        echo '</script>';

                    }

                    ?>
                </div>
            </div>
        </div>
    </div>

    <div class="sidebar">

        <div class="scoreDisplay">
            <div id="scoreDealer">scoreDealer</div>
            <?php echo $_SESSION['scoreDealer']; ?>

        </div>
        <div id="buttons">
            <form method="post" action="">
                <input type="submit" name="player-hit" value="hit" <?php $playerOne->DisableStandSurrender() ?>>
                <input type="submit" name="player-stand" value="stand" <?php $playerOne->DisableStandSurrender() ?>>
                <input type="submit" name="player-surrender" value="surrender" <?php $playerOne->DisableStandSurrender() ?>>

            </form>
            <div id="scorePlayer">scorePlayer
                <?php echo $_SESSION['scorePlayer'];
                if($_SESSION['turn'] == true) {
                    if(($_SESSION['scorePlayer']) > 21) {
                    echo "<br>kapot";
                    }
                }
                if($_SESSION['stand'] == true) {
                    echo "<br>Stand";
                }
                if($_SESSION['surrender'] == true) {
                    echo "<br>surrender";
                }
                ?>
            </div>
        </div>
    </div>
</div>
</body>
</html>

