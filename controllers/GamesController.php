<?php

require_once('AppController.php');

class GamesController extends AppController{

  private $GamesModel;

  public function __construct(){
    require_once(APP_PATH . '/models/GamesModel.php');
    $this->GamesModel = new GamesModel();
  }

  public function overview(){
    $game = $this->GamesModel->getAll();
    $this->loadCompleteView('/games/overview', ['game' => $game]);
  }

  public function addForm(){
    require_once(APP_PATH . '/models/DevelopersModel.php');
    $DevelopersModel = new DevelopersModel();
    $Developers = $DevelopersModel->getAll();
    require_once(APP_PATH . '/models/GenresModel.php');
    $GenresModel = new GenresModel();
    $Genres = $GenresModel->getAll();
    $this->loadCompleteView('/games/addForm', ['genres' => $Genres, 'developers' => $Developers]);
  }

  public function add(){
    $game_id = filter_input(INPUT_POST, 'game_id' , FILTER_SANITIZE_STRING);
    $game = filter_input(INPUT_POST, 'game' , FILTER_SANITIZE_STRING);
    $description = filter_input(INPUT_POST, 'description' , FILTER_SANITIZE_STRING);
    $price = filter_input(INPUT_POST, 'price' , FILTER_SANITIZE_STRING);
    $genre_id = filter_input(INPUT_POST, 'genre_id' , FILTER_SANITIZE_STRING);
    $developer_id = filter_input(INPUT_POST, 'developer_id' , FILTER_SANITIZE_STRING);
    $game = $this->GamesModel->addGame($game, $description, $price, $genre_id, $developer_id);
    $this->internalRedirect('games', 'overview');
  }

  public function updateForm($id){
    require_once(APP_PATH . '/models/DevelopersModel.php');
    $DevelopersModel = new DevelopersModel();
    $Developers = $DevelopersModel->getAll();
    require_once(APP_PATH . '/models/GenresModel.php');
    $GenresModel = new GenresModel();
    $Genres = $GenresModel->getAll();
    $game = $this->GamesModel->getOne($id);
    $this->loadCompleteView('/games/updateForm', ['game' => $game, 'genres' => $Genres, 'developers' => $Developers]);
  }

  public function update(){
    $this->internalRedirect('games', 'overview');
  }

  public function delete($id){
    $id = filter_var($id);
    $game = $this->GamesModel->deleteGame($id);
    $this->internalRedirect('games', 'overview');
  }

}






 ?>
