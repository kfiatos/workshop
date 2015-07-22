<?php
include('header.php');

$tempTweet = new Tweet();
$tempTweet->loadFromDB($conn, $_GET['displayTweet']);
$tempTweet->loadUserFromDBforTweet($conn, $_GET['displayTweet']);

$tempUser = new User();
$tempUser->loadFromDB($conn, $tempTweet->getId_user());
echo('<div class="container">');
echo("Author: ".$tempUser->getName());


echo("<hr>");
echo($tempTweet->getText());
echo("<hr>");

if($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['comment'])){
  $tempComment = new Comments();
  $tempComment->saveCommentsToDb($conn, $_SESSION['user_id'], $_GET['displayTweet'],$_POST['comment']);
//  $tempComment = null;
};
if(!isset($tempComment)){
   $tempComment = new Comments();
  };


echo("<h4>Komentarze:</h4>");
echo ("<hr>");
$retArray  = $tempComment->getAllComments($conn);
var_dump($retArray);

echo("<br>");

foreach($retArray as $comment) {
  echo("<br>");
  echo($comment->getText());

}



echo('

    <form action="" method="post" role="form">
      <legend>Skomentuj Tweeta</legend>

      <div class="form-group">
        <label for=""></label>
        <textarea name="comment" id="" cols="50" rows="4"></textarea>
      </div>



      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <hr>
    <a href="index.php">Powrót</a><br>

  </div>
');




?>


