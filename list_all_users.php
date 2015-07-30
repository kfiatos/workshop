<?php
include('header.php');
$loggedUser = new User();
$loggedUser->loadFromDB($conn, $_SESSION['user_id']);

$sqlToLoadAllUsersId = "SELECT id FROM Users";
$result = $conn->query($sqlToLoadAllUsersId);

if($result->num_rows > 0) {
  $tempUser = new User();
  while($row = $result->fetch_assoc()){

    $tempUser->loadFromDB($conn, $row['id']);

    echo($tempUser->generateLinkToMyPage());
    echo("<br>");


  }



}





?>
