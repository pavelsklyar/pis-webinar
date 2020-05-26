<?php

/** @var $directions */

?>

<div>
    <a href="/directions/add/">Добавить</a>
</div>

<div>
    <?php if ($directions === null) : ?>
    <p>Направлений обучения пока нет</p>
    <?php else : ?>
        <table class="table">
            <tr>
                <td class="td">ID</td>
                <td class="td">Название направления</td>
                <td class="td">Шифр направления</td>
                <td class="td">Факультет</td>
                <td class="td">edit</td>
                <td class="td">delete</td>
            </tr>

            <?php foreach ($directions as $direction) : ?>
            <tr>
                <td class="td"><?= $direction['id'] ?></td>
                <td class="td"><?= $direction['name'] ?></td>
                <td class="td"><?= $direction['code'] ?></td>
                <td class="td"><?= $direction['faculty_name'] ?></td>
                <td class="td">
                    <a href="/directions/edit/<?= $direction['id']; ?>">Изменить</a>
                </td>
                <td class="td">
                    <a href="/directions/delete/?id=<?= $direction['id']; ?>">Удалить</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
</div>