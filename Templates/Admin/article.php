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
<a href="/admin/index/?role=admin">Перейти на главную страницу админ-панели</a>

<div>
    <h2>Редактировать новость</h2>
    <form action="/admin/update" method="post">
        <input type="text" name="id" value="<?php echo $this->article->id; ?>" hidden size="120">
        Название:<br><input type="text" name="title" size="120"><br>
        Текст:<br><input type="text" name="content" size="120"><br>
        Автор:<br><select name="author_id">
            <?php foreach ($this->authors as $author) { ?>
                <option value="<?php echo $author->id; ?>">
                    <?php echo $author->name; ?></option>
            <?php } ?>
        </select><br><br>
        <button type="submit" value="<?php $this->article->id; ?>">Редактировать</button>
        <br><br><br>
    </form>
</div>

<div>
    <h2><?php echo $this->article->title; ?></h2>
    <?php echo $this->article->content; ?><br><br>
    <?php if (isset($this->article->author->name)) { ?>
        Автор: <?php echo $this->article->author->name; ?>
    <?php } ?>
</div>

</body>
</html>