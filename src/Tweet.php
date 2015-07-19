<?php


class Tweet
{


//        CREATE TABLE Tweets (id INT NOT NULL AUTO_INCREMENT, user_id INT NOT NULL, text VARCHAR(140),
//                            creation_date TIMESTAMP, PRIMARY KEY(id),
//                            FOREIGN KEY(user_id) REFERENCES Users(id));


  private $id;
  private $id_user;
  private $text;

  //TODO:  creation_date


  public function __construct()
  {
    $this->id = -1; // not loaded from db - state unknown
    $this->id_user = -1;
    $this->text = " ";
  }


  public function getId()
  {
    return $this->id;
  }

  public function getId_user()
  {
    return $this->id_user;
  }

  public function setId_user($newId_user)
  {
    $this->name = $newId_user;
  }

  public function getText()
  {
    return $this->text;
  }

  public function setText($newText)
  {
    $this->desc = $newText;
  }

  public function showTweet()
  {
    echo(
      'Treść Tweeta:<br>' . $this->text . '<br>
      ');
  }

  public function udpateTweetInDb(mysqli $conn, $id, $newText)
  {

    $newText = $conn->real_escape_string($newText); //security
    $sqlUpdateTweet = "UPDATE Tweets SET  text = '" . $newText . "' WHERE id = $id";

    $result = $conn->query($sqlUpdateTweet);
    if ($result = TRUE) {
      $this->text = $newText;
      $this->id = $id;


    } else {
      echo('Error: ' . $conn->error . '<br>');
    }

  }

  public function saveTweetsToDb(mysqli $conn, $newUserId, $newText)
  {


    $newText = $conn->real_escape_string($newText); //security
    $sqlInsertTweet = "INSERT INTO Tweets(user_id, text)
                      VALUES ('" . $newUserId . "','" . $newText . "')";

    $result = $conn->query($sqlInsertTweet);
    if ($result = TRUE) {
      $this->id = $conn->insert_id;
      $this->id_user = $newUserId;
      $this->text = $newText;
    } else {
      echo('Error: ' . $conn->error . '<br>');
    }

  }


  public function loadFromDB(mysqli $conn, $idToload)
  {
    $sqlLoadTweet = "SELECT * FROM Tweets WHERE id = $idToload";
    $result = $conn->query($sqlLoadTweet);
    if ($result->num_rows === 1) {
      $tweetData = $result->fetch_assoc();
      $this->id = $tweetData['id'];
      $this->text = $tweetData['text'];

    }
  }

  public function loadTweetsFromDBforUser(mysqli $conn, $userId){
    $sqlLoadTweet = "SELECT * FROM Tweets WHERE  user_id = '".$userId."'";
    $result = $conn->query($sqlLoadTweet);
    if ($result->num_rows === 1) {
      $tweetData = $result->fetch_assoc();
      $this->id = $tweetData['id'];
      $this->id_user =$tweetData['user_id'];
      $this->text = $tweetData['text'];


    }
  }
}

?>
