<?php
include('header.php');

$tempTweet = new Tweet();
$tempTweet->loadFromDB($conn, $_GET['displayTweet']);
$tempTweet->loadUserFromDBforTweet($conn, $_GET['displayTweet']);
$tempUser = new User();
$tempUser->loadFromDB($conn, $tempTweet->getId_user());
echo("Author: ".$tempUser->getName());


echo("<hr>");
echo($tempTweet->getText());
echo("<hr>");


echo("<br>");
echo('<a href="index.php">Powrót</a>')
?>
