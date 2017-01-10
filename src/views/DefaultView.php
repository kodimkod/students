<?php

namespace Students;

class DefaultView
{

    /**
     * @var string
     */
    private $templatePath;

    /**
     * @param string $templatePath
     * @throws \UnexpectedValueException
     */
    public function __construct(string $templatePath)
    {
        if (file_exists($templatePath)) {
            $this->templatePath = $templatePath;
        } else {
            throw new \UnexpectedValueException('Template does not exist!');
        }
    }

    /**
     * @return string
     */
    public function render(): string
    {
        ob_start();
        extract(get_object_vars($this), EXTR_SKIP);
        include $template;
        $rendered = ob_get_contents();
        ob_end_clean();
        return $rendered;
    }

}
