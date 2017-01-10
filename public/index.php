<?php

use Students\{
    Router,
    IndexController,
    Config
};
use DI\ContainerBuilder;

$autoloaderPath = __DIR__ . '/../vendor/autoload.php';
require $autoloaderPath;
$config = new Config();
$builder = new ContainerBuilder();
$builder->addDefinitions($config->getDependencies());
$container = $builder->build();
$router = $container->get('Router');
try {
    $controller = $router->route();
} catch (\Exception $exception) {
    echo 'Error: ' . $exception->getMessage();
}
if (!isset($exception)) {
    echo $controller->process();
}
