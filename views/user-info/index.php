<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UserInfoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '病人信息';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-info-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create User Info', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'health_id',
            'name',
            [
                'attribute'=>'sex',
                'value'=>function($data){
                    return $data->sex==0?"男":"女";
                }
            ],
            'age',
            'work',
             'height',
             'weight',
             'identify',
            'tel',
            // 'creat_time',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
