<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use frontend\models\Classroom;
use kartik\file\FileInput;
use kartik\select2\Select2;
use kartik\grid\GridView;;
/* @var $this yii\web\View */
/* @var $model frontend\models\Student */
/* @var $form yii\widgets\ActiveForm */
$test = ArrayHelper::map(Classroom::find()->all(), 'c_id', 'c_name')
?>
<div class="student-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'std_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'std_address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'std_tel')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'std_pic')
        ->widget(
            FileInput::classname(),
            [
                'options' =>
                [
                    'accept' => 'image/*',
                    'showUpload' => false
                ],
            ]
            // FileInput::classname(),[
            //     'options' => [
            //         'accept' => 'image/*',
            //     ],
            //     'pluginOptions' => [
                    
            //         'showPreview' => false,
            //         'showCaption' => true,
            //         'showRemove' => true,
            //         'showUpload' => false
            //     ]
            // ]
        );
    ?>

    <?= $form->field($model, 'pa_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'c_id')
        ->widget(
            Select2::classname(),
            [
                'data' => ArrayHelper::map(Classroom::find()->all(), 'c_id', 'c_name'),
                'options' => ['placeholder' => 'Select a classroom ...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]
        );

    ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>