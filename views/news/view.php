<?php

use models\News;

if (empty($news)) {
    $news = [];
    $comments = [];
} else
    $this->Title = $news['short_text'];
$comments = \models\Comments::findByCondition(['news'=>$news['id']]);
?>
<style>
    h1 {
        text-align: center;
    }

    img {
        width: 90%;
        height: 50%;
        margin-left: 5%;
        margin-bottom: 20px;
    }

    .container {
        width: 100%;
        max-width: 90%;
        margin: auto;
    }

    .content {
        font-size: 18px;
        white-space: pre-wrap;
        word-wrap: break-word;
    }

    .date {
        text-align: center;
        margin: 20px;
        font-size: 30px;
        color: crimson;
    }
</style>
<div class="container">
    <div class="date">
        <small><?= News::getDate($news) ?></small>
    </div>
    <div class="container">
        <img src="data:image/png;base64,<?= \models\Images::getImage($news['id']) ?>" alt="<?= $news['short_text'] ?>">
    </div>

    <div class="container">
        <pre class="content"><?= htmlspecialchars($news['text']) ?></pre>
    </div>
</div>
<div class="container">
    <?php if(\models\Users::IsUserLogged()): ?>
    <h3>Додати коментар</h3>
    <form method="post" action="">
        <input type="hidden" name="newsID" value="<?= $news['id'] ?>">
        <input type="hidden" name="userID" value="<?= \core\Core::get()->session->get('user')['id'] ?>">
        <div class="form-group">
            <label for="text">Коментар:</label>
            <textarea id="text" name="content" class="form-control" rows="4" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Add Comment</button>
    </form>
    <?php endif;?>
    <h2 class="mt-5">Коментарі</h2>
    <div id="comments" class="mb-5">
        <?php if($comments != null):
        foreach ($comments as $comment): ?>
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title"><?= htmlspecialchars(\models\Users::findById($comment['user'])['login']) ?>:</h5>
                    <p class="card-text"><?= nl2br(htmlspecialchars($comment['content'])) ?></p>
                </div>
            </div>
        <?php endforeach;
        endif; ?>
    </div>
</div>

