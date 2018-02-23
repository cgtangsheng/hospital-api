<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RecordSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '就诊信息';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="record-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Record', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'health_id',
            [
                'attribute'=>'name',
                'value'=>function($data){
                    return $data->getName($data->health_id);
                }
            ],
            'examined_hospital',
            'diagnosis',
            'diagnosis_hospital',
             'medication',
             'department',
             'medication_hospital',
             'creat_time',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
