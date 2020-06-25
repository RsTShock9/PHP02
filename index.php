<?php

require __DIR__ . '/autoload.php';

use \App\Models\Article;
use \App\View;

$view = new View();

$view->articles = Article::getLastRecords(4);
$view->display(__DIR__ . '/templates/news.php');