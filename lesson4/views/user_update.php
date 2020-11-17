<?php
/** @var \App\models\Good $good */
?>

<form method="post">



    <input type="text" placeholder="login" value="<?= $good->name?>" name="name">
    <input type="text" placeholder="password" value="<?= $good->price?>" name="price">
    <input type="submit">
</form>