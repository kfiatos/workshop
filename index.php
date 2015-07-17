<?php
include('header.php');

$loggedUser = new User();
$loggedUser->loadFromDB($conn, $_SESSION['user_id']);

echo("<br><h1>Witaj ".$loggedUser->getName()."</h1>");
echo("Moje Tweety:");
$tweets  = $loggedUser->getAllPost($conn, 40);
foreach($tweets as $tweet){
  echo ("$tweets");
  echo("<br>");
}


include('footer.php');
?>
