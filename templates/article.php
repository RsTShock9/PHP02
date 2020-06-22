<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $article->title; ?></title>
</head>
<body>
<div>
    <h2><?php echo $article->title; ?></h2>
    <?php echo $article->content; ?><br><br>
    <?php echo $article->author; ?>
</div>
</body>
</html>