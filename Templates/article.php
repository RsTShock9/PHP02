<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="/Templates/css/style.css">
    <title><?php echo $this->article->title; ?></title>
</head>
<body>
<a href="/index">Перейти на главную страницу</a><br><br>

<div>
    <h2><?php echo $this->article->title; ?></h2>
    <?php echo $this->article->content; ?><br><br>
    <?php if (isset($this->article->author->name)) : ?>
        Автор: <?php echo $this->article->author->name ?>
    <?php endif; ?>
</div>

</body>
</html>