<?php
defined('APP_PATH') || die();


class AppController{
  protected $logFile;


  protected function loadCompleteView($path, $vars = []){
    extract($vars);
    require_once(APP_PATH . '/views/themes/header.php');
    require_once(APP_PATH . '/views' . $path . '.php');
    require_once(APP_PATH . '/views/themes/footer.php');
  }

  protected function internalRedirect($controller, $action)
	{
		header('Location: ' . APP_BASE_URL . '/' . $controller . '/' . $action);
		die;
	}

  // public function log($log){
  //   $logTxt = '[' . date('d/m/Y - h:ia') . ']' . $log . "\n";
  //   $myfile = fopen(APP_PATH . '/logs/errorlog.txt', 'a+') or die("Unable to open file!");
  //   fwrite($myfile, $logTxt);
  //   fclose($myfile);
  // }

  protected function filterSanitize($input = []){
    $postFilter = filter_var_array($_POST, FILTER_SANITIZE_STRING);
    return $postFilter;
  }

  protected function loginCheck(){
    if($_SESSION['login'] === true){
      return;
    }
    else{
      $this->internalRedirect('home', '');
    }
  }


}





 ?>
