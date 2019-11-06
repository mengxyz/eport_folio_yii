<?php

use frontend\models\Student;
use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model frontend\models\Student */

$this->title = $model->std_id;
$this->params['breadcrumbs'][] = ['label' => 'Students', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="student-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->std_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->std_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'std_id',
            'std_name',
            'std_address',
            'std_tel',
            'std_pic',
            'pa_id',
            'classroomName.c_name',
            [
                'attribute' => 'std_pic',
                'format' => 'html',
                'value' => function($model){
                    $img =  Url::base()."/photo/".$model->std_pic;
                    return
                    '<img src="'.$img.'" alt="">';
                }
            ]
        ],
    ]) ?>

</div>
