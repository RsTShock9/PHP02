<?php

namespace App\Controllers\Admin;

use \App\BaseController;
use App\Logger;

class Errors extends BaseController
{
    public \Throwable $messages;

    public function __construct(\Throwable $errors)
    {
        parent::__construct();
        $this->messages = $errors;
    }

    public function __invoke()
    {
        Logger::logsAdmin($this->messages);
        $this->view->errors = $this->messages;
        $this->view->display(__DIR__ . '/../../../Templates/Admin/errors.php');
    }
}
