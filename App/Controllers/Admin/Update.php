<?php

namespace App\Controllers\Admin;

use App\BaseController;
use App\Models\Article;

class Update extends BaseController
{
    public function __invoke()
    {
        if (!empty($_POST['title']) || !empty($_POST['content']) && !empty($_POST['author_id'])) {
            $this->view->article = Article::findById($_POST['id']);
            $this->view->article->title = $_POST['title'];
            $this->view->article->content = $_POST['content'];
            $this->view->article->author_id = $_POST ['author_id'];
            $this->view->article->save();
            header('Location: /admin/article/?id=' . $this->view->article->id . '');
            exit();
        } else {
            die('Вы ничего не ввели');
        }
    }
}