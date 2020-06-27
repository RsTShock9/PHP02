<?php

namespace App\Controllers\Admin;

use App\BaseController;
use App\Models\Article;

class Delete extends BaseController
{
    public function __invoke()
    {
        $this->view->article = Article::findById($_GET['id']);
        $this->view->article->delete();
        header('Location: /admin/index/?role=admin');
        exit();
    }
}