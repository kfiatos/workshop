<?php
session_start();
include('src/Tweet.php');
include('connection.php');
if($_SERVER['REQUEST_METHOD'] == 'POST'){
  $newTweet = new Tweet();
  $newTweet->saveTweetsToDb($conn, $_SESSION['user_id'], $_POST['tweetText']);
  header('Location: http://localhost/workshop/');
}




?>
