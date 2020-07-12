<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="/Templates/css/style.css">
    <title>Админ-панель</title>
</head>
<body>

<a href="/index">Перейти на главную страницу сайта</a><br>
<div>
    <h2>Добавить новость</h2>
    <form action="/admin/insert" method="post">
        Название:<br><input type="text" name="title" size="120"><br>
        Текст:<br><input type="text" name="content" size="120"><br>
        Автор:<br><select name="author_id">
            <?php foreach ($this->authors as $author) { ?>
                <option value="<?php echo $author->id; ?>">
                    <?php echo $author->name; ?></option>
            <?php } ?>
        </select><br><br>
        <button type="submit">Добавить</button>
        <br><br><br>
    </form>
</div>

<table class="admin">
    <tr>
        <th>Id</th>
        <th>Title</th>
        <th>Content</th>
        <th>Author</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    <?php foreach ($this->articles as $article): ?>
        <tr>
            <?php foreach ($article as $row): ?>
                <td><?php echo $row; ?></td>
            <?php endforeach; ?>
            <td><a href="/admin/article/?id=<?php echo $article[0]; ?>">Редактировать</a></td>
            <td><a href="/admin/delete/?id=<?php echo $article[0]; ?>">Удалить</a></td>
        </tr>
    <?php endforeach; ?>
</table>

</body>
</html>