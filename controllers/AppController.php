<?php
defined('APP_PATH') || die();

class AppController{


  public function loadCompleteView($path, $vars = []){
    extract($vars);
    require_once(APP_PATH . '/views/themes/header.php');
    require_once(APP_PATH . '/views' . $path . '.php');
    require_once(APP_PATH . '/views/themes/footer.php');
  }


}





 ?>
