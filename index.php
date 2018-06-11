<?php

error_reporting(-1);
ini_set('display_errors', 'on');
header('Content-Type: text/html; charset=utf-8');

session_start();

define('ROOT', dirname(__FILE__));

require_once ROOT.'/components/Autoload.php';

$router = new Router();
$router->run();
