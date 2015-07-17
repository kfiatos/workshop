<?php
header('Content-type: text/html; charset=utf-8');
require_once('src/User.php');
require_once("connection.php");
session_start();
if($_SERVER['REQUEST_METHOD'] == 'POST'){
  $newUser = new User();
  $newUser->register($conn, $_POST['name'], $_POST['desc'],
                            $_POST['password'], $_POST['password_2']);

  if($newUser->getId() != -1){
    $_SESSION['user_id'] = $newUser->getId();
    header('Location: http://localhost/workshop/');
    die();
  }
  else{
    echo("Error during register...<br>");
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Register - workshop</title>

  <!-- Bootstrap -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/styles.css" rel="stylesheet">

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--  [if lt IE 9]>-->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

<!-- Optional theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body>
<div class="container">
  <div class="row">
    <div class="col-sm-6 col-md-4 col-md-offset-4">
      <!--      <h1 class="text-center login-title">Sign in to continue to Bootsnipp</h1>-->
      <div class="account-wall">
        <img class="profile-img" src="img/login.jpg"alt="">
        <form class="form-signin" action="" method="post">
          <h3><legend>Zarejestruj się: </legend></h3>
          <label for="">Nazwa użytkownika:</label></br>
          <input name="name" type="text" class="form-control"> </br>
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



<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>




