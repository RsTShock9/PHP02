<?php

require __DIR__ . '/autoload.php';

use \App\Models\Article;

$id = $_GET['id'];
$article = Article::findById($id);

include __DIR__ . '/templates/article.php';