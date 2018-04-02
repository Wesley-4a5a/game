<?php

define('APP_PATH', __DIR__);
define('APP_BASE_URL', 'http://localhost/GameExamen');


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
$controllerFile = 'controllers/' . $className . '.php';

if(file_exists($controllerFile)){
  require_once($controllerFile);
}

if(class_exists($className)){
  $controllerObject = new $className();
}

if(method_exists($controllerObject, $action)){
  $controllerObject->{$action}($parameter);
}


 ?>
