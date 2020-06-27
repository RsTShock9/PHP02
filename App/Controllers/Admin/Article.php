<?php

namespace App\Controllers\Admin;

use App\BaseController;
use App\Models\Author;

class Article extends BaseController
{
    public function __invoke()
    {
        $this->view->article = \App\Models\Article::findById($_GET['id']);
        $this->view->authors = Author::findAll();
        $this->view->display(__DIR__ . '/../../../Templates/Admin/article.php');
    }
}