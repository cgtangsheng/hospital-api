<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CheckRecord */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="check-record-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'health_id')->textInput() ?>

    <?= $form->field($model, 'height')->textInput() ?>

    <?= $form->field($model, 'weight')->textInput() ?>

    <?= $form->field($model, 'waist')->textInput() ?>

    <?= $form->field($model, 'hip')->textInput() ?>

    <?= $form->field($model, 'diet')->textInput() ?>

    <?= $form->field($model, 'motion')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
