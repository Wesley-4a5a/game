<?php

require_once('AppModel.php');


class DevelopersModel extends AppModel{

  public function __construct(){

  }

  public function getAll(){
    $conn = $this->getDBConnection();
    $stmt = $conn->prepare("SELECT * FROM developer");
    $stmt->execute();
    $arr = $stmt->fetchAll(PDO::FETCH_OBJ);
    return $arr;
  }



}



 ?>
