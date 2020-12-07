<?php
    /** @var string  $content*/
    /** @var string  $msg*/
    /** @var string  $menu*/
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<p style="color: red"> <?= $msg ?></p>
<ul>
    <?= $menu ?>
</ul>
    <?= $content ?>
</body>
</html>