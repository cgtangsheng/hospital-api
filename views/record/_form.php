<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Record */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="record-form">

    <?php $form = ActiveForm::begin(); ?>

<!--    --><?php //if(Yii::$app->user->getIdentity()->getId() != "1000000001"):?>
        <?= $form->field($model, 'health_id')->textInput(['maxlength' => true]) ?>
<!--    --><?// endif; ?>
    <?= $form->field($model, 'examined_hospital')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'diagnosis')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'diagnosis_hospital')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'medication')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'department')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'medication_hospital')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
