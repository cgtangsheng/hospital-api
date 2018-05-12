<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>

<head>
    <style type="text/css">
        .cls-container{
            background: url("/img/bg-img/thumbs/bg-img-2.jpg");
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
        }

    </style>
</head>



<body>
<div id="container" class="cls-container">

    <!-- BACKGROUND IMAGE -->
    <!--===================================================-->
    <div id="bg-overlay" class="bg-img img-balloon"></div>


    <!-- HEADER -->
    <!--===================================================-->
    <div class="cls-header cls-header-lg">
        <div class="cls-brand">
            <a class="box-inline" href="index.html">
                <!-- <img alt="Nifty Admin" src="img/logo.png" class="brand-icon"> -->
                <span class="brand-title">医生管理后台</span>
            </a>
        </div>
    </div>
    <!--===================================================-->


    <!-- LOGIN FORM -->
    <!--===================================================-->
    <div class="cls-content">
        <div class="cls-content-sm panel">
            <div class="panel-body">
                <form action="/site/login" method="post">
                    <input type="hidden" value=<?php echo Yii::$app->request->csrfToken;  ?> name="_csrf">
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-user"></i></div>
                            <input type="text" class="form-control" placeholder="Username" name="LoginForm[username]">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-asterisk"></i></div>
                            <input type="password" class="form-control" placeholder="Password" name="LoginForm[password]">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-8 text-left checkbox">
                            <label class="form-checkbox form-icon">
                                <input type="checkbox" name="LoginForm[rememberMe]"> 记住密码
                            </label>
                        </div>
                        <div class="col-xs-4">
                            <div class="form-group text-right">
                                <button class="btn btn-success text-uppercase" type="submit">登录</button>
                            </div>
                        </div>
                    </div>
                    <div class="mar-btm"><em>- 或者 -</em></div>
                    <button class="btn btn-primary btn-lg btn-block" type="button">
                        <i class="fa fa-facebook fa-fw"></i>其他帐号登录
                    </button>
                </form>
            </div>
        </div>
        <div class="pad-ver">
            <a href="pages-password-reminder.html" class="btn-link mar-rgt">忘记密码?</a>
            <a href="pages-register.html" class="btn-link mar-lft">注册新帐号</a>
        </div>
    </div>
    <!--===================================================-->


</div>
<!--===================================================-->
<!-- END OF CONTAINER -->



<!--JAVASCRIPT-->
<!--=================================================-->


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