<?php

use models\News;

$this->Title = 'Список новин для погодження';
/**
 * @var array $newsarray
 */
if(empty($newsarray))
    $newsarray = [];
$value = 0;
?>
<?php if (!empty($error_message)) : ?>
    <div class="alert alert-danger" role="alert">
        <?= $error_message ?>
    </div>
<?php endif; ?>
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
<?php foreach ($newsarray as $news) {
    $value++;
    if($value == 1 ):
        ?>
        <div class="card-group">
    <?php endif; ?>
    <div class="card">
        <a href="/news/update/<?= $news['id']?>" style="text-decoration: none; color: inherit;">

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