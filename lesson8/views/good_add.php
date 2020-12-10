<?php
/** @var  $image */
/** @var  $images */
?>

<form action="/models/Good.php" method="post">
    <input type="text" placeholder="Good" name="login">
    <input type="text" placeholder="Price" name="password">
    <input type="submit">
</form>
<br>
<form action="" method="post" enctype="multipart/form-data">
    <input type="file" name="image[]" multiple>
    <input type="submit">
</form>