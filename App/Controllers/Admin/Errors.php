<?php

namespace App\Controllers\Admin;

use App\Classes\BaseController;

class Errors extends BaseController
{
    public \Throwable $errors;

    public function __construct(\Throwable $ex)
    {
        parent::__construct();
        $this->errors = $ex;
    }

    public function __invoke()
    {
        $this->view->errors = $this->errors;
        $this->view->display(__DIR__ . '/../../../Templates/Admin/errors.php');
    }
}
