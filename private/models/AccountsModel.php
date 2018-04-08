<?php

require_once('AppModel.php');


class AccountsModel extends AppModel{

  public function __construct(){

  }

  private function getAll(){
    $conn = $this->getDBConnection();
    $stmt = $conn->prepare("SELECT * FROM account");
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_OBJ);
    return $result;
  }

  public function login($email, $pass){
    $accounts = $this->getAll();
    foreach($accounts as $row){
      var_dump(password_verify($pass, $row->pass));
      if($row->email === $email && password_verify($pass, $row->pass)){
        var_dump('INGELOGD');
        $_SESSION['login'] = true;
        $_SESSION['email'] = $row->email;
        $_SESSION['role'] = $row->role;
      }
      else{
        var_dump('fout flikkers');
      }
    }

  }

}



 ?>
