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
     * @param array $routeMap
     * @param string $requestUri
     */
    public function __construct(array $routeMap, string $requestUri)
    {
        $this->path =  trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
        $this->routeMap = $routeMap;
    }

    /**
     * @return \Students\Controller
     * @throws \UnexpectedValueException
     */
    public function route(): Controller
    {
        if (isset($this->routeMap[$this->path])) {
            $className = __NAMESPACE__ . '\\' . $this->routeMap[$this->path];
            return new $className;
        }
        throw new \UnexpectedValueException('No route found for page ' . $this->path);
    }

}
