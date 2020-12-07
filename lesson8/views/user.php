<?php
/** @var \App\models\User $user */
?>

<h1>Пользователь</h1>

Логин: <?= $user->login ?>
<br>
<a href="?c=user&a=update&id=<?= $user->id ?>">Изменить</a>