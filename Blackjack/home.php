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
                        <form action="game.php" method="POST">
                            <input type="submit" name="deal">
                        </form>
                    </div>
                    <div class="cardDealer">cardD</div>
                </div>
                <div class="PC">
                    <div class="cardPlayer">cardP</div>
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