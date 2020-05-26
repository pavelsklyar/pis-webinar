<?php

/**
 * @var $faculty
 * @var $error
 */

?>

<?php if (!isset($faculty)) : ?>
<p>Передано неверное значение</p>
<?php else: ?>
    <?php if (isset($error)) : ?>
    <p><?= $error ?></p>
    <?php endif; ?>

    <form action="/faculties/edit/" method="post">
        <div>
            <input class="input" type="text" name="name" placeholder="Название факультета" value="<?= $faculty['name'] ?>">
            <input type="number" value="<?= $faculty['id'] ?>" name="id" style="display: none">
            <button type="submit">Изменить</button>
        </div>
    </form>
<?php endif; ?>