<?php
header('Content-type: text/html; charset=utf-8');
require_once('src/User.php');
require_once('connection.php');
session_start();
if(isset($_SESSION['user_id']) == false ){
  header('Location: http://localhost/workshop/login.php');
  die();
}
echo("<a href='http://localhost/workshop/index.php'> Home </a>");
echo("<a href='http://localhost/workshop/show_user.php'> Moje konto </a>");
echo("<a href='http://localhost/workshop/list_all_users.php'> List all users </a>");
echo("<a href='http://localhost/workshop/edit_user.php'> Edit user </a> ");
echo("<br>");


?>
