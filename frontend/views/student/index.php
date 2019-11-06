<?php

use frontend\models\Classroom;
use yii\helpers\Html;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\StudentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Students';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="student-index">

    <h1>นักเรียน</h1>

    <p>
        <?= Html::a('Create Student', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'std_id',
            'std_name',
            // 'std_address',
            // 'std_tel',
            // 'std_pic',
            //'pa_id',
            //'c_id',
            [
                'attribute'=>'c_id',
                'format' => 'raw',
                'value' => function($model){
                    return isset($model->classroomName->c_name)?$model
                    ->classroomName
                    ->c_name:NULL;
                },
                'filterType' => GridView::FILTER_SELECT2,
                'filter' => ArrayHelper::map(Classroom::find()->where([])
                ->all(), 'c_id','c_name'),
                'filterWidgetOptions' =>
                [
                    'pluginOptions' => ['allowClear' => true]
                ],
                'filterInputOptions' => ['placeholder' => 'classroom']
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
