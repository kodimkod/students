<?php

namespace Students;

class Router
{

    /**
     * @var array
     */
    private $routeMap;

    public function __construct()
    {
        $this->routeMap = [
            '' => 'IndexController',
            'about' => 'AboutController'
        ];
    }

    /**
     * @param string $path
     */
    public function route(string $path): Controller
    {
        if (isset($this->routeMap[$path])) {
            $className = __NAMESPACE__ . '\\' .  $this->routeMap[$path];
            return new  $className;
        }
        throw new \UnexpectedValueException('No route found for page' . $path);
    }

}