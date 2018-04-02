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

}






 ?>
