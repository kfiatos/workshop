<?php
require_once('header.php');

$message = new Message();
$tempUser = new User();

$tempArray = $tempUser->loadAllMessages($conn, $_SESSION['user_id']);
echo('<h2>Lista wiadomości</h2>');
echo("<hr>");
$count = 1;



foreach($tempArray as $tempMessage) {
  echo('<h4>Wiadomość '.$count.'</h4><br>');
  $count++;
  echo('<div class = "alert alert-info">'.$tempMessage->getText().'</div>');

  $tempUser->loadFromDB($conn, $tempMessage->getSenderId());
  echo('<div class = "text-right">');
  echo('Nadawca: ');
  echo($tempUser->generateLinkToMyPage());
  echo('</div>');
  echo('<a href="">Odpowiedz</a>');
  echo("<br><hr>");
}
?>
    <br>
    <div class="text-left">
      <form action="" method="post" role="form">
        <legend>Napisz wiadomość</legend>
        <div class = "h5">Adresat
        <select name="recipient_id" id="">

          <?php
            $sql = "SELECT id FROM Users WHERE id != '".$_SESSION['user_id']."'";
            $result = $conn->query($sql);

            if($result->num_rows > 0) {
              $tempUser = new User();
              while ($row = $result->fetch_assoc()) {

                $tempUser->loadFromDB($conn, $row['id']);
//                echo('<input type="hidden" name = "id" value = "">');

                echo('<option value ="'.$tempUser->getId().'">'.$tempUser->getName().'</option>');
                echo("<br>");
              }
            } ?>

         </select></div>
        <div class="form-group">
          <label for="message"></label>
          <textarea name="message" id="" cols="50" rows="4"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Wyślij</button>
      </form>

    <div class = "text-center main-page-link"><a  href="index.php">Powrót do strony głównej</a></div>
    </div>
<?php
var_dump($_POST);
?>





