<?php

use models\News;

$this->Title = 'Головна сторінка';

if(empty($newsArr))
    $newsArr = [];
$value=0;
?>
<div class="container py-5">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h2 class="text-center mb-4">Музичний портал новин</h2>
            <p class="lead text-muted">Ось місце, де музика зустрічається з новинами!</p>
            <p>Наш портал новин присвячений всьому, що пов'язано з музикою: нові релізи, концерти, фестивалі, інтерв'ю з артистами та багато іншого. Ми стежимо за останніми подіями в музичному світі та надаємо вам найсвіжішу інформацію.</p>
            <p>З нами ви будете в курсі всіх музичних новин, від класики до сучасної електроніки. Ми також пропонуємо вам оглядати наші статті, рецензії та інтерв'ю, щоб дізнатися більше про ваших улюблених артистів.</p>
        </div>
    </div>
</div>
<h3>Останні новини</h3>
<?php foreach ($newsArr as $news) {
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
        break;
    endif;
} ?>
