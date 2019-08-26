
<?php
class blackJack
{
    public $score = 0;
    public $playercard = "";
    public $dealercard = "";
    public $random_cards;
    public $random_cards1;
    public $turn;
    public $indexcard = 0;
    public $newcardfirstrun = true;
    public $newcardfirstrunD = true;


    //$random_cards = "";
    // array of playing cards
    public $cards = array("2C" => 2, "3C" => 3, "4C" => 4, "5C" => 5, "6C" => 6, "7C" => 7, "8C" => 8, "9C" => 9, "10C" => 10, "JC" => 10, "QC" => 10, "KC" => 10, "AC" => 11,
        "2H" => 2, "3H" => 3, "4H" => 4, "5H" => 5, "6H" => 6, "7H" => 7, "8H" => 8, "9H" => 9, "10H" => 10, "JH" => 10, "QH" => 10, "KH" => 10, "AH" => 11,
        "2S" => 2, "3S" => 3, "4S" => 4, "5S" => 5, "6S" => 6, "7S" => 7, "8S" => 8, "9S" => 9, "10S" => 10, "JS" => 10, "QS" => 10, "KS" => 10, "AS" => 11,
        "2D" => 2, "3D" => 3, "4D" => 4, "5D" => 5, "6D" => 6, "7D" => 7, "8D" => 8, "9D" => 9, "10D" => 10, "JD" => 10, "QD" => 10, "KD" => 10, "AD" => 11);

    // Deal two cards to player and dealer
    public function Deal()
    {
        //Player
        // Take two random cards out of array
        $random_cards = array_rand($this->cards, 2);
        $random_cards00 = array_rand($this->cards, 2);
        // Two random cards in a session variable
        $_SESSION['card0'] = $random_cards[0];
        $_SESSION['card1'] = $random_cards[1];
        //Score is the sum of value of of the two cards
        $this->score = $this->cards[$random_cards[0]] + $this->cards[$random_cards[1]];
        $_SESSION['scorePlayer'] = $this->score;

        //Dealer
        $_SESSION['card3'] = $random_cards00[0];
        $_SESSION['card4'] = $random_cards00[1];
        $this->score = $this->cards[$random_cards00[0]] + $this->cards[$random_cards00[1]];
        $_SESSION['scoreDealer'] = $this->score;
    }

    public function Hit()
    {
        $newCard = array_rand($this->cards, 1);
        if ($this->newcardfirstrun == true) {
            $_SESSION['newcardarray'][$newCard] = $this->cards[$newCard];
            $_SESSION['newcardfirstrun'] = false;
        } else {
            $_SESSION['newcardarray'][] += [$newCard => $this->cards[$newCard]];
        }
        $_SESSION['newCard'] = $newCard;
        //echo $_SESSION['newcardarray'][0];
        $_SESSION['scorePlayer'] += $this->cards[$newCard];
        if ($_SESSION['scorePlayer'] > 21) {
            $this->turn = true;
            $_SESSION['turn'] = $this->turn;
        }

    }

    function Stand()
    {

    }

    function Surrender()
    {

    }

    function DisableStandSurrender()
    {
        if ($_SESSION['turn'] == true) {
            echo " disabled";
        }
    }

    function PlayDealer()
    {
        if ($_SESSION['turn'] == true) {
            while ($_SESSION['scoreDealer'] < 15) {
                $newCardD = array_rand($this->cards, 1);


                if ($this->newcardfirstrunD == true) {
                    $_SESSION['newcardarrayD'][$newCardD] = $this->cards[$newCardD];
                    $_SESSION['scoreDealer'] += $this->cards[$newCardD];
                    $_SESSION['newcardfirstrunD'] = false;
                } else {
                    $_SESSION['newcardarrayD'][] += [$newCardD => $this->cards[$newCardD]];
                    $_SESSION['scoreDealer'] += $this->cards[$newCardD];
                }
            }
            if (($_SESSION['scoreDealer'] >= $_SESSION['scorePlayer']) && ($_SESSION['scoreDealer'] <= 21)) {
                echo "<script>alert('Dealer wins');
                            header('Location: game.php');
                            </script>";

            } else {
                echo "<script>alert('Player wins');
                        header('Location: game.php');
                        </script>";
            }


        }
    }

    function Ace()
    {

        if (($this->cards[$_SESSION['card0']] == 11) || ($this->cards[$_SESSION['card1']] == 11)) {
            echo '<form  method="post" action="">';
            echo '<input id="ace1" type="submit" name="ace1" value="1">';
            echo '</form>';
        }

    }
}
?>
