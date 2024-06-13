<?php

use models\News;

$this->Title = 'Список новин';
/**
* @var array $newsarray
 */
if(empty($newsarray))
    $newsarray = [];
if(empty($error_message))
    $error_message = '';
$value = 0;
?>
<style>
    .card a {
        display: block;
        text-decoration: none;
        color: inherit;
    }
    .card a:hover {
        text-decoration: none;
    }

</style>
<?php if (!empty($error_message)) : ?>
    <div class="alert alert-danger" role="alert">
        <?= $error_message ?>
    </div>
<?php endif; ?>
<div class="container mb-3">
    <div class="row">
        <div class="col-md-2">
            <form method="post" action="">
                <div class="btn-group" role="group">
                    <button type="submit" class="btn btn-outline-info" name="action" value="desc">Сортувати від найновіших</button>
                    <button type="submit" class="btn btn-outline-info" name="action" value="asc">Сортувати від найстаріших</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php foreach ($newsarray as $news) {
    $value++;
    if($value == 1 ):
    ?>
    <div class="card-group">
        <?php endif; ?>
        <div class="card">
            <a href="/news/view/<?= $news['id']?>" style="text-decoration: none; color: inherit;">

            <img src="data:image/png;base64,<?= \models\Images::getImage($news['id'])?>" class="card-img-top" alt="<?= $news['short_text']?>">
            <div class="card-body">
                    <h5 class="card-title"><?= $news['title']?></h5>
                    <p class="card-text"><?= $news['short_text']?></p>
                <a href=""></a>
            </div>
            </a>
            <div class="card-footer">
                <small class="text-body-secondary"><?= News::getDate($news)?></small>
            </div>
        </div>
        <?php if($value == 3) :?>
        </div>
        <br>
<?php $value=0;
endif;
} ?>

