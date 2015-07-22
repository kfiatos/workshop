<?php
/*
CREATE TABLE Comments (id int not NULL AUTO_INCREMENT,
  user_id int NOT NULL,
  tweet_id int NOT NULL,
  text VARCHAR(140), creation_date TIMESTAMP,
  PRIMARY KEY(id), FOREIGN KEY (user_id) REFERENCES Users(id), FOREIGN KEY (tweet_id) REFERENCES Tweets(id));
*/

class Comments
{

  private $id;
  private $user_id;
  private $tweet_id;
  private $text;

  public function __construct(){
    $this->id = -1; // not loaded from db - state unknown
    $this->user_id = -1;
    $this->tweet_id = -1;
    $this->text = "";

  }

  /**
   * @return int
   */
  public function getId()
  {
    return $this->id;
  }

  /**
   * @param int $id
   */
  public function setId($id)
  {
    $this->id = $id;
  }

  public function setUserId($newUserId){
    $this->user_id = $newUserId;
  }

  public function getUserId(){
    return $this->user_id;
  }

  public function setTweetId($newTweetId){
    $this->tweet_id = $newTweetId;
  }

  public function getText(){
    return $this->text;
  }

  public function setText($newText){
    $this->text = $newText;
  }

  public function showComment()
  {
    echo(
      'Comment:<br>' . $this->text . '<br>
      ');
  }

  public function saveCommentsToDb(mysqli $conn, $newUserId, $newTweetId, $newText)
  {

    $newText = $conn->real_escape_string($newText); //security
    $sqlInsertComment = "INSERT INTO Comments (user_id, tweet_id, text)
                      VALUES ('" . $newUserId . "','".$newTweetId."','" . $newText . "')";

    $result = $conn->query($sqlInsertComment);
    if ($result = TRUE) {
      $this->id = $conn->insert_id;
      $this->user_id = $newUserId;
      $this->tweet_id = $newTweetId;
      $this->text = $newText;
    } else {
      echo('Error: ' . $conn->error . '<br>');
    }

  }

  public function loadFromDB(mysqli $conn, $idToload)
  {
    //$sqlLoadTweet = "SELECT * FROM Tweets WHERE id = $idToload";
    $sqlLoadComment = "SELECT * FROM Comments WHERE id = $idToload";
    $result = $conn->query($sqlLoadComment);

    if ($result->num_rows === 1) {
      $commentData = $result->fetch_assoc();
      //var_dump($tweetData);
      $this->id = $commentData['id'];
      $this->tweet_id = $commentData['tweet_id'];
      $this->user_id = $commentData['user_id'];
      $this->text = $commentData['text'];

    }else{
      echo("Brak komentarzy do tego tweeta");
    }
  }



  public function getAllComments(mysqli $conn){
    $sql = "SELECT * FROM Comments WHERE tweet_id = '".$this->tweet_id."'ORDER BY creation_date DESC";
    $result = $conn->query($sql);
    $retArray = array();

    if($result->num_rows > 0){
      while($commentData = $result->fetch_assoc()) {

        $tempComment = new Comments();
        $tempComment->loadFromDB($conn, $commentData['id']);

        $retArray[] = $tempComment;
      }
    }

    return $retArray;
  }



}





?>
