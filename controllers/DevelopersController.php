<?php

require_once('AppController.php');

class DevelopersController extends AppController{

  private $DevelopersModel;

  public function __construct(){
    require_once(APP_PATH . '/models/DevelopersModel.php');
    $this->DevelopersModel = new DevelopersModel();
  }

  public function overview(){
    $developer = $this->DevelopersModel->getAll();
    $this->loadCompleteView('/developers/overview', ['developer' => $developer]);
  }

}






 ?>
