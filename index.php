<?php

session_start();
if(!ISSET($_SESSION['login'])){
	$_SESSION['login'] = false;
	$_SESSION['email'] = null;
	$_SESSION['role'] = null;
 }


define('APP_PATH', __DIR__);
define('APP_BASE_URL', 'http://localhost/GameExamen');
require_once(APP_PATH . '/private/classes/utility.php');

$requestString = str_replace($_SERVER['SCRIPT_NAME'], "", $_SERVER['PHP_SELF']);
$requestVars = explode("/", $requestString);

$controller = NULL;
$action = NULL;
$parameter = NULL;

if(ISSET($requestVars[1]) && $controller === NULL){
  $controller = filter_var($requestVars[1]);
}
if(ISSET($requestVars[2]) && $action === NULL){
  $action = filter_var($requestVars[2]);
}
if(ISSET($requestVars[3]) && $parameter === NULL){
  $parameter = filter_var($requestVars[3]);
}

if($controller === NULL && $action === NULL){
  $controller = 'Pages';
  $action = 'Home';
}

$className = ucfirst($controller) . 'Controller';
$controllerFile = 'private/controllers/' . $className . '.php';

if(file_exists($controllerFile)){
  require_once($controllerFile);
}
else{
  require_once('private/controllers/PagesController.php');
}

if(class_exists($className)){
  $controllerObject = new $className();
}
else{
  $controllerObject = new PagesController();
}

if(method_exists($controllerObject, $action)){
  $controllerObject->{$action}($parameter);
}
else{
  $controllerObject->{'error'}();
}


 ?>
