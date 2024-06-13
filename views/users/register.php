<?php
$this->Title = 'Реєстрація'
/** @var string $error_message Повідомлення про помилку*/
?>
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2 class="text-center mb-4">Реєстрація</h2>
            <form method="post" action="">
                <?php if (!empty($error_message)) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?= $error_message ?>
                    </div>
                <?php endif; ?>
                <div class="form-group mb-3">
                    <label for="InputEmail" class="form-label">Логін(email)</label>
                    <input value="<?= $this->controller->post->login ?>" name="login" type="email" class="form-control" id="InputEmail" placeholder="Введіть логін(email)">
                </div>
                <div class="form-group mb-3">
                    <label for="InputPassword1" class="form-label">Пароль</label>
                    <input name="password" type="password" class="form-control" id="InputPassword1" placeholder="Введіть пароль">
                </div>
                <div class="form-group mb-3">
                    <label for="InputPassword2" class="form-label">Повторно введіть пароль</label>
                    <input name="password2" type="password" class="form-control" id="InputPassword2" placeholder="Повторно введіть пароль">
                </div>
                <div class="form-group mb-3">
                    <label for="InputFirstName" class="form-label">Ім'я</label>
                    <input value="<?= $this->controller->post->firstName ?>" name="firstName" type="text" class="form-control" id="InputFirstName" placeholder="Введіть ім'я">
                </div>
                <div class="form-group mb-3">
                    <label for="InputLastName" class="form-label">Прізвище</label>
                    <input value="<?= $this->controller->post->lastName ?>" name="lastName" type="text" class="form-control" id="InputLastName" placeholder="Введіть прізвище">
                </div>
                <button type="submit" class="btn btn-primary btn-block" name="action" value="register">Зареєструватися</button>
            </form>
        </div>
    </div>
</div>