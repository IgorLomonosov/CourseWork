<?php
$this->Title = 'Додавання новини';
?>
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2 class="text-center mb-4">Додавання новини</h2>
            <form method="post" action="" enctype="multipart/form-data">
                <?php if (!empty($error_message)) : ?>
                <divclass="alert alert-danger" role="alert">
                <?= $error_message?>
        </div>
        <?php endif;?>
        <div class="form-group mb-3">
            <label for="title" class="form-label">Тип посту (Новина, Інтерв'ю, тощо):</label>
            <input id="title" value="<?= $this->controller->post->title?>" type="text" class="form-control" name="title" required placeholder="Введіть тип посту">
        </div>
        <div class="form-group mb-3">
            <label for="short_text" class="form-label">Короткий опис посту:</label>
            <textarea id="short_text"  class="form-control" name="short_text" rows="2" required placeholder="Введіть короткий опис посту"><?= $this->controller->post->short_text?></textarea>
        </div>
        <div class="form-group mb-3">
            <label for="text">Опис посту:</label>
            <textarea id="text" name="text" class="form-control" rows="6" required placeholder="Введіть опис посту"><?= $this->controller->post->text?></textarea>
        </div>
        <div class="form-group mb-3">
            <label for="file" class="form-label">Завантажити файл:</label>
            <input id="file" type="file" class="form-control" name="image" required>
        </div>
        <input type="hidden" name="isApproved" value="0">
        <input type="hidden" name="date" value="<?= date('Y-m-d H:i:s')?>">
        <button type="submit" class="btn btn-primary btn-block" name="action" value="addNews">Додати</button>
        </form>
    </div>
</div>
</div>