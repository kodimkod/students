<?php

namespace Students;

use Interop\Container\ContainerInterface;

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

    /**
     * @var string
     */
    private $templatePath;

    public function __construct()
    {
        $this->dependenciesMap = $this->createDependenciesMap();
        $this->templatePath = __DIR__ . '/../templates/';
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
            'Router' => function (ContainerInterface $c) {
                return new Router($this->routesMap, $_SERVER['REQUEST_URI'], $c->get('Factory'));
            },
            'Factory' => function(ContainerInterface $c) {
                return new Factory($c);
            },
            'IndexController' => function(ContainerInterface $c) {
                return new IndexController($c->get('DefaultView'));
            },
            'AboutController' => function(ContainerInterface $c) {
                return new AboutController($c->get('DefaultView'));
            },
            'DefaultView' => function(ContainerInterface $c) {
                return new DefaultView($c->get('DefaultTemplate'));
            },
            'DefaultTemplate' => function(ContainerInterface $c) {
                return $this->templatePath . 'index.phtml';
            }
        ];
    }

}
