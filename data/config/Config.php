<?php

namespace Students;

class Config
{

    /**
     * @var array
     */
    private $dependenciesMap;

    public function __construct()
    {
        $this->dependenciesMap = [
            'Router' => new Router(
                    ['' => 'IndexController']
            )
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
