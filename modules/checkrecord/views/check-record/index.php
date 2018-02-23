<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CheckRecordSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Check Records';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="check-record-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Check Record', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'health_id',
            'height',
            'weight',
            'waist',
            'hip',
            // 'diet',
            // 'motion',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
