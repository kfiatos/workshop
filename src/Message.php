<?php
/*CREATE TABLE Messages  (id INT AUTO_INCREMENT,
  sender_id INT NOT NULL, recipient_id INT NOT NULL,
  subject VARCHAR(100), text VARCHAR(200), sendtime TIMESTAMP,
  FOREIGN KEY(sender_id) REFERENCES Users.id, PRIMART KEY(id), FOREIGN KEY (recipient_id) REFERENCES Users.id);
*/


class Message
{

  private $id;
  private $senderId;
  private $recipientId;
  private $subject;
  private $text;
  private $sendtime;



  public function __construct()
  {

    $this->id = -1; // not loaded from db - state unknown
    $this->senderId = -1;
    $this->recipientId = -1;
    $this->subject = " ";
    $this->text=" ";
    $this->sendtime = null;





  }
  public function loadFromDB(mysqli $conn, $idToload)
  {

    $sqlLoadMessage = "SELECT * FROM Messages WHERE id = $idToload";
    $result = $conn->query($sqlLoadMessage);

    if ($result->num_rows === 1) {
      $messageData = $result->fetch_assoc();
      $this->id = $messageData['id'];
      $this->senderId = $messageData['sender_id'];
      $this->recipientId = $messageData['recipient_id'];
      $this->subject = $messageData['subject'];
      $this->text = $messageData['text'];

    }
  }







  /**
   * @return mixed
   */
  public function getId()
  {
    return $this->id;
  }


  /**
   * @return mixed
   */
  public function getSenderId()
  {
    return $this->senderId;
  }

  /**
   * @param mixed $sender_id
   */
  public function newSenderId($newSenderId)
  {
    $this->sender_id = $newSenderId;
  }

  /**
   * @return mixed
   */
  public function getRecipientId()
  {
    return $this->recipientId;
  }

  /**
   * @param mixed $recipient_id
   */
  public function setRecipientId($newRecipientId)
  {
    $this->recipientId = $newRecipientId;
  }

  /**
   * @return mixed
   */
  public function getSubject()
  {
    return $this->subject;
  }

  /**
   * @param mixed $subject
   */
  public function setSubject($newSubject)
  {
    $this->subject = $newSubject;
  }

  /**
   * @return mixed
   */
  public function getText()
  {
    return $this->text;
  }

  /**
   * @param mixed $text
   */
  public function setText($newText)
  {
    $this->text = $newText;
  }

  /**
   * @return mixed
   */
  public function getSendtime()
  {
    return $this->sendtime;
  }

  /**
   * @param mixed $sendtime
   */
  public function setSendtime($newSendtime)
  {
    $this->sendtime = $newSendtime;
  }




}

?>
