<?php

namespace App\Controllers\Admin;

use App\BaseController;
use App\Models\Article;

class Update extends BaseController
{
    public function __invoke()
    {
        $this->view->article = Article::findById($_POST['id']);
        $this->view->article->fill($_POST);
        $this->view->article->save();
        header('Location: /admin/article/?id='.$this->view->article->id.'');
        exit();
    }
}
