<?php
$this->Title = 'Вхід на сайт'
/** @var string $error_message Повідомлення про помилку*/
?>
<form method="post" action="">
    <?php if (!empty($error_message)) : ?>
        <div class="alert alert-danger" role="alert">
            <?= $error_message ?>
        </div>
    <?php endif; ?>
    <div class="mb-3">
        <label for="InputEmail1" class="form-label">Логін(email)</label>
        <input name="login" type="email" class="form-control" id="InputEmail1">
    </div>
    <div class="mb-3">
        <label for="InputPassword1" class="form-label">Пароль</label>
        <input name="password" type="password" class="form-control" id="InputPassword1">
    </div>
    <button type="submit" class="btn btn-primary">Увійти</button>
</form>
