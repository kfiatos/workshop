<?php
header('Content-type: text/html; charset=utf-8');
require_once('src/Tweet.php');
require_once('src/User.php');
require_once('src/Comments.php');
require_once('connection.php');
session_start();
if(isset($_SESSION['user_id']) == false ){
//if(isset($_SESSION['user_id']) == false ){

  header('Location: http://localhost/workshop/login.php');
  die();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Bootstrap 101 Template</title>

  <!-- Bootstrap -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/styles.css" rel="stylesheet">

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body>






<?php
echo("<ul>


<li><a href='http://localhost/workshop/index.php'> Home </a></li>
<li><a href='http://localhost/workshop/show_user.php'> Moje konto </a></li>
<li><a href='http://localhost/workshop/list_all_users.php'> List all users </a></li>
<li><a href='http://localhost/workshop/edit_user.php'> Edit user </a></li>
<li><a href='http://localhost/workshop/logoff.php'> Log off </a></li>
</ul>
<br>");


?>
