<?php

require_once('AppController.php');
require_once(APP_PATH . '/private/models/GamesModel.php');

class GamesController extends AppController{

  private $GamesModel;

  public function __construct(){
    $this->loginCheck();
    $this->GamesModel = new GamesModel();
    $this->logFile = new UtilityClass();
  }

  public function overview(){
    $game = $this->GamesModel->getAll();
    $this->loadCompleteView('/games/overview', ['game' => $game]);
  }

  public function addForm(){
    require_once(APP_PATH . '/private/models/DevelopersModel.php');
    $DevelopersModel = new DevelopersModel();
    $Developers = $DevelopersModel->getAll();
    require_once(APP_PATH . '/private/models/GenresModel.php');
    $GenresModel = new GenresModel();
    $Genres = $GenresModel->getAll();
    $this->loadCompleteView('/games/addForm', ['genres' => $Genres, 'developers' => $Developers]);
  }

  public function add(){
    $filter = $this->filterSanitize();
    try{
      $game = $this->GamesModel->addGame($filter['game'], $filter['description'], $filter['price'], $filter['genre_id'], $filter['developer_id']);
      $this->internalRedirect('games', 'overview');
    }
    catch(exception $e){
      $logging = $this->logFile;
      $logging->log($e);
      $this->internalRedirect('games', 'overview');
    }
  }

  public function updateForm($id){
    require_once(APP_PATH . '/private/models/DevelopersModel.php');
    $DevelopersModel = new DevelopersModel();
    $Developers = $DevelopersModel->getAll();
    require_once(APP_PATH . '/private/models/GenresModel.php');
    $GenresModel = new GenresModel();
    $Genres = $GenresModel->getAll();
    $singleGenre = $this->GamesModel->getGameGenre($id);
    $game = $this->GamesModel->getOne($id);
    $this->loadCompleteView('/games/updateForm', ['game' => $game, 'genres' => $Genres, 'developers' => $Developers, 'singleGenre' => $singleGenre]);
  }

  public function update($id){
    $filter = $this->filterSanitize();
    $this->GamesModel->updateGame($id, $filter['game'], $filter['description'], $filter['price'], $filter['genre_id'], $filter['developer_id'], $filter['old_genre_id']);
    $this->internalRedirect('games', 'overview');
  }

  public function delete($id){
    $id = filter_var($id);
    $game = $this->GamesModel->deleteGame($id);
    $this->internalRedirect('games', 'overview');
  }

}






 ?>
