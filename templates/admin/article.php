<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="/css/style.css">
    <title><?php echo $article->title; ?></title>
</head>
<body>
<h2>Редактировать новость</h2>
<form action="/admin/updateArticle.php" method="post">
    <input type="text" name="id" value="<?php echo $article->id; ?>" hidden size="120">
    Название:<br><input type="text" name="title" size="120"><br>
    Текст:<br><input type="text" name="content" size="120"><br>
    Автор:<br><input type="text" name="author" size="120"><br><br>
    <button type="submit" value="<?php $article->id; ?>">Редактировать</button>
    <br><br><br>
</form>

<div>
    <h2><?php echo $article->title; ?></h2>
    <?php echo $article->content; ?><br><br>
    <?php echo $article->author; ?>
</div>

</body>
</html>
