<?php

require_once('AppModel.php');


class GenresModel extends AppModel{

  public function __construct(){

  }

  public function getAll(){
    $conn = $this->getDBConnection();
    $stmt = $conn->prepare("SELECT * FROM genre");
    $stmt->execute();
    $arr = $stmt->fetchAll(PDO::FETCH_OBJ);
    return $arr;
  }

}



 ?>
