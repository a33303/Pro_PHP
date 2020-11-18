<?php
/** @var \App\models\Good $good */
?>

<form method="post">



    <input type="text" placeholder="Good" value="<?= $good->name?>" name="name">
    <input type="text" placeholder="Price" value="<?= $good->price?>" name="price">
    <input type="submit">
</form>