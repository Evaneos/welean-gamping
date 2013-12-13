<?php
require_once dirname(__DIR__) . '/vendor/autoload.php';
require_once dirname(__DIR__) . '/app/Gamping/Controllers/Home.php';


$app = new Silex\Application();
$app['debug'] = true;


$app->get('/', '\Gamping\Controllers\Home::execute');

$app->run();