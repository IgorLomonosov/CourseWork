<?php
$this->Title = 'Реєстрація'
/** @var string $error_message Повідомлення про помилку*/
?>
<form method="post" action="">
    <?php if (!empty($error_message)) : ?>
        <div class="alert alert-danger" role="alert">
            <?= $error_message ?>
        </div>
    <?php endif; ?>
    <div class="mb-3">
        <label for="InputEmail" class="form-label">Логін(email)</label>
        <input value="<?= $this->controller->post->login ?>" name="login" type="email" class="form-control" id="InputEmail">
    </div>
    <div class="mb-3">
        <label for="InputPassword1" class="form-label">Пароль</label>
        <input name="password" type="password" class="form-control" id="InputPassword1">
    </div>
    <div class="mb-3">
        <label for="InputPassword2" class="form-label">Повторно введіть пароль</label>
        <input name="password2" type="password" class="form-control" id="InputPassword2">
    </div>
    <div class="mb-3">
        <label for="InputFirstName" class="form-label">Ім'я</label>
        <input value="<?= $this->controller->post->firstName ?>" name="firstName" type="text" class="form-control" id="InputFirstName">
    </div>
    <div class="mb-3">
        <label for="InputLastName" class="form-label">Прізвище</label>
        <input value="<?= $this->controller->post->lastName ?>" name="lastName" type="text" class="form-control" id="InputLastName">
    </div>
    <button type="submit" class="btn btn-primary">Зареєструватися</button>
</form>
