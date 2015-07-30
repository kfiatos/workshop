<?php
include('header.php');


$loggedUser = new User();
$loggedUser->loadFromDB($conn, $_SESSION['user_id']);
echo("<br><h1 class = 'text-center' >Witaj ".$loggedUser->getName()."</h1>");
echo('

  <div class="row">
    <div class=" col-md-6 ">
      <!--<h1 class="text-center login-title">Sign in to continue to Bootsnipp</h1>-->
      <div class="">
        <!--<img class="profile-img" src="img/login.jpg"alt="">-->
        <form class="" action="add_tweet.php" method="post">
          <h3><legend>Wpisz nowy Tweet</legend></h3>
          <label for="">Treść Tweeta</label><br>
          <textarea name ="tweetText"rows="4" cols="70"></textarea></br>
          <button type="submit" class="btn btn-lg btn-primary btn">Wyslij</button>
          <span class="clearfix"></span>
        </form>
      </div>
      <!--      <a href="#" class="text-center new-account">Create an account </a>-->
    </div>
  </div>');




echo("<h2>Wszystkie Tweety:</h2>");
echo ("<hr>");
$retArray  = $loggedUser->getAllPost($conn, 40);

echo("<br>");
//echo('<div class="alert alert-info">');
foreach($retArray as $tweet){
  echo("<br>");
  echo($tweet->showTweet());
  $_SESSION['tweetId'] = $tweet->getId();
  echo('<hr>');
  echo('

      <form action="edit_tweet.php?tweet_id="" method="get">
        <input type="hidden" name="updateTweet" value="'.$tweet->getId().'">
      <button type="submit" class="btn btn-sm btn-default " >Edit</button>
      </form>
      <form action="show_tweet.php?tweet_id="" method="get">
        <input type="hidden" name="displayTweet" value="'.$tweet->getId().'">
      <button type="submit" class="btn btn-sm btn-default " >Show</button>
      </form>
    ');//edit tylko dla właściciela Tweeta





};
$retArray  = $loggedUser->getAllOtherPost($conn, 40);

echo("<br>");

foreach($retArray as $tweet) {
  echo("<br>");
  echo('<div class="alert alert-info">');
  echo($tweet->showTweet());    //show dla Wszystkich oprócz właściciela
  echo('

     <form action="show_tweet.php?tweet_id="" method="get">
      <input type="hidden" name="displayTweet" value="'.$tweet->getId().'">
      <button type="submit" class="btn btn-sm btn-default " >Show</button>
     </form>
  </div>

  ');
}


include('footer.php');
?>


