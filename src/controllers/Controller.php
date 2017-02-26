<?php

namespace Students;

abstract class Controller
{

    /**
     * @param \Students\CommonView $view
     */
    public function __construct(CommonView $view)
    {
        $this->view = $view;
    }

    /**
     * @return string
     */
    abstract public function process(): string;
}
