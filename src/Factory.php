<?php

namespace Students;

use DI\Container;

class Factory implements CreateController
{

    /**
     * @var \DI\Container 
     */
    protected $container;

    /**
     * @param \DI\Container $container
     */
    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    /**
     * @param string $controllerName
     * @return Controller
     */
    public function createController(string $controllerName): Controller
    {
        return $this->container->get($controllerName);
    }

}
