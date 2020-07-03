<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="/Templates/css/style.css">
    <title>Исключения</title>
</head>
<body>

<div class="error">
    <h2>Возникла ошибка:</h2>
    <? foreach ($this->errors->getErrors() as $error) { ?>
        <div>
            <?php echo $error->getMessage(); ?><br>
        </div>
    <?php } ?>

    <br><a href="/admin/index/?role=admin">Перейти на главную страницу админ-панели</a>
</div>

</body>
</html>