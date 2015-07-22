<?php
include('header.php');


$loggedUser = new User();
$loggedUser->loadFromDB($conn, $_SESSION['user_id']);
echo("<br><h1 class = 'text-center' >Witaj ".$loggedUser->getName()."</h1>");
echo('<div class="container">
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
  </div>
</div>');



echo('<div class="container">');
echo("<h2>Wszystkie Tweety:</h2>");
echo ("<hr>");
$retArray  = $loggedUser->getAllPost($conn, 40);

echo("<br>");

foreach($retArray as $tweet){
  echo("<br>");
  echo($tweet->showTweet());
  $_SESSION['tweetId'] = $tweet->getId();
  echo('<hr></div>');
  echo('
    <div class="container">
      <form action="edit_tweet.php?tweet_id="" method="get">
        <input type="hidden" name="updateTweet" value="'.$tweet->getId().'">
      <button type="submit" class="btn btn-sm btn-primary btn" >Edit</button>
      </form>
    </div>' //edit tylko dla właściciela Tweeta
  );
  echo('
    <div class="container">
      <form action="show_tweet.php?tweet_id="" method="get">
        <input type="hidden" name="displayTweet" value="'.$tweet->getId().'">
      <button type="submit" class="btn btn-sm btn-primary btn" >Show</button>
      </form>
    </div>' //show dla właściciela Tweeta
  );




};
$retArray  = $loggedUser->getAllOtherPost($conn, 40);

echo("<br>");

foreach($retArray as $tweet) {
  echo("<br>");
  echo('<div class="container">');
  echo($tweet->showTweet());    //show dla Wszystkich oprócz właściciela
  echo('
    <div class="container"></div>
     <form action="show_tweet.php?tweet_id="" method="get">
      <input type="hidden" name="displayTweet" value="'.$tweet->getId().'">
      <button type="submit" class="btn btn-sm btn-primary btn" >Show</button>
     </form>
    </div>

  ');
}


include('footer.php');
?>


