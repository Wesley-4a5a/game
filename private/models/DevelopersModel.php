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

  public function getOne($id){
    $conn = $this->getDBConnection();
    $stmt = $conn->prepare("SELECT * FROM developer WHERE developer_ID = $id");
    $stmt->execute();
    $arr = $stmt->fetchAll(PDO::FETCH_OBJ);
    return $arr;
  }


  public function addDeveloper($developer){
    $conn = $this->getDBConnection();
    $stmt = $conn->prepare("INSERT INTO developer(developer) VALUES (:developer);");
    $stmt->bindParam(':developer', $developer);
    $stmt->execute();
    return;
  }

  public function update($id, $developer){
    $conn = $this->getDBConnection();
    $stmt = $conn->prepare("UPDATE developer SET developer = :developer WHERE developer_ID = $id");
    $stmt->bindParam(':developer', $developer);
    $stmt->execute();
    return;
  }

  public function delete($id){
    $conn = $this->getDBConnection();
    $stmt = $conn->prepare("DELETE FROM developer WHERE developer_ID = $id");
    $stmt->execute();
    return;
  }

}



 ?>
