<?php
$conn = new mysqli("localhost", "root", "root", "workshop");

if($conn->errno){
  echo("Error connecting to database");
  echo($conn->error."<br>");
  die();
}
?>
