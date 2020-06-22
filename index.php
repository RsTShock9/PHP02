<?php

require __DIR__ . '/autoload.php';

use \App\Models\Article;

$lastThree = Article::getLastRecords(4);

include __DIR__ . '/templates/news.php';