<?php
include('header.php');

$tempTweet = new Tweet();


$text = $tempTweet->loadFromDB($conn, $_GET['displayTweet']);
echo("<hr>");
echo($tempTweet->getText());
echo("<hr>");


echo("<br>");
echo('<a href="index.php">Powrót</a>')
?>
