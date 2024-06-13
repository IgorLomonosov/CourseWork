<?php
$this->Title = 'Редагування новини';
/** @var array $news */
if (empty($news)) {
    $news = [];
}
?>
<style>
    .card > img {
        width: 100%;
        height: 100%;
    }
</style>
<form method="post" action="" enctype="multipart/form-data">
    <?php if (!empty($error_message)) : ?>
        <div class="alert alert-danger" role="alert">
            <?= $error_message ?>
        </div>
    <?php endif; ?>
    <div class="container">
        <div class="card mb-3 mx-auto" style="width: 45%; height: 45%">
            <img src="data:image/png;base64,<?= \models\Images::getImage($news['id']) ?>"
                 alt="<?= $news['short_text'] ?>">
        </div>
        <div class="mb-3">
            <label for="title" class="form-label">Тип посту (Новина, Інтерв'ю, тощо):</label>
            <input id="title" value="<?= $news['title'] ?>" type="text" class="form-control" name="title" required>
        </div>
        <div class="mb-3">
            <label for="short_text" class="form-label">Короткий опис посту:</label>
            <textarea id="short_text" class="form-control" name="short_text" rows="2"
                      required><?= $news['short_text'] ?></textarea>
        </div>
        <div class="mb-3">
            <label for="text">Опис посту:</label>
            <textarea id="text" name="text" class="form-control" rows="10" required><?= $news['text'] ?></textarea>
        </div>
        <div class="mb-3">
            <label for="file" class="form-label">Завантажити файл:</label>
            <input id="file" type="file" class="form-control" name="image">
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="approval" name="approval">
            <label class="form-check-label" for="approval">Погодити новину</label>
        </div>
        <input type="hidden" name="date" value="<?= $news['date']?>">
        <input type="hidden" name="newsId" value="<?= $news['id']?>">
        <button type="submit" class="btn btn-primary" name="action" value="save">Зберегти</button>
        <button type="submit" class="btn btn-danger" name="action" value="delete">Видалити</button>
    </div>
</form>
