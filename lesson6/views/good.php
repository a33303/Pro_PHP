<?php
/** @var \App\models\Good  $good*/
/** @var \App\models\Comment  $comment*/
?>

<h1>Товар <?= $good->name ?></h1>
<br>
<a href="?c=good&a=update&id=<?= $good->id ?>">Изменить</a>
<a href="?c=good&a=delete&id=<?= $good->id ?>">Удалить</a>

<p>Комментарий<br>
<form action="<?= $comment->id ?>">
    <textarea name="comment" cols="40" rows="3"></textarea></p>
    <p><input type="submit" value="Отправить">
        <input type="reset" value="Очистить"></p>
</form>