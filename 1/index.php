<?php

require __DIR__ . '/autoload.php';

use \App\Models\Article;

$lastThree = Article::lastThree();

include __DIR__ . '/templates/news.php';