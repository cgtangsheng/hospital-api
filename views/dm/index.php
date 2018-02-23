<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>糖代谢管理系统</title>

    <!--Bootstrap Stylesheet [ REQUIRED ]-->
    <link href="/css/bootstrap.min.css" rel="stylesheet">


    <!--Nifty Stylesheet [ REQUIRED ]-->
    <link href="/css/nifty.min.css" rel="stylesheet">


    <!--Font Awesome [ OPTIONAL ]-->
    <link href="/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">


    <!--Switchery [ OPTIONAL ]-->
    <link href="/plugins/switchery/switchery.min.css" rel="stylesheet">


    <!--Bootstrap Select [ OPTIONAL ]-->
    <link href="/plugins/bootstrap-select/bootstrap-select.min.css" rel="stylesheet">


    <!--Demo [ DEMONSTRATION ]-->
    <link href="/css/demo/nifty-demo.min.css" rel="stylesheet">
    <!--SCRIPT-->
    <!--=================================================-->

    <!--Page Load Progress Bar [ OPTIONAL ]-->
    <link href="/plugins/pace/pace.min.css" rel="stylesheet">
    <script src="/plugins/pace/pace.min.js"></script>
    <script src="/js/swiper-3.3.1.jquery.min.js"></script>
    <script src="/js/Addpolicy.js"></script>
    <link href="/css/Addpolicy.css" rel="stylesheet">
    <link href="/css/swiper-3.3.1.min.css" rel="stylesheet">
    <style type="text/css">
        small{
            color: red;
        }
        .blood-sugar-value{
            display: none;
        }
        .history-of-diabetes-mellitus{
            display: none;
        }
        .base-user-info{
            display: none;
        }
        .base-health-info{
            display: none;
        }
        .diet-and-sports{
            display: none;
        }
        .other-info{
            display: none;
        }
        .btn-next{
            text-align:right;
        }
        .ketoacidosis-info{
            display: none;
        }
        .hypoglycemia-info{
            display: none;
        }
        .smoke_num{
            display: none;
        }
        .drink_num{
            display: none;
        }
        .line-item{
            float: left;
            margin-left: 10px;
        }
        .radio{
            float: left;
            margin-left: 10px;
        }
        h3{
            padding: 0 0px 0 0;
        }
        .panel-title{
            float: left;
            padding: 0px;
        }
        #demo-text-input{
            margin-left: -1em;
            margin-right: -1.2em;
        }
        .dm-check{
            text-align: center;
            padding-top: 10px;
        }

    </style>



    <!--

    REQUIRED
    You must include this in your project.

    RECOMMENDED
    This category must be included but you may modify which plugins or components which should be included in your project.

    OPTIONAL
    Optional plugins. You may choose whether to include it in your project or not.

    DEMONSTRATION
    This is to be removed, used for demonstration purposes only. This category must not be included in your project.

    SAMPLE
    Some script samples which explain how to initialize plugins or components. This category should not be included in your project.


    Detailed information and more samples can be found in the document.

    -->


</head>

<!--TIPS-->
<!--You may remove all ID or Class names which contain "demo-", they are only used for demonstration. -->

<body>
<div id="container" class="effect mainnav-lg">

    <!--NAVBAR-->
    <!--===================================================-->
    <!--===================================================-->
    <!--END NAVBAR-->

    <div class="boxed">

        <!--CONTENT CONTAINER-->
        <!--===================================================-->
        <div id="content-container-new">
            <div id="page-content">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="panel">
                            <div class="panel-heading">
                                <h3 class="dm-check" style="text-align: center;">糖代谢自检</h3>
                            </div>
                            <form class="panel-body form-horizontal form-padding" method="get" action="/dm/create">
                                <div class="form-group">
                                    <label class="col-md-3 control-label">是否确诊为糖尿病</label>
                                    <div class="col-md-9 radio-item">
                                        <div class="col-md-6 pad-no">
                                            <div class="radio">
                                                <label class="form-radio form-normal active"><input type="radio" name="is_diabetes" value="1">是</label>
                                            </div>
                                            <div class="radio">
                                                <label class="form-radio form-normal"><input type="radio" checked="" name="is_diabetes" value="0">否</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="blood-sugar-value weakness">
                                    <div class="form-group">
                                        <label class="col-md-3" for="demo-text-input">空腹血糖</label>
                                        <div class="col-md-9">
                                            <input type="text" id="demo-text-input" class="form-control" placeholder="比如：20" name="fasting_blood_glucose">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="demo-text-input">餐后血糖</label>
                                        <div class="col-md-9">
                                            <input type="text" id="demo-text-input" class="form-control" placeholder="比如：30" name="postprandial_blood_glucose">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="demo-text-input">任意时间血糖</label>
                                        <div class="col-md-9">
                                            <input type="text" id="demo-text-input" class="form-control" placeholder="比如：40" name="anytime_blood_glucose">
                                        </div>
                                    </div>
                                    <div class=" btn-next">
                                        <button class="btn btn-success btn-next-1">下一步</button>
                                    </div>
                                    <hr>
                                </div>
                                <div class="history-of-diabetes-mellitus weakness">
                                    <div class="panel-heading">
                                        <h3 class="dm-check"">糖尿病病史录入</h3>
                                    </div>
                                    <!--Text Input-->
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="demo-text-input">糖尿病分型</label>

                                        <select class="selectpicker" name="diabetes_type">
                                            <option value="1">1型糖尿病</option>
                                            <option value="2">2型糖尿病</option>
                                            <option value="3">妊辰糖尿病</option>
                                            <option value="4">特殊类型</option>
                                        </select>
                                    </div>
                                    <!--Text Input-->
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="demo-text-input">酮症酸中毒病发症</label>
                                        <div class="col-md-9">
                                            <div class="col-md-6 pad-no">
                                                <div class="radio">
                                                    <label class="form-radio form-normal active"><input type="radio" name="is_ketoacidosis" value="1">是</label>
                                                </div>
                                                <div class="radio">
                                                    <label class="form-radio form-normal"><input type="radio" checked="" name="is_ketoacidosis" value="0">否</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ketoacidosis-info">
                                        <!--Text Input-->
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="demo-text-input">发生频率(次/月)</label>
                                            <div class="col-md-9">
                                                <input type="text" id="demo-text-input" class="form-control" placeholder="比如：1" name="ketoacidosis_frequency">
                                            </div>
                                        </div>
                                        <!--Text Input-->
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="demo-text-input">发生原因</label>
                                            <div class="col-md-9">
                                                <input type="text" id="demo-text-input" class="form-control" placeholder="比如：血糖消化不足" name="ketoacidosis_reason">
                                            </div>
                                        </div>
                                    </div>
                                    <!--Text Input-->
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="demo-text-input">低血糖</label>
                                        <div class="col-md-9">
                                            <div class="col-md-6 pad-no">
                                                <div class="radio">
                                                    <label class="form-radio form-normal active"><input type="radio" name="is_hypoglycemia" value="1">是</label>
                                                </div>
                                                <div class="radio">
                                                    <label class="form-radio form-normal"><input type="radio" checked="" name="is_hypoglycemia" value="0">否</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--Text Input-->
                                    <div class="hypoglycemia-info">
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="demo-text-input">发生频率(次/月)</label>
                                            <div class="col-md-9">
                                                <input type="text" id="demo-text-input" class="form-control" placeholder="比如：1" name="hypoglycemia_frequency">
                                            </div>
                                        </div>
                                        <!--Text Input-->
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="demo-text-input">发生原因</label>
                                            <div class="col-md-9">
                                                <input type="text" id="demo-text-input" class="form-control" placeholder="比如：血糖消化不足" name="hypoglycemia_reason">
                                            </div>
                                        </div>
                                        <!--Text Input-->
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="demo-text-input">严重程度</label>
                                            <select class="selectpicker" name="hypoglycemia_Severity">
                                                <option value="1">没事</option>
                                                <option value="2">一般,不严重</option>
                                                <option value="3">严重</option>
                                                <option value="4">非常严重</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="demo-text-input">脑血管病变</label>
                                        <div class="col-md-9">
                                            <div class="col-md-6 pad-no">
                                                <div class="radio">
                                                    <label class="form-radio form-normal active"><input type="radio" name="is_cerebrovascular" value="1">是</label>
                                                </div>
                                                <div class="radio">
                                                    <label class="form-radio form-normal"><input type="radio"  checked="" name="is_cerebrovascular" value="0">否</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="demo-text-input">心血管病变</label>
                                        <div class="col-md-9">
                                            <div class="col-md-6 pad-no">
                                                <div class="radio">
                                                    <label class="form-radio form-normal active"><input type="radio" name="is_cardiovascular" value="1">是</label>
                                                </div>
                                                <div class="radio">
                                                    <label class="form-radio form-normal"><input type="radio" name="is_cardiovascular"  checked=""  value="0">否</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="demo-text-input">外周血管病变</label>
                                        <div class="col-md-9">
                                            <div class="col-md-6 pad-no">
                                                <div class="radio">
                                                    <label class="form-radio form-normal active"><input type="radio" name="is_peripheral_vascular" value="1">是</label>
                                                </div>
                                                <div class="radio">
                                                    <label class="form-radio form-normal"><input type="radio" name="is_peripheral_vascular" checked="" value="0">否</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="demo-text-input">肾病病变</label>
                                        <div class="col-md-9">
                                            <div class="col-md-6 pad-no">
                                                <div class="radio">
                                                    <label class="form-radio form-normal active"><input type="radio" name="is_nephrosis" value="1">是</label>
                                                </div>
                                                <div class="radio">
                                                    <label class="form-radio form-normal"><input type="radio" name="is_nephrosis" checked="" value="0">否</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="demo-text-input">眼底病变</label>
                                        <div class="col-md-9">
                                            <div class="col-md-6 pad-no">
                                                <div class="radio">
                                                    <label class="form-radio form-normal active"><input type="radio" name="is_fundus_lesions" value="1">是</label>
                                                </div>
                                                <div class="radio">
                                                    <label class="form-radio form-normal"><input type="radio" checked="" name="is_fundus_lesions" value="0">否</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="demo-text-input">周围神经病变</label>
                                        <div class="col-md-9">
                                            <div class="col-md-6 pad-no">
                                                <div class="radio">
                                                    <label class="form-radio form-normal active"><input type="radio" name="is_peripheral_neuropathy" value="1">是</label>
                                                </div>
                                                <div class="radio">
                                                    <label class="form-radio form-normal"><input type="radio" checked="" name="is_peripheral_neuropathy" value="0">否</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="demo-text-input">糖尿病足</label>
                                        <div class="col-md-9">
                                            <div class="col-md-6 pad-no">
                                                <div class="radio">
                                                    <label class="form-radio form-normal active"><input type="radio" name="is_diabetic_foot" value="1">是</label>
                                                </div>
                                                <div class="radio">
                                                    <label class="form-radio form-normal"><input type="radio" checked="" name="is_diabetic_foot" value="0">否</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--Text Input-->
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="demo-text-input">伴发疾病</label>
                                        <div class="col-md-9">
                                            <input type="text" id="demo-text-input" class="form-control" placeholder="比如：手脚麻木,腰酸背疼" name="associated_diseases">
                                            <small>多种疾病用逗号分割</small>
                                        </div>
                                    </div>
                                    <div class=" btn-next">
                                        <button class="btn btn-success btn-next-2">下一步</button>
                                    </div>
                                    <hr>
                                </div>
                                <div class="base-user-info weakness">
                                    <div class="panel-heading">
                                        <h3 class="dm-check">录入基本信息</h3>
                                    </div>
                                    <!--Text Input-->
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="demo-text-input">姓名</label>
                                        <div class="col-md-9">
                                            <input type="text" id="demo-text-input" class="form-control" placeholder="比如：汤升" name="name" value="<?php echo $user->name;?>">
                                        </div>
                                    </div>
                                    <!--Text Input-->
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="demo-text-input">性别</label>

                                        <select class="selectpicker" name="sex">
                                            <option value="0" checked="<?php echo $user->sex == 1?"checked":"";?>">男</option>
                                            <option value="1" checked="<?php echo $user->sex == 1?"checked":"";?>">女</option>
                                        </select>
                                    </div>
                                    <!--Text Input-->
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="demo-text-input">年龄</label>
                                        <div class="col-md-9">
                                            <input type="text" id="demo-text-input" class="form-control" placeholder="比如：30" name="age" value="<?php echo $user->age?>">
                                        </div>
                                    </div>
                                    <!--Text Input-->
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="demo-text-input">职业</label>
                                        <div class="col-md-9">
                                            <input type="text" id="demo-text-input" class="form-control" placeholder="比如：工程师" name="work">
                                        </div>
                                    </div>
                                    <!--Text Input-->
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="demo-text-input" >身份证号</label>
                                        <div class="col-md-9">
                                            <input type="text" id="demo-text-input" class="form-control" placeholder="比如：612322198711140613" name="identify" value="<?php echo $user->identify;?>">
                                        </div>
                                    </div>
                                    <!--Text Input-->
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="demo-text-input">电话</label>
                                        <div class="col-md-9">
                                            <input type="text" id="demo-text-input" class="form-control" placeholder="比如：15901011108" name="tel" value="<?php echo $user->tel;?>">
                                        </div>
                                    </div>
                                    <div class=" btn-next">
                                        <button class="btn btn-success btn-next-3">下一步</button>
                                    </div>
                                    <hr>
                                </div>
                                <div class="base-health-info weakness">
                                    <div class="panel-heading">
                                        <h3 class="dm-check">一般健康信息</h3>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="demo-text-input">身高(cm)</label>
                                        <div class="col-md-9">
                                            <input type="text" id="demo-text-input" class="form-control" placeholder="比如：172" name="height" value="<?php echo $user->height;?>">
                                        </div>
                                    </div>
                                    <!--Text Input-->
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="demo-text-input">体重(kg)</label>
                                        <div class="col-md-9">
                                            <input type="text" id="demo-text-input" class="form-control" placeholder="比如：60" name="weight" value="<?php echo $user->weight;?>">
                                        </div>
                                    </div>
                                    <!--Text Input-->
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="demo-text-input">腰围(cm)</label>
                                        <div class="col-md-5">
                                            <input type="text" id="demo-text-input" class="form-control" placeholder="比如：120" name="waistline">
                                        </div>
                                    </div>
                                    <!--Text Input-->
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="demo-text-input">臀围(cm)</label>
                                        <div class="col-md-9">
                                            <input type="text" id="demo-text-input" class="form-control" placeholder="比如：120" name="hip">
                                        </div>
                                    </div>
                                    <div class=" btn-next">
                                        <button class="btn btn-success btn-next-4">下一步</button>
                                    </div>
                                    <hr>
                                </div>
                                <div class="diet-and-sports weakness">
                                    <div class="panel-heading">
                                        <h3 class="dm-check">饮食与运动</h3>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="demo-text-input">体力劳动</label>
                                        <select class="selectpicker" name="work_density">
                                            <option value="0">无</option>
                                            <option value="1">休息</option>
                                            <option value="2">轻体力劳动</option>
                                            <option value="3">中体力劳动</option>
                                            <option value="4">重体力劳动</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="demo-text-input">主食(两)</label>
                                        <div class="col-md-9">
                                            <input type="text" id="demo-text-input" class="form-control" placeholder="比如：4" name="diet">
                                        </div>
                                    </div>
                                    <!--Text Input-->
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="demo-text-input">蔬菜(两)</label>
                                        <div class="col-md-9">
                                            <input type="text" id="demo-text-input" class="form-control" placeholder="比如：5" name="vegetables">
                                        </div>
                                    </div>
                                    <!--Text Input-->
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="demo-text-input">牛奶(ml)</label>
                                        <div class="col-md-9">
                                            <input type="text" id="demo-text-input" class="form-control" placeholder="比如：200" name="milk">
                                        </div>
                                    </div>
                                    <!--Text Input-->
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="demo-text-input">鸡蛋(个)</label>
                                        <div class="col-md-9">
                                            <input type="text" id="demo-text-input" class="form-control" placeholder="比如：1" name="egg">
                                        </div>
                                    </div>
                                    <!--Text Input-->
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="demo-text-input">瘦肉(两)</label>
                                        <div class="col-md-9">
                                            <input type="text" id="demo-text-input" class="form-control" placeholder="比如：2" name="meet">
                                        </div>
                                    </div>
                                    <!--Text Input-->
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="demo-text-input">豆制品(两)</label>
                                        <div class="col-md-9">
                                            <input type="text" id="demo-text-input" class="form-control" placeholder="比如：2.5" name="bean">
                                        </div>
                                    </div>
                                    <!--Text Input-->
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="demo-text-input">烹调油(汤匙)</label>
                                        <div class="col-md-9">
                                            <input type="text" id="demo-text-input" class="form-control" placeholder="比如：3" name="oil">
                                        </div>
                                    </div>
                                    <!--Text Input-->
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="demo-text-input">盐(g)</label>
                                        <div class="col-md-9">
                                            <input type="text" id="demo-text-input" class="form-control" placeholder="比如：10" name="salt">
                                        </div>
                                    </div>
                                    <!--Text Input-->
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="demo-text-input">运动方式</label>

                                        <select class="selectpicker" name="sports_type">
                                            <option value="0">无</option>
                                            <option value="1">有氧运动</option>
                                            <option value="2">无氧运动</option>
                                        </select>
                                        <br><small class="col-md-9 control-label " >有氧运动（步行、快走、慢跑、竞走、滑冰、长距离游泳、骑自行车、打太极拳、跳健身舞、跳绳/做韵律操、球类运动如篮球、足球等等）无氧运动（短跑、举重、投掷、跳高、跳远、拔河、俯卧撑、潜水、肌力训练（长时间的肌肉收缩））</small>
                                    </div>
                                    <!--Text Input-->
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="demo-text-input">运动强度(心率次/分)</label>
                                        <div class="col-md-9">
                                            <input type="text" id="demo-text-input" class="form-control" placeholder="120" name="sports_intensity">
                                        </div>
                                    </div>
                                    <!--Text Input-->
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="demo-text-input">运动时间(min)</label>
                                        <div class="col-md-9">
                                            <input type="text" id="demo-text-input" class="form-control" placeholder="60" name="sports_time">
                                        </div>
                                    </div>
                                    <!--Text Input-->
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="demo-text-input">运动频率(次/周)</label>
                                        <div class="col-md-9">
                                            <input type="text" id="demo-text-input" class="form-control" placeholder="3" name="sports_frequency">
                                        </div>
                                    </div>
                                    <!--Text Input-->
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="demo-text-input">是否吸烟</label>
                                        <div class="col-md-9">
                                            <div class="col-md-6 pad-no">
                                                <div class="radio">
                                                    <label class="form-radio form-normal active"><input type="radio" name="is_smoke" value="1">是</label>
                                                </div>
                                                <div class="radio">
                                                    <label class="form-radio form-normal"><input type="radio" name="is_smoke" checked="" value="0">否</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group smoke_num">
                                        <label class="col-md-3 control-label" for="demo-text-input">吸烟量(支/日)</label>
                                        <div class="col-md-9">
                                            <input type="text" id="demo-text-input" class="form-control" placeholder="3" name="smoke_num">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="demo-text-input">是否饮酒</label>
                                        <div class="col-md-9">
                                            <div class="col-md-6 pad-no">
                                                <div class="radio">
                                                    <label class="form-radio form-normal active"><input type="radio" name="is_drink" value="1">是</label>
                                                </div>
                                                <div class="radio">
                                                    <label class="form-radio form-normal"><input type="radio" name="is_drink" checked="" value="0">否</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group drink_num">
                                        <label class="col-md-3 control-label" for="demo-text-input">饮酒量(两/日)</label>
                                        <div class="col-md-9">
                                            <input type="text" id="demo-text-input" class="form-control" placeholder="3" name="drink_num">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="demo-text-input">血压高压(mmHg)</label>
                                        <div class="col-md-9">
                                            <input type="text" id="demo-text-input" class="form-control" placeholder="3" name="high_blood_pressure">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="demo-text-input">血压低压(mmHg)</label>
                                        <div class="col-md-9">
                                            <input type="text" id="demo-text-input" class="form-control" placeholder="3" name="low_blood_pressure">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="demo-text-input">测量地点</label>
                                        <div class="col-md-9">
                                            <div class="col-md-6 pad-no">
                                                <div class="radio">
                                                    <label class="form-radio form-normal active"><input type="radio" name="blood_pressure_addr" value="1">家</label>
                                                </div>
                                                <div class="radio">
                                                    <label class="form-radio form-normal"><input type="radio" name="blood_pressure_addr" checked="" value="2">医院</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class=" btn-next">
                                        <button class="btn btn-success btn-next-5">下一步</button>
                                    </div>
                                    <hr>
                                </div>
                                <div class="other-info weakness">
                                    <div class="panel-heading">
                                        <h3 class="dm-check">其他检查录入</h3>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="demo-text-input">FPG</label>
                                        <div class="col-md-9">
                                            <input type="text" id="demo-text-input" class="form-control" placeholder="" name="fpg">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="demo-text-input">餐后2小时血糖</label>
                                        <div class="col-md-9">
                                            <input type="text" id="demo-text-input" class="form-control" placeholder="" name="blood_sugar_2">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="demo-text-input">HbAlc</label>
                                        <div class="col-md-9">
                                            <input type="text" id="demo-text-input" class="form-control" placeholder="" name="hbalc">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="demo-text-input">TG</label>
                                        <div class="col-md-9">
                                            <input type="text" id="demo-text-input" class="form-control" placeholder="" name="tg">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="demo-text-input">LDL-C</label>
                                        <div class="col-md-9">
                                            <input type="text" id="demo-text-input" class="form-control" placeholder="" name="ldl_c">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="demo-text-input">HDL-C</label>
                                        <div class="col-md-9">
                                            <input type="text" id="demo-text-input" class="form-control" placeholder="" name="hdl_c">
                                        </div>
                                    </div>
                                    <div class=" btn-next">
                                       <button class="btn btn-success" onclick="/dm/create">生成检测报告</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>



        <!-- FOOTER -->
        <!--===================================================-->
        <footer id="footer">

            <!-- Visible when footer positions are fixed -->
            <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
            <div class="show-fixed pull-right">
                <ul class="footer-list list-inline">
                    <li>
                        <p class="text-sm">SEO Proggres</p>
                        <div class="progress progress-sm progress-light-base">
                            <div style="width: 80%" class="progress-bar progress-bar-danger"></div>
                        </div>
                    </li>

                    <li>
                        <p class="text-sm">Online Tutorial</p>
                        <div class="progress progress-sm progress-light-base">
                            <div style="width: 80%" class="progress-bar progress-bar-primary"></div>
                        </div>
                    </li>
                    <li>
                        <button class="btn btn-sm btn-dark btn-active-success">Checkout</button>
                    </li>
                </ul>
            </div>
            <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
            <!-- Remove the class name "show-fixed" and "hide-fixed" to make the content always appears. -->
            <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->


        </footer>
        <!--===================================================-->
        <!-- END FOOTER -->


        <!-- SCROLL TOP BUTTON -->
        <!--===================================================-->
        <button id="scroll-top" class="btn"><i class="fa fa-chevron-up"></i></button>
        <!--===================================================-->



    </div>
    <!--===================================================-->
    <!-- END OF CONTAINER -->



    <!--JAVASCRIPT-->
    <!--=================================================-->

    <!--jQuery [ REQUIRED ]-->
    <script src="/js/jquery-2.1.1.min.js"></script>


    <!--BootstrapJS [ RECOMMENDED ]-->
    <script src="/js/bootstrap.min.js"></script>


    <!--Fast Click [ OPTIONAL ]-->
    <script src="/plugins/fast-click/fastclick.min.js"></script>


    <!--Nifty Admin [ RECOMMENDED ]-->
    <script src="/js/nifty.min.js"></script>


    <!--Switchery [ OPTIONAL ]-->
    <script src="/plugins/switchery/switchery.min.js"></script>


    <!--Bootstrap Select [ OPTIONAL ]-->
    <script src="/plugins/bootstrap-select/bootstrap-select.min.js"></script>


    <!--Demo script [ DEMONSTRATION ]-->
    <script src="/js/demo/nifty-demo.min.js"></script>
</body>

<script type="text/javascript">
    $(function(){
        $("input:radio[name='is_diabetes']").change(function (){ //拨通
            var is_diabetes=$("input:radio[name='is_diabetes']:checked").val() ;
            if(is_diabetes == 0){
                $(".weakness").hide();
            }else{
                $(".blood-sugar-value").show()
            }
        });
        $("input:radio[name='is_hypoglycemia']").change(function (){ //拨通
            var is_hypoglycemia=$("input:radio[name='is_hypoglycemia']:checked").val() ;
            if(is_hypoglycemia == 0){
                $(".hypoglycemia-info").hide();
            }else{
                $(".hypoglycemia-info").show()
            }
        });
        $("input:radio[name='is_ketoacidosis']").change(function (){ //拨通
            var is_ketoacidosis=$("input:radio[name='is_ketoacidosis']:checked").val() ;
            if(is_ketoacidosis == 0){
                $(".ketoacidosis-info").hide();
            }else{
                $(".ketoacidosis-info").show()
            }
        });
        $("input:radio[name='is_smoke']").change(function (){ //拨通
            var is_smoke=$("input:radio[name='is_smoke']:checked").val() ;
            if(is_smoke == 0){
                $(".smoke_num").hide();
            }else{
                $(".smoke_num").show()
            }
        });
        $("input:radio[name='is_drink']").change(function (){ //拨通
            var is_drink=$("input:radio[name='is_drink']:checked").val() ;
            if(is_drink == 0){
                $(".drink_num").hide();
            }else{
                $(".drink_num").show()
            }
        });

        $(".btn-next-1").click(function () {
            $(".history-of-diabetes-mellitus").show();
            return false;
        })
        $(".btn-next-2").click(function () {
            $(".base-user-info").show();
            return false;
        })
        $(".btn-next-3").click(function () {
            $(".base-health-info").show();
            return false;
        })
        $(".btn-next-4").click(function () {
            $(".diet-and-sports").show();
            return false;
        })
        $(".btn-next-5").click(function () {
            $(".other-info").show();
            return false;
        })
    });
</script>

</html>
