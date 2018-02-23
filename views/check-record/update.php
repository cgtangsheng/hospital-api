<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CheckRecord */

$this->title = 'Update Check Record: ' . $model->health_id;
$this->params['breadcrumbs'][] = ['label' => 'Check Records', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->health_id, 'url' => ['view', 'id' => $model->health_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="check-record-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
