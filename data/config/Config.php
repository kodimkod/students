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
        $this->dependenciesMap = [
            'Router' => function () {
                return new Router($this->routesMap, $_SERVER['REQUEST_URI']);
            }
        ];
    }

    /**
     * @return array
     */
    public function getDependencies(): array
    {
        return $this->dependenciesMap;
    }

}
