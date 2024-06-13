<?php

$this->title = 'Видалення акаунта';
?>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <form method="post" action="">
                <div class="mb-3">
                    <h1>
                        <p class="text-danger text-center">Ви впевнені, що хочете видалити акаунт?</p>
                    </h1>
                    <?php if (!empty($error_message)) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?= $error_message ?>
                        </div>
                    <?php endif; ?>
                </div>
                <br><br><br><br><br><br>
                <div class="mb-3">
                    <label for="password" class="form-label">Підтвердіть пароль:</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <br><br><br><br><br><br>
                <div class="d-flex justify-content-between">
                    <button type="button" class="btn btn-secondary" onclick="history.back()">Назад</button>
                    <button type="submit" class="btn btn-danger" name="delete" value="delete">Видалити акаунт</button>
                </div>
            </form>
        </div>
    </div>
</div>