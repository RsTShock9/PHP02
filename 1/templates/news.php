<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h2>Новости:</h2>
<?php foreach ($lastThree as $article) { ?>
    <div>
        <a href="/1/article.php?id=<?php echo $article->id; ?>"><?php echo $article->title; ?></a><br>
        <?php echo $article->content; ?><br>
        Автор статьи: <?php echo $article->author; ?><br><br>
    </div>
<?php } ?>
</body>
</html>