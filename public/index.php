<?php
use Students\{
    Router,
    IndexController,
    Config
};
$AUTOLOADER_PATH = __DIR__ .  '/../vendor/autoload.php';
define('AUTOLOADER_PATH', $AUTOLOADER_PATH);
require AUTOLOADER_PATH;
$config = new Config();
$builder = new DI\ContainerBuilder();
$builder->addDefinitions($config->getDependencies());
$container = $builder->build();
$router = $container->get('Router');
$controller = $router->route('');
echo $controller->process();