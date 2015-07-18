<?php
header('Content-type: text/html; charset=utf-8');
require_once('src/User.php');
require_once("connection.php");
session_start();
if(isset($_SESSION['user_id'])) {

  header('Location: http://localhost/workshop');
  session_destroy();

}





?>
