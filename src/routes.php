<?php

require_once("Core/Router.php");
use Core\Router;

Router::connect("/", ['controller' => 'App', 'action' => 'index']);
Router::connect("/register", ['controller' => 'User', 'action' => 'add']);

?>