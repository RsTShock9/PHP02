<?php

require __DIR__ . '/../autoload.php';

use \App\Models\Article;
use \App\View;
use \App\Models\Author;

$view = new View();
$view->article = Article::findById($_GET['id']);
$view->authors = Author::findAll();
$view->display(__DIR__ . '/../templates/admin/article.php');