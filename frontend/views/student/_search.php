<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\StudentSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="student-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'std_id') ?>

    <?= $form->field($model, 'std_name') ?>

    <?= $form->field($model, 'std_address') ?>

    <?= $form->field($model, 'std_tel') ?>

    <?= $form->field($model, 'std_pic') ?>

    <?php // echo $form->field($model, 'pa_id') ?>

    <?php // echo $form->field($model, 'c_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
