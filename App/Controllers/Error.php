<?php

namespace App\Controllers;

use \App\BaseController;
use \App\Logger;

class Error extends BaseController
{
    public \Throwable $message;

    public function __construct(\Throwable $error)
    {
        parent::__construct();
        $this->message = $error;
    }

    public function __invoke()
    {
        Logger::logs($this->message);
        $this->view->error = $this->message;
        $this->view->display(__DIR__ . '/../../Templates/error.php');
    }
}
