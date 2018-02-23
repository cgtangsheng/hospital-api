<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\CheckRecord */

$this->title = 'Create Check Record';
$this->params['breadcrumbs'][] = ['label' => 'Check Records', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="check-record-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
