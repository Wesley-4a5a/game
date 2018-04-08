<?php

require_once('AppController.php');

class DevelopersController extends AppController{

  private $DevelopersModel;

  public function __construct(){
    $this->loginCheck();
    $this->logFile = new UtilityClass();
    require_once(APP_PATH . '/private/models/DevelopersModel.php');
    $this->DevelopersModel = new DevelopersModel();
  }

  public function overview(){
    $developer = $this->DevelopersModel->getAll();
    $this->loadCompleteView('/developers/overview', ['developer' => $developer]);
  }

  public function addForm(){
    $this->loadCompleteView('/developers/addForm');
  }

  public function add(){
      $filter = $this->filterSanitize();
    try{
      $developer = $this->DevelopersModel->addDeveloper($filter['developer']);
    }
    catch(exception $e){
      $logging = $this->logFile;
      $logging->log($e);
    }

    $this->internalRedirect('Developers', 'Overview');

  }

  public function updateForm($id){
      $developer = $this->DevelopersModel->getOne($id);
      $this->loadCompleteView('/developers/updateForm', ['developer' => $developer]);
  }

  public function update($id){
    $filter = $this->filterSanitize();
    $this->DevelopersModel->update($id, $filter['developer']);
    $this->internalRedirect('Developers', 'Overview');
  }

  public function delete($id){
    $this->DevelopersModel->delete($id);
    $this->internalRedirect('Developers', 'Overview');
  }

}






 ?>
