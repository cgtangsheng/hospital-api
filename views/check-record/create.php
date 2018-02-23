<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\CheckRecord */

$this->title = 'Create Check Record';
$this->params['breadcrumbs'][] = ['label' => 'Check Records', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div id="page-content">
    <!--Modal body-->
    <div class="modal-body">

    <h1><?php if($data === false){echo "提交失败,请联系管理员";}else{echo "提交成功";} ?></h1>


    </div>

</div>
