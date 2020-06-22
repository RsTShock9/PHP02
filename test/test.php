<?php

require __DIR__ . '/../autoload.php';

use \App\Models\Article;

//Проверка метода execute($query, $params=[]) на вставку
$db = new \App\Db();
$sql = 'INSERT INTO articles (title,content,author) 
VALUES (\' AMD представила процессоры серии Ryzen 3000 XT \', 
\' Компания AMD представила новую серию настольных процессоров, которые являются разогнанной версией Ryzen 3000X. 
В рознице за рубежом они появятся 7 июля по цене, идентичной процессорам X-серии. \', 
\' Виталий Олехнович \')';
$new = $db->execute($sql, []);
var_dump($new);

//Проверка метода execute($query, $params=[]) на апдейт
$db = new \App\Db();
$sql = 'UPDATE articles SET
"title" = \' Обновление \', 
"content" = \' Обновленная запись \', 
"author" = \' Виталий Клубков \' 
WHERE id=13';
$update = $db->execute($sql, []);
var_dump($update);

//получаем все новости
$news = Article::findAll();
var_dump($news);

//в адресную строку пишу ..../index.php?id=2 получаем новость по id
$id = $_GET['id'];
$article = Article::findById($id);
var_dump($article);

//получение последних трех записей
$lastThree = Article::getLastRecords(3);
var_dump($lastThree);

