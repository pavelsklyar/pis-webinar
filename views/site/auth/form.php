<?php

/**
 * @var $error
 */

?>

<h1>Авторизация</h1>

<?php if (isset($error)) : ?>
<p><?= $error ?></p>
<?php endif; ?>

<form action="/" method="post">
    <input type="email" name="email" placeholder="email">
    <input type="password" name="password" placeholder="пароль">
    <button type="submit">Войти</button>
</form>