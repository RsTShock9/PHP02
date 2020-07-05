<?php

namespace App\Controllers;

use App\Classes\BaseController;

class Error extends BaseController
{
    public \Throwable $error;

    public function __construct(\Throwable $ex)
    {
        parent::__construct();
        $this->error = $ex;
    }

    public function __invoke()
    {
        $this->view->error = $this->error;
        $this->view->display(__DIR__ . '/../../Templates/error.php');
    }
}
