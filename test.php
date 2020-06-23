<?php

require __DIR__ . '/autoload.php';

use \App\Models\Article;

$article = Article::findById(3);
var_dump(isset($article->author));