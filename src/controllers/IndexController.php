<?php

namespace Students;

class IndexController extends Controller
{

    /**
     * @return string
     */
    public function process(): string
    {
        $this->view->text = 'Index page';
        return $this->view->render();
    }

}
