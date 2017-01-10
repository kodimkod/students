<?php

namespace Students;

class Config
{

    /**
     * @var array
     */
    private $dependenciesMap;

    /**
     * @var array
     */
    private $routesMap = [
        '' => 'IndexController',
        'about' => 'AboutController'
    ];

    public function __construct()
    {
        $this->dependenciesMap = $this->createDependenciesMap();
    }

    /**
     * @return array
     */
    public function getDependencies(): array
    {
        return $this->dependenciesMap;
    }

    /**
     * @return array
     */
    private function createDependenciesMap(): array
    {
        return [
            'Router' => function () {
                return new Router($this->routesMap, $_SERVER['REQUEST_URI']);
            },
            'IndexController' => function() {
                return new IndexController($this->routesMap, $_SERVER['REQUEST_URI']);
            }
        ];
    }

}
