<?php

namespace Students;

class AboutController extends Controller
{

    /**
     * @return string
     */
    public function process(): string
    {
        $this->view->text = 'About page';
        return $this->view->render();
    }

}
