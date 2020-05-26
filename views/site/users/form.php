<?php

/**
 * @var $error
 * @var $statuses
 */

?>

<h1>Регистрация</h1>

<?php if (isset($error)) : ?>
<p><?= $error ?></p>
<?php endif; ?>

<form action="/users/add/" method="post">
    <div>
        <input type="email" name="email" placeholder="email">
    </div>
    <div>
        <input type="password" name="password" placeholder="пароль">
    </div>
    <div>
        <input type="password" name="passwordTwice" placeholder="пароль ещё раз">
    </div>

    <div>
        <input type="text" name="surname" placeholder="Фамилия">
    </div>
    <div>
        <input type="text" name="name" placeholder="Имя">
    </div>
    <div>
        <input type="text" name="fathername" placeholder="Отчество">
    </div>

    <div>
        <select name="status_id" id="">
            <?php foreach ($statuses as $status) : ?>
                <option value="<?= $status['id'] ?>"><?= $status['name'] ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div>
        <button type="submit">Добавить</button>
    </div>
</form>