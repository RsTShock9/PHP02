<?php

namespace App\Controllers;

use App\Classes\BaseController;
use \App\Classes\Logger;

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
        $logger = new Logger($this->error);
        $logger->log($this->error->getCode(), $this->error->getMessage());
        $this->view->error = $this->error;
        $this->view->display(__DIR__ . '/../../Templates/error.php');
    }
}
