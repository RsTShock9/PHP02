<?php

namespace App\Controllers\Admin;

use App\Classes\AdminDataTable;
use App\Classes\BaseController;
use \App\Models\Article;
use \App\Models\Author;

class Index extends BaseController
{
    public function __invoke()
    {
        $articles = Article::findAll();
        $adminDataTable = new AdminDataTable($articles,
            function (Article $article) {
                return $article->id;
            },
            function (Article $article) {
                return $article->title;
            },
            function (Article $article) {
                return $article->content;
            },
            function (Article $article) {
                return (null !== $article->author_id) ? $article->author->name : '';
            },
        );
        $this->view->authors = Author::findAll();
        $this->view->articles = $adminDataTable->render();
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
