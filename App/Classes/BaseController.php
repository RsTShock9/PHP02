<?php

namespace App\Classes;

abstract class BaseController
{
    protected View $view;

    public function __construct()
    {
        $this->view = new View();
    }

    protected function access(): bool
    {
        return true;
    }

    public function action()
    {
        if ($this->access()) {
            $this->__invoke();
        } else {
            die('Страница не найдена');
        }
    }

    abstract public function __invoke();
}
