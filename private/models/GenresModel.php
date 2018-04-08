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

  public function getOne($id){
    $conn = $this->getDBConnection();
    $stmt = $conn->prepare("SELECT * FROM Genre WHERE Genre_ID = $id");
    $stmt->execute();
    $arr = $stmt->fetchAll(PDO::FETCH_OBJ);
    return $arr;
  }

  public function addGenre($genre){
    $conn = $this->getDBConnection();
    $stmt = $conn->prepare("INSERT INTO genre(genre) VALUES (:genre);");
    $stmt->bindParam(':genre', $genre);
    $stmt->execute();
    return;
  }

  public function update($id, $Genre){
    $conn = $this->getDBConnection();
    $stmt = $conn->prepare("UPDATE Genre SET Genre = :Genre WHERE Genre_ID = $id");
    $stmt->bindParam(':Genre', $Genre);
    $stmt->execute();
    return;
  }

  public function delete($id){
    $conn = $this->getDBConnection();
    $stmt = $conn->prepare("DELETE FROM genre WHERE genre_ID = $id");
    $stmt->execute();
    return;
  }

}



 ?>
