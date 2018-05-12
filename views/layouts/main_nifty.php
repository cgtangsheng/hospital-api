<?php
/* @var $this \yii\web\View */
/* @var $content string */
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use yii\widgets\ActiveForm;
use app\assets\AppAsset;
use app\assets\NiftyAsset;
AppAsset::register($this);
\app\assets\FrameAsset::register($this);
NiftyAsset::register($this);
$user = \Yii::$app->user->identity;
$cookies = Yii::$app->request->cookies;
$theme = $cookies->getValue('wms3_theme') ? $cookies->getValue('wms3_theme') : "dark";

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang = "<?= Yii::$app->language ?>">
<head>
    <meta charset = "<?= Yii::$app->charset ?>">
    <meta name = "viewport" content = "width = device-width, initial-scale = 1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <!-- Theme -->
    <link rel="stylesheet" type="text/css" href="/css/themes/type-c/theme-<?= $theme ?>.min.css">


    <!--Open Sans Font [ OPTIONAL ] -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700&amp;subset=latin" rel="stylesheet">


    <!--Bootstrap Stylesheet [ REQUIRED ]-->
    <link href="/css/bootstrap.min.css" rel="stylesheet">


    <!--Nifty Stylesheet [ REQUIRED ]-->
    <!--    <link href="/css/nifty.min.css" rel="stylesheet">-->



    <!--Bootstrap Table [ OPTIONAL ]-->
    <link href="/plugins/bootstrap-table/bootstrap-table.min.css" rel="stylesheet">


    <!--X-editable [ OPTIONAL ]-->
    <link href="/plugins/x-editable/css/bootstrap-editable.css" rel="stylesheet">


    <!--Demo [ DEMONSTRATION ]-->
    <link href="/css/demo/nifty-demo.min.css" rel="stylesheet">

    <style type="text/css">
        #content-container {padding-bottom: 0;}
        #tab-content {padding: 0 0 0 41px;}

        .menu-popover .sub-menu {margin-left: 5px;}
        .multi-cols .col-menu {
            width: auto;
            float: left;
        }
        .multi-cols .col-menu ul li>a {
            padding: 3px 0;
        }
        .multi-cols .col-menu ul li>a:hover {
            padding-left: 5px;
        }
        #container.mainnav-sm #mainnav .mainnav-widget>.show-small a {
            padding: 0;
        }
        #container.mainnav-sm #mainnav .mainnav-widget>.show-small a .icon {
            padding: 14px 0 10px 30px;
        }
        #container.mainnav-sm #mainnav .mainnav-widget>.show-small a .text {
            font-size: 14px;
        }
        .mainnav-widget-content {padding: 15px 10px 10px 10px;}
        .col-menu li:first-child {
            margin-bottom: 10px;
        }
        .col-menu li {
            font-size: 14px;
        }
        body .brand-icon {
            text-align: center;
            color: #DDD;
            text-shadow: 0 2px 3px #333;
        }
        body #container {height: 1px;}
        .first-class {
            color: black;
            border: WindowFrame;
            text-align: center;
            padding-top: 15px;
        }
        .second-class{
            color: grey;
            border: WindowFrame;
            text-align: center;
            padding-top :3px;
        }
        .clever-tab-content {padding: 17px 0 0 0;}
        #container.mainnav-sm #navbar .navbar-brand{
            /*width: 120px;*/
            text-align: center;
            font-size:15px;
        }
    </style>

</head>

<body>
<?php $this->beginBody() ?>
<div id="container" class="effect mainnav-sm navbar-fixed">

    <!--NAVBAR-->
    <!--===================================================-->
    <header id="navbar">
        <div id="navbar-container" class="boxed">

            <!--Brand logo & name-->
            <!--================================-->
            <div class="navbar-header">
                <a href="<?php echo Yii::$app->homeUrl ?>" class="navbar-brand">
                    医疗管家
                </a>
            </div>
            <!--================================-->
            <!--End brand logo & name-->


            <!--Navbar Dropdown-->
            <!--================================-->
            <div class="navbar-content clearfix">

                <ul class="nav navbar-top-links pull-right">

                    <!--Language selector-->
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <li class="dropdown">
                        <a class="lang-selector dropdown-toggle" href="#" data-toggle="dropdown">
                                    <span class="lang-selected">
                                        <img class="lang-flag" src="/img/flags/united-kingdom.png" alt="English">
                                        <span class="lang-id">EN</span>
                                        <span class="lang-name">English</span>
                                    </span>
                        </a>

                        <!--Language selector menu-->
                        <ul class="head-list dropdown-menu with-arrow">
                            <li>
                                <!--English-->
                                <a href="#" class="active">
                                    <img class="lang-flag" src="/img/flags/united-kingdom.png" alt="English">
                                    <span class="lang-id">EN</span>
                                    <span class="lang-name">English</span>
                                </a>
                            </li>
                            <li>
                                <!--France-->
                                <a href="#">
                                    <img class="lang-flag" src="/img/flags/france.png" alt="France">
                                    <span class="lang-id">FR</span>
                                    <span class="lang-name">Fran&ccedil;ais</span>
                                </a>
                            </li>
                            <li>
                                <!--Germany-->
                                <a href="#">
                                    <img class="lang-flag" src="/img/flags/germany.png" alt="Germany">
                                    <span class="lang-id">DE</span>
                                    <span class="lang-name">Deutsch</span>
                                </a>
                            </li>
                            <li>
                                <!--Italy-->
                                <a href="#">
                                    <img class="lang-flag" src="/img/flags/italy.png" alt="Italy">
                                    <span class="lang-id">IT</span>
                                    <span class="lang-name">Italiano</span>
                                </a>
                            </li>
                            <li>
                                <!--Spain-->
                                <a href="#">
                                    <img class="lang-flag" src="/img/flags/spain.png" alt="Spain">
                                    <span class="lang-id">ES</span>
                                    <span class="lang-name">Espa&ntilde;ol</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <!--End language selector-->



                    <!--User dropdown-->
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <li id="dropdown-user" class="dropdown">
                        <a href="#" data-toggle="dropdown" class="dropdown-toggle text-right">
                                    <span class="pull-right">
                                        <img class="img-circle img-user media-object" src="/img/av1.png" alt="Profile Picture">
                                    </span>
                            <div class="username hidden-xs"><?php echo \Yii::$app->user->isGuest ? '未登录' : $user->username ?></div>
                        </a>


                        <div class="dropdown-menu dropdown-menu-md dropdown-menu-right with-arrow panel-default">

                            <!-- Dropdown heading  -->
                            <div class="pad-all bord-btm">
                                <p class="text-lg text-muted text-thin mar-btm">750Gb of 1,000Gb Used</p>
                                <div class="progress progress-sm">
                                    <div class="progress-bar" style="width: 70%;">
                                        <span class="sr-only">70%</span>
                                    </div>
                                </div>
                            </div>


                            <!-- User dropdown menu -->
                            <ul class="head-list">
                                <li>
                                    <a href="#">
                                        <i class="fa fa-user fa-fw fa-lg"></i> Profile
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="badge badge-danger pull-right">9</span>
                                        <i class="fa fa-envelope fa-fw fa-lg"></i> Messages
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="label label-success pull-right">New</span>
                                        <i class="fa fa-gear fa-fw fa-lg"></i> Settings
                                    </a>
                                </li>
                            </ul>

                            <!-- Dropdown footer -->
                            <div class="pad-all text-right">
                                <?php
                                $form = ActiveForm::begin([
                                    'id' => 'logout-form',
                                    'action' => yii\helpers\Url::to('/site/logout'),
                                    'method' => 'post',
                                    'options' => [],
                                ])
                                ?>
                                <?= Html::submitButton('<i class="fa fa-sign-out fa-fw"></i> Logout', ['class' => 'btn btn-primary']) ?>
                                <?php ActiveForm::end() ?>
                            </div>
                        </div>
                    </li>
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <!--End user dropdown-->

                </ul>
            </div>
            <!--================================-->
            <!--End Navbar Dropdown-->

        </div>
    </header>

    <!--===================================================-->
    <nav id="mainnav-container" >
        <div id="mainnav">

            <!--================================-->
            <!--End shortcut buttons-->


            <!--Menu-->
            <!--================================-->
            <div id="mainnav-menu-wrap">
                <div class="nano">
                    <div class="nano-content" style="background-color: white">
                        <div class="sub-menu"></div>

                        <?php
                        $instance = new \app\components\FormatMenu();
                        $menus = $instance->getAssignMenuFromCache();
                        $idx = 1;
                        ?>
                        <dl class="col-menu">
                            <?php foreach ($menus as $label => $menuLv1): ?>
                            <dt class="first-class"><?php echo $label?></dt>
                            <?php foreach ($menuLv1['menus'] as $label2 => $menuLv2): ?>
                                <!--Submenu-->
                                <dd class="second-class">
                                    <a href=<?php echo $menuLv2["url"];?>><?php echo $label2?></a>
                                </dd>

                            <?php endforeach ?>
                        </dl>
                    <?php $idx++; ?>
                    <?php endforeach ?>
                    </div>
                </div>
            </div>
            <!--================================-->
            <!--End menu-->

        </div>
    </nav>
    <!--===================================================-->
    <!--END NAVBAR-->

    <div class="boxed">

        <!--CONTENT CONTAINER-->
        <!--===================================================-->
        <div id="content-container">

            <div id="tab-content">
                <div id="tabs" style="padding-bootom:0"><ul></ul></div>
            </div>

            <!--Page content-->
            <!--===================================================-->
            <div id="page-content">

                <?= $content  ?>

            </div>
        </div>

    </div>




    <!-- SCROLL TOP BUTTON -->
    <!--===================================================-->
    <button id="scroll-top" class="btn"><i class="fa fa-chevron-up"></i></button>
    <!--===================================================-->



</div>
<footer class = "footer">
    <div class = "container">
        <p class = "pull-left">© My Company <?= date('Y') ?></p>
        <p class = "pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>
<?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>


<script type="text/javascript">
    function getFrameHeight() {
        return $("#container").height() - $("#tabs ul:first").height() - $('#content-container').css('paddingTop').replace('px', '');
        $('#content-container').css('paddingBottom').replace('px', '') - 50;
    }

    function setFrameHeight(id) {
        $("#" + id).height(getFrameHeight());
    }

    var tabs, tmpCount = 0;

    $(function() {
        function resetMainContentHeight() {
            $("div.content-container:first").height(
                $("body:first").height() - $("div.navbar:first").height()
            );
        }

        tabs = $('#tabs').cleverTabs();
        $(window).bind('resize', function() {
            //当发生window.resize事件时，重新默认的tabs的PanelContainer的大小
            resetMainContentHeight();
            tabs.resizePanelContainer();
            $("#tabs iframe").height(getFrameHeight());
        });

        $(".col-menu ul li a").eq(0).trigger("click");
        $('.')
    });

    function addadd(url, title) {
        if (!title || !url) {
            return;
        }
        tabs.add({
            url: url,
            label: title
        });
    }

    $(".col-menu ul li a").click(function(e) {
        var title = $(this).text();
        var url = $(this).attr("href");
        e.preventDefault();
        addadd(url, title);

    });


</script>
