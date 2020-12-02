<?php
/** @var \App\models\User $user */
?>
<form method="post">
    <input type="text" placeholder="login" value="<?= $user->login?>" name="login">
    <input type="text" placeholder="password" value="<?= $user->password?>" name="password">
    <input type="submit">
</form>