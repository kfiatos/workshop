<?php
include('header.php');

$loggedUser = new User();
$loggedUser->loadFromDB($conn, $_SESSION['user_id']);
if(isset($_GET['user_id']) == true ) {
  $userToShow = new User();
  $userToShow->loadFromDB($conn, $_GET['user_id']);

  $userToShow->showUser();
}else {
  $loggedUser->showUser();

}
if(isset($_GET['user_id']) == false ){
  $retArray  = $loggedUser->getAllPost($conn, 40);
  echo("<br>");
  foreach($retArray as $tweet) {
    echo("<br>");
    //echo($tweet->loadTweetsFromDBforUser($conn, $_SESSION['user_id']));
    echo($tweet->showTweet());
  }
}else {
  $retArray = $userToShow->getAllPost($conn, 40);
  echo("<br>");
  foreach ($retArray as $tweet) {
    echo("<br>");
    //echo($tweet->loadTweetsFromDBforUser($conn, $_GET['user_id']));
    echo($tweet->showTweet());
  }
}

include('footer.php');

?>
