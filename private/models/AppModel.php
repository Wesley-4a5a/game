<?php


class AppModel{

  public $logFile;

  public function __construct(){

  }


  // public function log($log){
  //   $logTxt = '[' . date('d/m/Y - h:ia') . ']' . $log . "\n";
  //   $myfile = fopen(APP_PATH . '/logs/errorlog.txt', 'a+') or die("Unable to open file!");
  //   fwrite($myfile, $logTxt);
  //   fclose($myfile);
  // }

  public function getDBConnection($servername = 'localhost', $db = 'games', $user = 'root', $pass = ''){

    try {
    $conn = null;
    $conn = new PDO("mysql:host=$servername;dbname=".$db, $user, $pass);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(exception $e)
    {
      // var_dump($e);
      // var_dump($this->logFile);
      $this->logFile->log($e);

    }
    return $conn;
    }


    // public function __destruct(){
    //   $conn = null;
    // }

}





 ?>
