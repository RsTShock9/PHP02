<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="/css/style.css">
    <title>AdminPanel</title>
</head>
<body>
<div>
    <h2>Добавить новость</h2>
    <form action="/admin/insertArticle.php" method="post">
        Название:<br><input type="text" name="title" size="120"><br>
        Текст:<br><input type="text" name="content" size="120"><br>
        Автор:<br><input type="text" name="author" size="120"><br><br>
        <button type="submit">Добавить</button>
        <br><br><br>
    </form>
</div>

<table>
    <?php foreach ($news as $article) { ?>
        <tr>
            <td>
                <a href="/admin/article.php?id=<?php echo $article->id; ?>">Редактировать</a>
                <a href="/admin/deleteArticle.php?id=<?php echo $article->id; ?>">Удалить</a>
            </td>
        </tr>
        <tr>
            <td>
                <h3><?php echo $article->title; ?></h3>
                <hr>
            </td>
        </tr>
    <?php } ?>
</table>

</body>
</html>