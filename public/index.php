<?php

require_once dirname(__DIR__) . '/vendor/autoload.php';
require_once dirname(__DIR__) . '/app/Gamping/Controllers/Home.php';

$routes = dirname(__DIR__) . '/config/routes.yml';
$injections = dirname(__DIR__) . '/config/injections.yml';

$silex = new Silex\Application();
$silex['debug'] = true;

$containerConfig = new \DICIT\Config\YML($injections);
$container = new \DICIT\Container($containerConfig);

$yaml = new Symfony\Component\Yaml\Yaml();

$app = new Gamping\Application($silex, $container, $yaml);

$app->setRouteFile($routes);
$app->run();
