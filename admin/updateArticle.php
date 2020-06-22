<?php

require __DIR__ . '/../autoload.php';

use \App\Models\Article;

if (!empty($_POST['title']) || !empty($_POST['content']) || !empty($_POST['author'])) {
    $article = new Article();
    $article->id = $_POST['id'];
    $article->title = $_POST['title'];
    $article->content = $_POST['content'];
    $article->author = $_POST['author'];
    $article->save();
    header('Location: /admin/article.php?id='. $article->id . '');
} else {
    echo 'Нужно ввести хотя бы одно значение, попробуйте еще раз';
    include __DIR__ . '/index.php';
}
