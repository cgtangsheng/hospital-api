<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\UserInfo */

$this->title = 'Update User Info: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'User Infos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->health_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="user-info-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
