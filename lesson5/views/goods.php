<?php
/** @var \App\models\Good[]  $goods*/
/** @var string  $title*/
?>

<h1><?= $title ?></h1>

<?php foreach ($goods as $good): ?>
    Название: <?= $good->name ?><br>
    <a href="/?c=good&a=one&id=<?= $good->id ?>">More..</a>
    <hr>
<?php endforeach; ?>
