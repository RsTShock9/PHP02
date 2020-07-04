<?php

namespace App\Controllers\Admin;

use App\BaseController;
use App\Models\Article;

class Insert extends BaseController
{
    public function __invoke()
    {
        $this->view->article = new Article();
        $this->view->article->fill($_POST);
        $this->view->article->save();
        header('Location: /admin/index/?role=admin');
        exit();
    }
}
