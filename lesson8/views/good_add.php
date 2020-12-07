<?php
/** @var  $image */
/** @var  $images */

foreach ($images as $image) :
    $imgUrl = "/img/{$image['path']}";
    ?>
    <a href="/photo.php?id=<?=$image['id']?>">
        <img src="<?=$imgUrl?>" width='200'>
    </a>
<? endforeach;?>

<form method="post">
    <input type="text" placeholder="Good" name="login">
    <input type="text" placeholder="Price" name="password">
    <input type="submit">
</form>

<form action="" method="post" enctype="multipart/form-data">
    <input type="file" name="image[]" multiple>
    <input type="submit">
</form>