<?php

namespace App\Controllers\Admin;

use App\BaseController;
use App\Models\Article;

class Insert extends BaseController
{
    public function __invoke()
    {
        if (!empty($_POST['title']) && !empty($_POST['content']) && !empty($_POST['author_id'])) {
            $this->view->article = new Article();
            $this->view->article->title = $_POST['title'];
            $this->view->article->content = $_POST['content'];
            $this->view->article->author_id = $_POST['author_id'];
            $this->view->article->save();
            header('Location: /admin/index/?role=admin');
            exit();
        } else {
            die('Вы ничего не ввели');
        }
    }
}