<?php
  require_once('connection.php');

  header("Access-Control-Allow-Origin: *");
  header("Access-Control-Allow-Credentials", "true");
  header('Access-Control-Allow-Methods : GET, POST, OPTIONS, PUT, DELETE');
  header("Access-Control-Allow-Headers: X-Requested-With, Content-Type, Origin, Authorization, Accept, Client-Security-Token, Accept-Encoding");

  $route = explode('/', $_SERVER['REQUEST_URI']);

  if (isset($route[1])) {
    $controller = $route[1];
  } else {
    echo "No route specified!";
  }

    if (isset($route[2])) {
        $actionWith = $route[2];
    } else {
        $actionWith = null;
    }

  $action = filter_input( INPUT_SERVER, 'REQUEST_METHOD' );

  require_once('routes.php');
