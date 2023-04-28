<?php


use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Comment $model */
/** @var yii\widgets\ActiveForm $form */

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
                <p>COMMS</p>
                <?php foreach ($comments as $comm){
                    if ($comm->post_id == $post->id){?>
                    <p><?= $comm->user_id; ?></p>
                    <p><?= $comm->text; ?></p>
                <?php
                    }
                }
                if (!Yii::$app->user->isGuest):?>


                <div class="comment-form">

                    <?php $form = ActiveForm::begin(['action' => ['comment/create']]); ?>

                    <?= $form->field($model, 'post_id')->textInput(['value' => $post->id, 'style' => 'display: none']) ?>

                    <?= $form->field($model, 'user_id')->textInput(['value' => Yii::$app->user->id, 'style' => 'display: none']) ?>

                    <?= $form->field($model, 'text')->textarea(['rows' => 6]) ?>

                    <div class="form-group">
                        <?= Html::submitButton('Comment', ['class' => 'btn btn-success']) ?>
                    </div>

                    <?php ActiveForm::end(); ?>

                </div>
                <?php endif; ?>

            </div>
        <?php endforeach; ?>
    </div>
</div>
