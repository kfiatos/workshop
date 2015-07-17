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
    $name->name = "";
    $this->desc = "";
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

  public function register(mysqli $conn, $name, $desc, $password, $password_2){
    if($password_2  != $password ){
      echo ("Passwords do not match");
      return;
    }

    $options = [
      'cost' => 11,
      'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM),
    ];
    $hashedPas = password_hash($pass, PASSWORD_BCRYPT, $options);

    $sqlInsertUser = "INSERT INTO Users(nick, hashed_pasword, description)
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



}

?>
