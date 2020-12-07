<?php
    /** @var string  $content*/
    /** @var string  $msg*/
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<p style="color: red"> <?= $msg?></p>
<ul>
    <li><a href="/?c=user&a=index">Главная</a></li>
    <li><a href="/?c=good&a=all">Каталог</a></li>
    <li><a href="/?c=user&a=all">Все пользователи</a></li>
    <li><a href="/?c=user&a=add">Добавить</a></li>
</ul>
    <?= $content ?>
</body>
</html>