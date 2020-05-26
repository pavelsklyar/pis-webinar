<?php

/** @var $faculties */

?>

<div>
    <a href="/faculties/add/">Добавить</a>
</div>

<div>
    <?php if ($faculties === null) : ?>
    <p>Факультетов пока нет</p>
    <?php else : ?>
        <table class="table">
            <tr>
                <td class="td">ID</td>
                <td class="td">Название факультета</td>
                <td class="td">edit</td>
                <td class="td">delete</td>
            </tr>

            <?php foreach ($faculties as $faculty) : ?>
            <tr>
                <td class="td"><?= $faculty['id'] ?></td>
                <td class="td"><?= $faculty['name'] ?></td>
                <td class="td">
                    <a href="/faculties/edit/<?= $faculty['id']; ?>">Изменить</a>
                </td>
                <td class="td">
                    <a href="/faculties/delete/?id=<?= $faculty['id']; ?>">Удалить</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
</div>