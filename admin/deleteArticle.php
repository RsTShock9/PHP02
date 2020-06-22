<?php

require __DIR__ . '/../autoload.php';

use \App\Models\Article;

$article = Article::findById($_GET['id'])->delete();

header('Location: /admin/index.php');

