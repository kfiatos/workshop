<?php
include('header.php');


$loggedUser = new User();
$loggedUser->loadFromDB($conn, $_SESSION['user_id']);

echo("<br><h1>Witaj ".$loggedUser->getName()."</h1>");
echo("Moje Tweety:");
$retArray  = $loggedUser->getAllPost($conn, 40);
foreach($retArray as $tweet){
  var_dump($tweet);
  echo("<br>");
  var_dump($tweet->showTweet());

}


include('footer.php');
?>
