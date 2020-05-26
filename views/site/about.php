<?php

/**
 * @var $param string
 * @var $array
 */

?>

<h1>Обо мне</h1>

<p><?= $param ?></p>

<?php echo $param; ?>
<?= $param ?>


<?php if (is_array($array)) : ?>

<?php foreach ($array as $key => $item) : ?>
<ul>[<?= $key ?>] = <?= $item ?></ul>
<?php endforeach; ?>

<?php endif; ?>
