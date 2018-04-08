<?php

require_once('AppController.php');

class GenresController extends AppController{

  private $GenresModel;

  public function __construct(){
    $this->loginCheck();
    require_once(APP_PATH . '/private/models/GenresModel.php');
    $this->GenresModel = new GenresModel();
  }

  public function overview(){
    $genre = $this->GenresModel->getAll();
    $this->loadCompleteView('/genres/overview', ['genre' => $genre]);
  }

  public function addForm(){
    $this->loadCompleteView('/genres/addForm');
  }

  public function add(){
    $filter = $this->filterSanitize();
    $genre = $this->GenresModel->addGenre($filter['genre']);
    $this->internalRedirect('Genres', 'Overview');
  }

  public function updateForm($id){
      $genre = $this->GenresModel->getOne($id);
      $this->loadCompleteView('/genres/updateForm', ['genre' => $genre]);
  }

  public function update($id){
    $filter = $this->filterSanitize();
    $this->GenresModel->update($id, $filter['genre']);
    $this->internalRedirect('genres', 'Overview');
  }

  public function delete($id){
    $this->GenresModel->delete($id);
    $this->internalRedirect('genres', 'Overview');
  }

}



 ?>
