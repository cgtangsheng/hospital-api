<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CheckRecordSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Check Records';
$this->params['breadcrumbs'][] = $this->title;
?>

<head>
    <style type="text/css">
        .mask{
            font-size: smaller;
            color: red;
            padding-bottom: 0px;
        }
    </style>
</head>

<div id="page-content">
    <div class="panel">
        <div class="panel-body">
           <div class="row">
        <div class="col-lg-6">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">健康自测<span id="health_id"><?php echo Yii::$app->user->identity->getId();?></span></h3>
                </div>


                <!--Input Size-->
                <!--===================================================-->
                <form class="form-horizontal">
                    <div class="panel-body">
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="demo-is-inputsmall">身高(cm)</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control input-sm" id="height">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="demo-is-inputnormal" class="col-sm-3 control-label">体重(kg)</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="weight">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="demo-is-inputlarge" class="col-sm-3 control-label">腰围(cm)</label>
                            <div class="col-sm-6">
                                <input type="text"  class="form-control input-lg" id="waist">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="demo-is-inputnormal" class="col-sm-3 control-label"></label>
                            <div class="col-sm-6">
                                <p class="mask">测量方法：测量部位在骨性胸廓最下缘与髂嵴最上缘的中点连线水平面上</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">臀围(cm)</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="hip">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="demo-is-inputnormal" class="col-sm-3 control-label"></label>
                            <div class="col-sm-6">
                                <p class="mask">测量方法：臀部最宽处</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">饮食</label>
                            <div class="col-sm-6">
                                <textarea placeholder="Message" rows="3" class="form-control" id="diet"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">运动</label>
                            <div class="col-sm-6">
                                <textarea placeholder="Message" rows="3" class="form-control" id="motion"></textarea>
                            </div>
                        </div>

                    </div>
                    <div class="panel-footer">
                        <div class="row">
                            <div class="col-sm-9 col-sm-offset-3">
                                <?= Html::a('<span class="btn btn-purple btn-lg">检测</span>', '#', [
                                    'data-pjax' => '0',
                                    'data-target' => '#demo-lg-modal',
                                    'data-toggle' => 'modal',
                                    'class'=>'view-check-btn'
                                ]) ?>
                                <?= Html::a('<span class="btn btn-purple btn-lg">提交</span>',"#" , [
                                    'data-pjax' => '0',
                                    'data-target' => '#demo-lg-modal-submit',
                                    'data-toggle' => 'modal',
                                    'class'=>'view-submit-btn'
                                ]) ?>
                             </div>
                        </div>
                    </div>
                </form>
                <div id="demo-lg-modal" class="modal fade" tabindex="-1"  >
                    <div class="modal-dialog modal-lg" style="width:500px;">
                        <div class="modal-content"  style="height:300px;">
                            <div class="modal-header">
                                <button class="close" data-dismiss="modal"><span>&times;</span></button>
                                <h4 class="modal-title" id="myLargeModalLabel">自测结果</h4>
                            </div>
                            <div class="modal-body">
                                <div class="table-responsive" id="options-table"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="demo-lg-modal-submit" class="modal fade" tabindex="-1"  >
                    <div class="modal-dialog modal-lg" style="width:500px;">
                        <div class="modal-content"  style="height:300px;">
                            <div class="modal-header">
                                <button class="close" data-dismiss="modal"><span>&times;</span></button>
                                <h4 class="modal-title" id="myLargeModalLabel">提交自测</h4>
                            </div>
                            <div class="modal-body">
                                <div class="table-responsive" id="options-table-submit"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--===================================================-->
                <!--End Input Size-->
            </div>
        </div>
    </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            $(".view-check-btn").click(function(){
                var v_health_id = $("#health_id").text();
                var v_height = $("#height").val();
                var v_weight = $("#weight").val();
                var v_waist = $("#waist").val();
                var v_hip = $("#hip").val();
                var v_diet = $("#diet").val();
                var v_motion = $("#motion").val();
                $.ajax({
                    type: "GET",
                    url: "/check-record/check",
                    data: {health_id:v_health_id,
                        height: v_height,
                        weight:v_weight,
                        waist:v_waist,
                        hip:v_hip,
                        diet:v_diet,
                        motion:v_motion
                    },
                    dataType: 'html',
                    success: function (result) {
                        $('#options-table').html(result);
                    }
                });
            });
            $(".view-submit-btn").click(function(){
                var v_health_id = $("#health_id").text();
                var v_height = $("#height").val();
                var v_weight = $("#weight").val();
                var v_waist = $("#waist").val();
                var v_hip = $("#hip").val();
                var v_diet = $("#diet").val();
                var v_motion = $("#motion").val();
                $.ajax({
                    type: "GET",
                    url: "/check-record/create",
                    data: {health_id:v_health_id,
                        height: v_height,
                        weight:v_weight,
                        waist:v_waist,
                        hip:v_hip,
                        diet:v_diet,
                        motion:v_motion
                    },
                    dataType: 'html',
                    success: function (result) {
                        $('#options-table-submit').html(result);
                    }
                });
            });
        });
    </script>
</div>