<?php

require __DIR__ . '/../autoload.php';

use \App\Models\Article;
use \App\View\View;
use \App\Models\Author;

$view = new View();
$view->articles = Article::findAll();
$view->authors = Author::findAll();
$view->display(__DIR__ . '/../templates/admin/news.php');
