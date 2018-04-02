<?php

require_once('AppModel.php');


class GamesModel extends AppModel{

  public function __construct(){

  }

  public function getAll(){
    $conn = $this->getDBConnection();
    $stmt = $conn->prepare("SELECT *, GROUP_CONCAT(genre.genre) AS ALLEKUTGENRESBIJELKAAR FROM game_genre
      INNER JOIN genre on genre.genre_ID = game_genre.genre_ID
      INNER JOIN game on game.game_ID = game_genre.game_ID
      INNER JOIN developer on game.developer_ID = developer.developer_ID GROUP BY game
      ");
    $stmt->execute();
    $arr = $stmt->fetchAll(PDO::FETCH_OBJ);
    print_r($arr);
    return $arr;
  }

  public function getGenre(){
    $conn = $this->getDBConnection();
    $stmt = $conn->prepare("SELECT * FROM game_genre
      INNER JOIN genre on game_genre.genre_ID = genre.genre_ID");
    $stmt->execute();
    $arr = $stmt->fetchAll(PDO::FETCH_OBJ);
    print_r($arr);
    return $arr;
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
