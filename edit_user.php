<?php
include('header.php');

$loggedUser = new User();
$loggedUser->loadFromDB($conn, $_SESSION['user_id']);

if($_SERVER['REQUEST_METHOD'] == "POST"){
  $loggedUser->saveToDB($conn, $_POST['desc'],
                                $_POST['pass'],
                                $_POST['pass_2']);

}

echo('

<div class="container">
  <div class="row">
    <div class="col-sm-6 col-md-4 col-md-offset-4">
      <!--      <h1 class="text-center login-title">Sign in to continue to Bootsnipp</h1>-->
      <div class="account-wall">
        <img class="profile-img" src="img/login.jpg"alt="">
        <form class="form-signin" action="" method="post">
          <h3><legend>Edit account: </legend></h3>

          <label for="">Description:</label></br>
          <input name="desc" type="text" class="form-control"> </br>
          <label for="">Password</label></br>
          <input name="password" type="password"class="form-control"> </br>
          <label for="">Retype password</label></br>
          <input name="password_2" type="password"class="form-control"> </br>
          <hr>
          <button type="submit" class="btn btn-lg btn-primary btn-block">Wyslij</button>
          <span class="clearfix"></span>
        </form>
      </div>
      <!--      <a href="#" class="text-center new-account">Create an account </a>-->
    </div>
  </div>
</div>



')

?>
