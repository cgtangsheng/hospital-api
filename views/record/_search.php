<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RecordSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="record-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'health_id') ?>

    <?= $form->field($model, 'examined_hospital') ?>

    <?= $form->field($model, 'diagnosis') ?>

    <?= $form->field($model, 'diagnosis_hospital') ?>

    <?php // echo $form->field($model, 'medication') ?>

    <?php // echo $form->field($model, 'department') ?>

    <?php // echo $form->field($model, 'medication_hospital') ?>

    <?php // echo $form->field($model, 'creat_time') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
