<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>糖代谢管理系统</title>


    <!--STYLESHEET-->
    <!--=================================================-->

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

    <div class="boxed">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">自检报告(异常项)</h3>
                    </div>

                    <!--Data Table-->
                    <!--===================================================-->
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th class="text-center">指标</th>
                                    <th>测量值</th>
                                    <th>标准值</th>
                                    <th>医生解释</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($data as $item):?>
                                    <tr>
                                        <td><?php echo $item["label"] ?></td>
                                        <td><?php echo $item["value"] ?></td>
                                        <td><?php echo $item["standard"] ?></td>
                                        <td style="color: red"><?php echo $item["desc"] ?></td>
                                    </tr>
                                <?php endforeach;?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!--===================================================-->
                    <!--End Data Table-->

                </div>

    </div>
    <div class="boxed">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">医嘱</h3>
            </div>

            <!--Data Table-->
            <!--===================================================-->
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th class="text-center">建议项</th>
                            <th>检测频率</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>胰岛素静脉或皮下注射</td>
                            <td>4~7次每天,或按照需要</td>
                        </tr>
                        <tr>
                            <td>口服药或生活方式干预</td>
                            <td>基础胰岛素1次/d<br>
                                预混胰岛素1~2次/d<br>
                                基础胰岛素+餐食胰岛素3~4次/d
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!--===================================================-->
            <!--End Data Table-->

        </div>

    </div>
</div>
<!--===================================================-->
<!-- END OF CONTAINER -->

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


</body>
</html>

