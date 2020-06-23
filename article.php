<?php

require __DIR__ . '/autoload.php';

use \App\Models\Article;
use \App\View\View;

$view = new View();
$view->article = Article::findById($_GET['id']);
$view->display(__DIR__ . '/templates/article.php');