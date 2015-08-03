<?php
require_once('header.php');

$message = new Message();
$tempUser = new User();

$tempArray = $tempUser->loadAllMessages($conn, $_SESSION['user_id']);
echo('<h2>Lista wiadomości</h2>');
echo("<hr>");
$count = 1;

if(!empty($tempArray)){
  foreach ($tempArray as $tempMessage) {
    echo('<h4>Wiadomość ' . $count . '</h4><br>');
    $count++;
    echo('<div class = "alert alert-info">' . $tempMessage->getText() . '</div>');

    $tempUser->loadFromDB($conn, $tempMessage->getSenderId());
    echo('<div class = "text-right">');
    echo('Nadawca: ');
    echo($tempUser->generateLinkToMyPage());
    echo('</div>');
    echo('<a href="">Odpowiedz</a>');
    echo("<br><hr>");
  }
}else{
    echo('<h2>Nie masz żadnych wiadomości</h2>');
  }
if($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST)){
  $message->saveToDb($conn, $_SESSION['user_id'], $_POST['recipient_id'], $_POST['subject'], $_POST['text']);


}

?>
    <br>
<div class="form-inline">
  <div class="form-group">
    <div class="text-left">
      <form action="show_messages.php" method="post" role="form">
        <legend>Napisz wiadomość</legend>
        <div class = "h5">Adresat
          <select name="recipient_id" id="">

            <?php
              $tempUser->listAllUsersExeptLoggedIn($conn);
            ?>

           </select>
        </div>

        <label for="subject">Temat:</label>
        <input type="text" name="subject"><br>
        <label for="message">Treść</label>
        <textarea name="text" id="" cols="50" rows="4"></textarea>
    </div>
        <button type="submit" class="btn btn-primary">Wyślij</button>
      </form>

      <div class = "text-center main-page-link">
      <a  href="index.php">Powrót do strony głównej</a>
    </div>
    </div>

<?php
var_dump($_POST);
?>





