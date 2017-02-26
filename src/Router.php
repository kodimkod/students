<?php

namespace Students;

class Router
{

    /**
     * @var array
     */
    private $routeMap;

    /**
     * @var string
     */
    private $path;

    /**
     * @var CreateController 
     */
    private $factory;

    /**
     * @param array $routeMap
     * @param string $requestUri
     * @param CreateController $factory
     */
    public function __construct(array $routeMap, string $requestUri, CreateController $factory)
    {
        $this->path = trim(parse_url($requestUri, PHP_URL_PATH), '/');
        $this->routeMap = $routeMap;
        $this->factory = $factory;
    }

    /**
     * @return \Students\Controller
     * @throws \UnexpectedValueException
     */
    public function route(): Controller
    {
        if (isset($this->routeMap[$this->path])) {
            $className = $this->routeMap[$this->path];
            return $this->factory->createController($className);
        }
        throw new \UnexpectedValueException('No route found for page ' . $this->path);
    }

}
