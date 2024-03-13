<?php


use Meeting\Core\Session;
use Meeting\Core\Router;
use Meeting\Core\View;

session_start();

const BASE_PATH = __DIR__ . '/../';

require_once BASE_PATH . 'vendor/autoload.php';
require_once BASE_PATH . 'bootstrap/app.php';
require_once BASE_PATH . 'src/routes.php';


(new Router)->run();

Session::unflash();