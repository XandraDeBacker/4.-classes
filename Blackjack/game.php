<?php
session_start();
include 'blackJack.php';
//  $_SESSION['startDeal'] = boolean;

if ($_SESSION['startDeal'] == false){
    $_SESSION['playerOne'] = new blackJack();
    $_SESSION['playerOne']->Deal(); 
    
    $_SESSION['dealer'] = new blackJack();
    $_SESSION['dealer']->Deal();

    $_SESSION['startDeal'] = false;
} 



?>