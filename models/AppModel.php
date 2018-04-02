<?php



class AppModel{

  public function getDBConnection($host = 'localhost', $db = 'games', $user = 'root', $pass = ''){
    static $conn = NULL;
    if($conn === NULL){
      $conn = new PDO("mysql:host=$host;dbname=".$db, $user, $pass);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      }

      return $conn;
    }


}







 ?>
