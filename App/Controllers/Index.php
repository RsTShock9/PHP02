<?php

namespace App\Controllers;

use App\Classes\BaseController;
use \App\Models\Article;

class Index extends BaseController
{
    public function __invoke()
    {
        $this->view->articles = Article::findAll();
        $this->view->display(__DIR__ . '/../../Templates/news.php');
    }
}
