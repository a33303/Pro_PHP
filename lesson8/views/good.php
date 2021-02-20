<?php
/** @var \App\models\Good  $good*/
/** @var \App\models\Comment  $comments*/
?>

<h1>Товар: <?= $good->name ?></h1>
<form name="test" method="post" action="?c=good&a=addComment&id=<?=$good->id?>">
    <p>Комментарий<Br>
        <textarea name="comment" cols="60" rows="5"></textarea></p>
    <p><input type="submit" value="Отправить">
        <input type="reset" value="Очистить"></p>
</form>

<? var_dump($comments); if(isset($comments)):?>
    <?php foreach ($comments as $comment): ?>
        Тело коммента: <?= $comment->text?><br>
        Название: <?= $comment->id?><br>
        <hr>
    <?php endforeach; ?>
<? endif;?>
