<?php
session_start();
include('src/Tweet.php');
include('connection.php');

if($_SERVER['REQUEST_METHOD'] == 'GET'){
  //$newTweet = new Tweet();
  $_SESSION['tweetToUpdateId']  = $_GET['updateTweet'];

}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
  $newTweet  = new Tweet();
  $newTweet->udpateTweetInDb($conn, $_SESSION['tweetToUpdateId'], $_POST['tweetUpdatedText']);
  header('Location: http://localhost/workshop/');
}





echo('<div class="container">
  <div class="row">
    <div class="col-sm-6 col-md-4 col-md-offset-4">
      <!--<h1 class="text-center login-title">Sign in to continue to Bootsnipp</h1>-->
      <div class="account-wall">
        <!--<img class="profile-img" src="img/login.jpg"alt="">-->
        <form class="form-signin" action="edit_tweet.php" method="post">
          <h3><legend>Wpisz nowy text Tweeta</legend></h3>
          <label for="">Treść Tweeta</label><br>
          <textarea name ="tweetUpdatedText"rows="4" cols="70"></textarea></br>
          <button type="submit" class="btn btn-lg btn-primary btn-block">Wyslij</button>
          <span class="clearfix"></span>
        </form>
      </div>
      <!--      <a href="#" class="text-center new-account">Create an account </a>-->
    </div>
  </div>
</div>');





?>