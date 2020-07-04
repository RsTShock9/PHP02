<?php

namespace App\Controllers\Admin;

use App\BaseController;
use \App\Models\Article;
use \App\Models\Author;

class Index extends BaseController
{
    public function __invoke()
    {
        $this->view->articles = Article::findAll();
        $this->view->authors = Author::findAll();
        $this->view->display(__DIR__ . '/../../../Templates/Admin/news.php');
    }

    protected function access(): bool
    {
        if (isset($_GET['role']) == 'admin') {
            return true;
        }
        die('Нет прав доступа');
    }
}
