<?php



require_once('AppController.php');

class PagesController extends AppController{


  public function home(){
    $this->loadCompleteView('/pages/home');
  }

  public function about(){
    $this->loadCompleteView('/pages/about');
  }

  public function error(){
    $this->loadCompleteView('/pages/error');
  }

}

 ?>
