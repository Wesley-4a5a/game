<?php

require_once('AppModel.php');


class GamesModel extends AppModel{

  public function __construct(){
    $this->logFile = new UtilityClass();
  }

  public function getAll(){
    $conn = $this->getDBConnection();
    $stmt = $conn->prepare("SELECT *, GROUP_CONCAT(genre.genre) AS ALLEKUTGENRESBIJELKAAR FROM game_genre
      INNER JOIN genre on genre.genre_ID = game_genre.genre_ID
      RIGHT JOIN game on game.game_ID = game_genre.game_ID
      LEFT JOIN developer on game.developer_ID = developer.developer_ID GROUP BY game
      ");
    $stmt->execute();
    $arr = $stmt->fetchAll(PDO::FETCH_OBJ);
    return $arr;
  }

  public function getOne($id){
    $conn = $this->getDBConnection();
    $stmt = $conn->prepare("SELECT * FROM game WHERE game_id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $arr = $stmt->fetchAll(PDO::FETCH_OBJ);
    return $arr;
  }

  public function getGameGenre($id){
    $conn = $this->getDBConnection();
    $stmt = $conn->prepare("SELECT * FROM game_genre WHERE game_id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $arr = $stmt->fetchAll(PDO::FETCH_OBJ);
    return $arr;
  }

  public function getGenre(){
    $conn = $this->getDBConnection();
    $stmt = $conn->prepare("SELECT * FROM game_genre
      INNER JOIN genre on game_genre.genre_ID = genre.genre_ID");
    $stmt->execute();
    $arr = $stmt->fetchAll(PDO::FETCH_OBJ);
    return $arr;
  }

  public function addGame($game, $description, $price, $genre_id, $developer_id){
    $conn = $this->getDBConnection();
    $stmt = $conn->prepare("INSERT INTO game(game, description, price, developer_id) VALUES(:game, :description, :price, :developer_id);");
		$stmt->bindParam(':game', $game);
		$stmt->bindParam(':description', $description);
		$stmt->bindParam(':price', $price);
		$stmt->bindParam(':developer_id', $developer_id);
    $stmt->execute();
    $stmt = $conn->prepare("INSERT INTO game_genre(game_id, genre_id) VALUES(LAST_INSERT_ID(), :genre_id)");
		$stmt->bindParam(':genre_id', $genre_id);
    $stmt->execute();
    return;
  }

  public function deleteGame($id){
    $conn = $this->getDBConnection();
    $stmt = $conn->prepare("DELETE FROM game WHERE game_id = :id");
		$stmt->bindParam(':id', $id);
    $stmt->execute();
    return;
  }

  public function updateGame($id, $game, $description, $price, $genre_id, $developer_id, $old_genre_id){
    $conn = $this->getDBConnection();
    $stmt = $conn->prepare("UPDATE game SET game = :game, price = :price, description = :description, developer_id = :developer_id WHERE game_id = $id");
    $stmt->bindParam(':game', $game);
		$stmt->bindParam(':description', $description);
		$stmt->bindParam(':price', $price);
		$stmt->bindParam(':developer_id', $developer_id);
    $stmt->execute();
    $stmt = $conn->prepare("UPDATE game_genre SET genre_ID = :genre_id WHERE game_id = $id AND genre_id = :old_genre_id");
    $stmt->bindParam(':genre_id', $genre_id);
    $stmt->bindParam(':old_genre_id', $old_genre_id);
    $stmt->execute();
    return;
  }

}



 ?>
 <!-- $stmt = $conn->prepare("SELECT * FROM game
   INNER JOIN developer on game.developer_ID = developer.developer_ID
   INNER JOIN game_genre on game.game_ID = game_genre.game_ID
   INNER JOIN genre on game_genre.genre_ID = genre.genre_ID
   ORDER BY game"); -->


   <!-- $stmt = $conn->prepare("SELECT * FROM game_genre
    INNER JOIN game on game.game_ID = game_genre.game_ID
    INNER JOIN genre on genre.genre_id = game_genre.genre_ID
    WHERE genre.genre_ID IN (SELECT genre_ID FROM game_genre GROUP BY game_genre.genre_ID)

   "); -->
