<?php
  function call($controller, $action, $actionWith) {
    require_once('controllers/' . $controller . '_controller.php');

    switch($controller) {
      case 'heroes':
          require_once('models/hero.php');
          $controller = new HeroesController($actionWith);
      break;
      case 'maps':
        // we need the model to query the database later in the controller
        require_once('models/map.php');
        $controller = new MapsController($actionWith);
      break;
    }

    $controller->{ $action }($actionWith);
  }

  // we're adding an entry for the new controller and its actions
  $controllers = array('heroes' => ['GET', 'PUT','DELETE','POST','error'],
                       'maps' => ['GET', 'PUT','DELETE','POST','error']);

  if (array_key_exists($controller, $controllers)) {
    if (in_array($action, $controllers[$controller])) {

      call($controller, $action, $actionWith);
    } else {
      call('heroes', 'error', $actionWith);
    }
  } else {
    call('heroes', 'error', $actionWith);
  }
?>