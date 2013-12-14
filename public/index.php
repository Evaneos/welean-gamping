<?php

define('ROOT_DIR', dirname(__DIR__));

require_once dirname(__DIR__) . '/vendor/autoload.php';
require_once dirname(__DIR__) . '/app/Gamping/Controllers/Home.php';

$routes = dirname(__DIR__) . '/config/routes.yml';
$injections = dirname(__DIR__) . '/config/injections.yml';

$silex = new Silex\Application();
$silex['debug'] = true;

$containerConfig = new \DICIT\Config\YML($injections);
$container = new \Gamping\Container($containerConfig);

$translationEngine = $container->get('TranslationEngine');
$host = str_replace('.', '_', strtolower($_SERVER['HTTP_HOST']));
$langISO2 = $container->getParameter('defaultLanguages.' . $host . '.iso2');
$langID = $container->getParameter('defaultLanguages.' . $host . '.id');
$translationEngine->setDefaultLanguage($langISO2);
define('LANG_ISO2', $langISO2);

$container->setParameter('currentLanguage.iso2', $langISO2);
$container->setParameter('currentLanguage.id', $langID);
date_default_timezone_set($container->getParameter('dateDefaultTimezone'));

$yaml = new Symfony\Component\Yaml\Yaml();

$app = new Gamping\Application($silex, $container, $yaml);

$app->setRouteFile($routes);
$app->run();
