<?php
include('header.php');


$loggedUser = new User();
$loggedUser->loadFromDB($conn, $_SESSION['user_id']);
echo("<br><h1>Witaj ".$loggedUser->getName()."</h1>");
echo('<div class="container">
  <div class="row">
    <div class="col-sm-6 col-md-4 col-md-offset-4">
      <!--<h1 class="text-center login-title">Sign in to continue to Bootsnipp</h1>-->
      <div class="account-wall">
        <!--<img class="profile-img" src="img/login.jpg"alt="">-->
        <form class="form-signin" action="add_tweet.php" method="post">
          <h3><legend>Wpisz nowy Tweet</legend></h3>
          <label for="">Treść Tweeta</label><br>
          <textarea name ="tweetText"rows="4" cols="70"></textarea></br>
          <button type="submit" class="btn btn-lg btn-primary btn-block">Wyslij</button>
          <span class="clearfix"></span>
        </form>
      </div>
      <!--      <a href="#" class="text-center new-account">Create an account </a>-->
    </div>
  </div>
</div>');




echo("<h2>Wszystkie Tweety:</h2>");
echo ("<hr>");
$retArray  = $loggedUser->getAllPost($conn, 40);

echo("<br>");

foreach($retArray as $tweet){
  echo("<br>");
  echo($tweet->showTweet());
  $_SESSION['tweetId'] = $tweet->getId();
  echo('<hr>');
  echo('<form action="edit_tweet.php?tweet_id="" method="get">
  <input type="hidden" name="updateTweet" value="'.$tweet->getId().'">
<button type="submit" class="btn btn-lg btn-primary btn-block" >Edit</button>
</form>'
  );
  echo('<form action="show_tweet.php?tweet_id="" method="get">
  <input type="hidden" name="displayTweet" value="'.$tweet->getId().'">
<button type="submit" class="btn btn-lg btn-primary btn-block" >Show</button>
</form>'
  );




}
$retArray  = $loggedUser->getAllOtherPost($conn, 40);

echo("<br>");

foreach($retArray as $tweet) {
  echo("<br>");
  echo($tweet->showTweet());
  echo('<form action="show_tweet.php?tweet_id="" method="get">
  <input type="hidden" name="displayTweet" value="'.$tweet->getId().'">
<button type="submit" class="btn btn-lg btn-primary btn-block" >Show</button>
</form>'
  );
}


include('footer.php');
?>


