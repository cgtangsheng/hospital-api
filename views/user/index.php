<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\assets\AppAsset;
use app\assets\CleverTabAsset;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
\app\assets\NiftyAsset::register($this);
CleverTabAsset::register($this);
$this->title = '基本信息';
$this->params['breadcrumbs'][] = $this->title;
?>

<head>
    <style type="text/css">
        .inline-div{
            display: inline-block;
            width: 200px;
        }
        #update-info{
            color:blue;
            vertical-align: top;
            padding-top: 10px;
            padding-left: 20px;
        }
        .panel-body th{
            width:120px;
            text-align: center;
        }
        td{
            text-align: center;
        }
    </style>
</head>


<div class="user-index">
    <div id="page-content">
        <div class="panel">
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="panel">
                            <div id="health_id" style="display:none"><?php echo Yii::$app->user->identity->getId();?></div>>
                            <div class="panel-body">
                                <div class="inline-div">
                                    <img src="/img/av1.png" class="panel-media-img img-circle img-border-light" style="top:30px;" alt="Profile Picture">
                                </div>
                                <div class="inline-div" >
                                    <table id="foo-row-toggler" class="table toggle-circle">
                                        <tbody>
                                            <tr>
                                                <td>用户名：</td>
                                                <td><?php echo $data["user"]["username"];?></td>
                                           </tr>
                                            <tr>
                                                <td>健康档案号：</td>
                                                <td><?php echo $data["user"]["id"];?></td>
                                            </tr>
                                            <tr>
                                                <td>性别：</td>
                                                <td><?php echo $data["user"]["sex"]==1?"女":"男";;?></td>
                                            </tr>
                                            <tr>
                                                <td>年龄：</td>
                                                <td><?php echo $data["user"]["age"];?></td>
                                            </tr>
                                            <tr>
                                                <td>身高：</td>
                                                <td><?php echo $data["user"]["height"]."cm";?></td>
                                            </tr>
                                            <tr>
                                                <td>体重：</td>
                                                <td><?php echo $data["user"]["age"]."kg";?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="inline-div" id = update-info>
                                    <a style="color:blue;" href="/user-info/update?id=<?php echo Yii::$app->user->identity->getId();?>">[修改信息]</a>
                                </div>
                            </div>
                            <div class="panel">
                                <div class="panel-heading">
                                    <h3 class="panel-title">就诊记录</h3>
                                </div>
                                <div class="panel-body">
                                    <table id="editable" data-toggle="table"
                                           data-url="/user/index"
                                           data-search="true"
                                           data-show-refresh="true"
                                           data-show-toggle="true"
                                           data-show-columns="true"
                                           data-sort-name="id"
                                           data-page-list="[5, 10, 20]"
                                           data-page-size="1"
                                           data-pagination="true" data-show-pagination-switch="true">
                                        <thead>
                                        <tr>
                                            <th data-field="health_id" data-sortable="true">健康管理号</th>
                                            <th data-field="examined_hospital" data-sortable="true">检查医院</th>
                                            <th data-field="diagnosis" data-sortable="true">诊断</th>
                                            <th data-field="diagnosis_hospital" data-align="center" data-sortable="true" >确诊医院</th>
                                            <th data-field="medication" data-align="center" data-sortable="true" >用药情况</th>
                                            <th data-field="department" data-align="center" data-sortable="true" >就诊科室</th>
                                            <th data-field="creat_time" data-align="center" data-sortable="true" >就诊时间</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                           <?php foreach($data["record"] as $value):?>
                                               <tr>
                                                   <td><?php echo $value["health_id"];?></td>
                                                   <td><?php echo $value["examined_hospital"];?></td>
                                                   <td><?php echo $value["diagnosis"];?></td>
                                                   <td><?php echo $value["diagnosis_hospital"];?></td>
                                                   <td><?php echo $value["medication"];?></td>
                                                   <td><?php echo $value["department"];?></td>
                                                   <td><?php echo $value["creat_time"];?></td>
                                               </tr>
                                            <?php endforeach;?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
    <!--jQuery [ REQUIRED ]-->
    <!--jQuery [ REQUIRED ]-->

    <!--Switchery [ OPTIONAL ]-->
    <script type="text/javascript">
        $(document).ready(function() {
            var id = "1000000003";
            $.ajax({
                type: "GET",
                url: "/record/list",
                data: {id: id},
                dataType: 'json',
                success: function (result) {
                    $('#editable').bootstrapTable({
                        idField: 'health_id',
                        url: '[{"health_id":"1000000003"},{"health_id":"1000000002"}]',
                        columns: [{
                            field: 'health_id',
                            title: 'health_id'
                        }]
                    });
                }
            });
        });
    </script>
</div>

