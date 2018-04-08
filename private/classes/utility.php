<?php

defined('APP_PATH') || die();

class UtilityClass{


  public function log($log){
    $logTxt = '[' . date('d/m/Y - h:ia') . ']['. $_SESSION['email'] .']' . $log . "\n";
    $myfile = fopen(APP_PATH . '/private/logs/errorlog.txt', 'a+') or die("Unable to open file!");
    fwrite($myfile, $logTxt);
    fclose($myfile);
  }

}


?>
