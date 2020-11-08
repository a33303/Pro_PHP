<?php

include dirname(__DIR__) . '/services/Autoload.php';
spl_autoload_register([(new Autoload()), 'loadClass']);

$db = new DB();
$user = new Good($db);
echo $user->getOne(16) . ' <br>';
echo $user->getAll() . ' <br>';

echo $user->getCalc(12, 5);
