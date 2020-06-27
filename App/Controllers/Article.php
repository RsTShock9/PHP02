<?php

namespace App\Controllers;

use \App\BaseController;

class Article extends BaseController
{
    public function __invoke()
    {
        $this->view->article = \App\Models\Article::findById($_GET['id']);
        $this->view->display(__DIR__ . '/../../Templates/article.php');
    }
}