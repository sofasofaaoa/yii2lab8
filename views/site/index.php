<?php

/** @var yii\web\View $this */

$this->title = 'My Yii Application';
?>
<div class="site-index">
    <div class="body-content">
        <?php
        foreach ($posts as $post): ?>
            <div class="media">
                <h3><?= $post->title; ?></h3>
                <p><?= $post->text; ?></p>
                <form method="post" action="/yii2lab8/comment/create">
                    <label style="display: none">
                        <input type="text" name="post_id" value="<?= $post->id ?>">
                    </label>
                    <label style="display: none">
                        <input type="text" name="user_id" value="<?= Yii::$app->user->getId(); ?>">
                    </label>
                    <label>
                        <input type="text" name="text">
                    </label>
                    <button>Comment</button>
                </form>

            </div>
        <?php endforeach; ?>
    </div>
</div>
