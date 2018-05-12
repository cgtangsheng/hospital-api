<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use yii\widgets\ActiveForm;
use app\assets\FrameAsset;

/* @var $this \yii\web\View */
/* @var $content string */

\app\assets\FrameAsset::register($this);
$user = \Yii::$app->user->identity;
?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <style type="text/css">
        #container #content-container.frame-container {
            padding: 0 15px 0 15px;
        }
        #container .table.detail-view th {border-bottom: none;}
        .bootstrap-table.grid-view .table thead > tr > th {padding: 8px;}
    </style>


    <!--STYLESHEET-->
    <!--=================================================-->

    <!--Open Sans Font [ OPTIONAL ] -->
    <!-- <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700&amp;subset=latin" rel="stylesheet"> -->

    <!-- Theme -->
    <link rel="stylesheet" type="text/css" href="/css/themes/type-c/theme-blue.min.css">
    <link href="/js/plugins/datetimepicker/jquery.datetimepicker.css" rel="stylesheet">
    <link href="/js/plugins/bootstrap-select/bootstrap-select.min.css" rel="stylesheet">
    <link href="/js/plugins/bootstrap-table/bootstrap-table.min.css" rel="stylesheet">
    <link href="/css/wms.css" rel="stylesheet">
<!--  <script src="/js/jquery-2.1.1.min.js"></script>-->
<!--    <script src="/js/bootstrap.min.js"></script>-->
<!--        <script src="/js/nifty.min.js"></script>-->
    <script src="/js/plugins/bootstrap-select/bootstrap-select.min.js"></script>
    <script src="/js/plugins/datetimepicker/jquery.datetimepicker.js"></script>
    <script src="/js/plugins/bootstrap-table/bootstrap-table.min.js"></script>
    <script src="/js/plugins/pace/pace.min.js"></script>
</head>

<!--TIPS-->
<!--You may remove all ID or Class names which contain "demo-", they are only used for demonstration. -->

<body>


<?php $this->beginBody() ?>

<div id="container" class="effect">
    <div class="boxed">

        <!--CONTENT CONTAINER-->
        <!--===================================================-->
        <div id="content-container" class="frame-container">

            <?php echo $content; ?>

            <button id="scroll-top" class="btn"><i class="fa fa-chevron-up"></i></button>

        </div>
    </div>
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
<!--<script src="/js/widget/bootstrap-multiselect.js"></script>-->
<!--<script src="/js/widget/jqgrid/i18n/grid.locale---><?php //echo Yii::$app->language; ?><!--.js" type="text/javascript"></script>-->
<!--<script src="/js/widget/jqgrid/jquery.jqGrid.js"></script>-->
<!--<script src="/js/as/yii.activeForm.js"></script>-->
<!--<script src="/js/as/yii.js"></script>-->
<!--<script src="/js/as/yii.captcha.js"></script>-->
<!--<script src="/js/as/yii.gridView.js"></script>-->
<!--<script src="/js/as/yii.validation.js"></script>-->
