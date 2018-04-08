<?php

require_once('AppController.php');

class AccountsController extends AppController{

  private $AccountsModel;

  public function __construct(){
    require_once(APP_PATH . '/private/models/AccountsModel.php');
    $this->AccountsModel = new AccountsModel();
  }

  public function login(){
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
    $pass = filter_input(INPUT_POST, 'pass', FILTER_SANITIZE_STRING);
    $this->AccountsModel->login($email, $pass);
    $this->internalRedirect('Pages', 'Home');
  }

  public function logout(){
    session_unset();
    $this->internalRedirect('Pages', 'Home');
  }

}






 ?>
