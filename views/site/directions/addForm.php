<?php
/** @var $faculties */
?>

<form action="/directions/add/" method="post">
    <div>
        <input type="text" name="code" placeholder="Шифр направления">
    </div>
    <div>
        <input type="text" name="name" placeholder="Название направления">
    </div>
    <div>
        <select name="faculty_id" id="">
            <?php foreach ($faculties as $faculty) : ?>
                <option value="<?= $faculty['id'] ?>"><?= $faculty['name'] ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div>
        <button type="submit">Добавить</button>
    </div>
</form>