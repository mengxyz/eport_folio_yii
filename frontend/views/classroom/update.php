<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Classroom */

$this->title = 'Update Classroom: ' . $model->c_id;
$this->params['breadcrumbs'][] = ['label' => 'Classrooms', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->c_id, 'url' => ['view', 'id' => $model->c_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="classroom-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
