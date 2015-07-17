<?php

class User{
  /*
  CREATE TABLE Users(
          id int AUTO_INCREMENT,
          nick VARCHAR (255) UNIQUE NOT NULL,
          hashed_password  VARCHAR(60) NOT NULL,
          description text,
          PRIMARY KEY(id)
  );
   */



  private $id;
  private $name;
  private $desc;

  public function __construct(){
    $this->id = -1; // not loaded from db - state unknown
    $this->name = " ";
    $this->desc = " ";
  }




  public function getId(){
    return $this->id;
  }

  public function getName(){
    return $this->name;
  }

  public function setName($newName){
    $this->name = $newName;
  }

  public function getDesc(){
    return $this->desc;
  }

  public function setDesc($newDesc){
    $this->desc = $newDesc;
  }

  public function generateLinkToMyPage(){
    echo("<a href = 'http://localhost/workshop/show_user.php?user_id=".$this->id."'>".$this->name."</a>");
  }

  public function showUser(){
    echo(
      'User: '.$this->name.'<br>
      Desc: '.$this->desc.'<br>');
  }

  public function getAllPost(mysqli $conn, $numberOfPosts){
    $sql = "SELECT * FROM Tweets WHERE user_id = '".$this->id."' LIMIT ".$numberOfPosts;
    $result = $conn->query($sql);
    $retArray = array();

    if ($result->num_rows> 0){
      //TODO: Stworzyc obiekty klasy tweet i dodac je do tablicy zwracanej z jej funkcji
    }
  }





  public function loadFromDB(mysqli $conn, $idToload){
    //$sqlLoadUser = "SELECT * FROM Users WHERE id = '".$idToload."'";
    $sqlLoadUser = "SELECT * FROM Users WHERE id = $idToload";
    $result = $conn->query($sqlLoadUser);

    if($result->num_rows === 1){
      $userData = $result->fetch_assoc();

      $this->id = $userData['id'];
      $this->name = $userData['nick'];
      $this->description  = $userData['description'];
    }
  }



  public function register(mysqli $conn, $name, $desc, $password, $password_2){
    if($password_2  != $password ){
      echo ("Passwords do not match");
      return;
    }

    $options = [
      'cost' => 11,
      'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM),
    ];
    $hashedPas = password_hash($password, PASSWORD_BCRYPT, $options);

    $sqlInsertUser = "INSERT INTO Users(nick, hashed_password, description)
                      VALUES ('".$name."','".$hashedPas."','".$desc."')";

    $result = $conn->query($sqlInsertUser);
    if ($result = TRUE){
      $this->id = $conn->insert_id;
      $this->name = $name;
      $this->desc = $desc;
    }else{
      echo('Error: '.$conn->error.'<br>');
    }

  }

  public function login(mysqli $conn, $name, $insertedPassword){
    $sqlGetUser = "SELECT * FROM Users WHERE nick = '".$name."'";
    $result = $conn->query($sqlGetUser);
    if($result->num_rows ===1){
      $userData  = $result->fetch_assoc();
      if(password_verify($insertedPassword, $userData['hashed_password'])){
        $this->id = $userData['id'];
        $this->name = $userData['nick'];
        $this->desc = $userData['description'];
      }else{
        echo("Wrong name or password...<br>");
      }
    }else{
      echo("Error during logging...");
      echo("Error: ".$con->error."<br>");
    }
  }


}

?>
