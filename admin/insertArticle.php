<?php

require __DIR__ . '/../autoload.php';

use \App\Models\Article;

if (!empty($_POST['title']) || !empty($_POST['content']) || !empty($_POST['author'])) {
    $article = new Article();
    $article->title = $_POST['title'];
    $article->content = $_POST['content'];
    $article->author = $_POST['author'];
    $article->save();
    header('Location: /admin/index.php');
} else {
    echo 'Вы не ввели необходимые данные';
    include __DIR__ . '/index.php';
}