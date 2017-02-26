<?php

namespace Students;

interface CreateController
{
    /**
     * @param string $controllerName
     * @return CommonController
     */
    public function createController(string $controllerName);
}