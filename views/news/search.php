<?php

use models\News;

$this->Title = 'Пошук';
$searchQuery = \core\Core::get()->controllerObject->post->searchQuery;
$newsArray = \models\News::searchNewsByTitle($searchQuery);
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

<div class="container py-5">
    <div class="row justify-content-center">
        <div class  class="col-md-8">
            <h2 class="text-center mb-4">Результати пошуку</h2>
            <?php foreach ($newsArray as $news) {
                $value++;
                if ($value == 1):
                    ?>
                    <div class="card-group">
                <?php endif;?>
                <div class="card">
                    <a href="/news/view/<?= $news['id']?>" style="text-decoration: none; color: inherit;">

                        <img src="data:image/png;base64,<?= \models\Images::getImage($news['id'])?>" class="card-img-top"
                             alt="<?= $news['short_text']?>">
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
                <?php if ($value == 3) :?>
                    </div>
                    <br>
                    <?php $value = 0;
                endif;
            }?>
        </div>
    </div>
</div>