<?php

require_once('AppController.php');

class GenresController extends AppController{

  private $GenresModel;

  public function __construct(){
    require_once(APP_PATH . '/models/GenresModel.php');
    $this->GenresModel = new GenresModel();
  }

  public function overview(){
    $genre = $this->GenresModel->getAll();
    $this->loadCompleteView('/genres/overview', ['genre' => $genre]);
  }

}



 ?>
