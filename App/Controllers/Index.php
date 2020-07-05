<?php

namespace App\Controllers;

use App\Classes\BaseController;
use \App\Models\Article;

class Index extends BaseController
{
    public function __invoke()
    {
        $this->view->articles = Article::getLastRecords(4);
        $this->view->display(__DIR__ . '/../../Templates/news.php');
    }
}
