<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Classroom */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="classroom-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'c_name')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
