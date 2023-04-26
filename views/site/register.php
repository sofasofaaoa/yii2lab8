<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\User $model */
/** @var ActiveForm $form */
?>
<div class="site-register">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'fio') ?>
        <?= $form->field($model, 'email') ?>
        <?= $form->field($model, 'login') ?>
        <?= $form->field($model, 'password')->passwordInput() ?>
        <?= $form->field($model, 'repeat_password')->passwordInput() ?>
        <?= $form->field($model, 'file', ['enableAjaxValidation' => false])->fileInput() ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- site-register -->
