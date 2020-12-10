<?php
/** @var \App\models\Good  $good*/
?>

<h1>Товар: <?= $good->name ?></h1>
<form name="test" method="post" action="/models/Comment.php">
    <p>Комментарий<Br>
        <textarea name="comment" cols="60" rows="5"></textarea></p>
    <p><input type="submit" value="Отправить">
        <input type="reset" value="Очистить"></p>
</form>