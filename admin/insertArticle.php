<?php

require __DIR__ . '/../autoload.php';

use \App\Models\Article;

if (!empty($_POST['title']) && !empty($_POST['content']) && !empty($_POST['author_id'])) {
    $article = new Article();
    $article->title = $_POST['title'];
    $article->content = $_POST['content'];
    $article->author_id = $_POST['author_id'];
    $article->save();
    header('Location: /admin/index.php');
} else {
    echo 'Вы не ввели необходимые данные';
    include __DIR__ . '/index.php';
}