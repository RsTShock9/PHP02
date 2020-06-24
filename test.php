<?php

require __DIR__ . '/autoload.php';

use \App\Models\Article;
use \App\View\View;

$article = Article::findById(3);
var_dump(isset($article->author));

$view = new \App\View\View();
$view->article = Article::getLastRecords(4);
$view->articles = Article::findAll();
var_dump(count($view->article));
var_dump(count($view->articles));
var_dump(count($view));

$view = new View();
$view->__set('1', 'первый');
$view->__set('2', 'второй');
$view->__set('3', 'третий');

foreach ($view as $key => $val)
{
    echo $key . ':' . $val . "\n";
}

