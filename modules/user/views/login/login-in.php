<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<!DOCTYPE html>
<html>
<head>
    <title>锦医卫 - 登录</title>
    <meta content="yes" name="apple-mobile-web-app-capable"/>
    <!-- ios系统的私有标签，它指定在web app状态下，ios设备中顶端的状态条的颜色 -->
    <meta content="black" name="apple-mobile-web-app-status-bar-style" />
    <!-- 设备浏览网页时对数字不启用电话功能 -->
    <meta content="telephone=no,email=no" name="format-detection" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0, maximum-scale=1.0,user-scalable=no">
    <link rel="stylesheet" href="/css/client/css/common.css">
    <!-- 自适应样式单 -->
    <link rel="stylesheet" href="/css/client/css/adaptive.css">
    <link rel="stylesheet" href="/css/client/css/login.css">
<body class="zh_CN">
<div class="layout">
    <div class="nl-content">
        <div class="nl-logo-area" id="custom_display_1">
            <a href="javascript:void(0)">
                <img id="logo-img" src="/img/client/timg.jpeg" data-src="/static/img/passport/nl-logo.png" onerror="this.src=&#39;/static/img/passport/nl-logo.png&#39;" width="150">
            </a>
        </div>

        <h1 class="nl-login-title" id="custom_display_256"><span id="message_LOGIN_TITLE">一个帐号，即刻拥有你的健康管家！</span></h1>
        <h2 class="nl-login-title lsrp-appname display-custom-hide" id="lsrp_appName"></h2>

        <div class="nl-frame-container">
            <div class="ng-form-area show-place" id="form-area">
                <form method="post" action="/user/login/in" id="miniLogin">

                    <div class="shake-area" id="shake_area" style="z-index:30;">
                        <div class="enter-area display-custom-hide" id="revalidate_user"> <p class="revalidate-user-name" id="revalidate_user_name"></p>
                        </div>
                        <div class="enter-area" id="enter_user">
                            <input type="text" class="enter-item first-enter-item" data-rule="(^[\w.\-]+@(?:[A-Za-z0-9]+(?:-[A-Za-z0-9]+)*\.)+[A-Za-z]{2,6}$)|(^1\d{10}$)|(^\d{3,}$)|(^\++\d{2,}$)" id="miniLogin_username" autocomplete="off" placeholder="邮箱/手机号码/酒查查帐号" name="username">
                            <i class="placeholder hide" id="message_INPUT_IDENTITY">邮箱/手机号码</i>
                            <span class="error-tip"><em class="error-ico"></em><span class="error-msg"></span></span>
                        </div>
                        <div class="enter-area" style="z-index:20;">
                            <input type="password" class="enter-item last-enter-item" id="miniLogin_pwd" autocomplete="off" data-rule="" placeholder="密码" name="password">
                            <i class="placeholder hide" id="message_INPUT_PASSWORD">密码</i>
                            <span class="error-tip"><em class="error-ico"></em><span class="error-msg"></span></span>
                        </div>
                    </div>

                    <div class="enter-area img-code-area" id="img_code_area" style="display:none;">
                        <input type="text" class="enter-item code-enter-item" id="miniLogin_captCode" autocomplete="off" maxlength="12" placeholder="验证码">
                        <img src="" class="code-img" id="code_img">
                        <i class="placeholder hide" id="message_INPUT_CONFIRM">验证码</i>
                        <span class="error-tip"><em class="error-ico"></em><span class="error-msg" id="code_error_tips"></span></span>
                    </div>

                    <div class="miniLogin_forbidden" id="miniLogin_forbidden">
                        <div><span id="message_LOGIN_TOO_MUCH">您的操作频率过快，请稍后再试。</span>(<span id="retryCountdown"></span>)</div>
                    </div>

                    <div class="miniLogin_forbidden" id="miniLogin_forzen">
                        <div><span id="message_LOGIN_FORZEN">此帐号已被冻结，暂时无法登录</span></div>
                    </div>
                    <input class="button" style="background-color: #00AA00;" type="submit" id="message_LOGIN_IMMEDIATELY" value="立即登录">

                    <div class="ng-foot clearfix">

                        <div style="display:none">
                            <div class="ng-cookie-area" id="cookie_area">
                                <input type="hidden" id="auto"><em class="checkbox" id="checkbox_item"></em>
                                <span id="message_AUTOLOGIN_TWOWEEKS">两周内自动登录</span>
                            </div>
                        </div>

                        <div class="ng-link-area">
                            <span> <a href="https://account.xiaomi.com/pass/sns/login/auth?appid=100284651&callback=http%3A%2F%2Fm.mi.com%2Fmshopapi%2Fv1%2Fauthorize%2Fsso_callback%3Ffollowup%3Dhttp%253A%252F%252Fm.mi.com%252Findex.html%2523ac%253Daccount%2526op%253Dindex%26sign%3DYjJhY2VjZWEwZDYzOTNhNmZhOTRjYmRmMDVlN2ZlZTJhZDFhOTViOA%2C%2C&sid=mi_eshopm" id="other_method_default">QQ联合登录</a><span> | </span> </span>
                            <span id="custom_display_16"> <a href="javascript:void(0);" id="other_method">其他方式登录</a> <span> | </span> </span>
                            <span id="custom_display_64"> <a href="https://account.xiaomi.com/pass/forgetPassword?callback=http%3A%2F%2Fm.mi.com%2Fmshopapi%2Fv1%2Fauthorize%2Fsso_callback%3Ffollowup%3Dhttp%253A%252F%252Fm.mi.com%252Findex.html%2523ac%253Daccount%2526op%253Dindex%26sign%3DYjJhY2VjZWEwZDYzOTNhNmZhOTRjYmRmMDVlN2ZlZTJhZDFhOTViOA%2C%2C&sid=mi_eshopm&_snsdefault=qq" id="message_FORGET_PASSWORD" target="_blank">忘记密码？</a> </span>
                            <div class="third-area hide" id="third_area"> </div>
                        </div>

                    </div>

                    <a style="display:none" id="redirectLink" href="" target="_top"></a>
                    <a style="display:none" id="redirectTwoPhraseLoginLink" href=""></a>

                </form>
                <div class="qrlogin-trigger" id="qrlogin-trigger">二维码登录</div>
            </div>
        </div>

        <div class="web-info">
            <p class="web-info-content" id="web_info_content"></p>
        </div>
    </div>

    <div class="nl-footer">
        <div class="nl-f-nav" id="nl_f_nav">
            <span id="custom_display_4"> <a href="javascript:void(0);" onclick="change_lang(&#39;zh_CN&#39;); return false;" class="zh-cn">简体</a>| <a href="javascript:void(0);" onclick="change_lang(&#39;zh_TW&#39;); return false;" class="zh-tw">繁体</a>| <a href="javascript:void(0);" onclick="change_lang(&#39;en&#39;); return false;" class="zh-en">English</a> </span> <span id="custom_display_32"> <span class="n_common_line">|</span> <span id="message_FAQLIST"><a href="http://static.account.xiaomi.com/html/faq/faqList.html" target="_blank">常见问题</a></span> </span>
        </div>
        <p class="nl-f-copyright" id="message_COPYRIGHT">版权所有-京ICP备10046444-京公网安备1101080212535-京ICP证110507号</p>
    </div>
    <div id="modal-mask" class="modal-mask display-custom-hide"> </div>
    <div class="modal-container display-custom-hide" id="qrlogin-container">
        <div id="qrlogin-close" class="modal-close">Close</div>
        <iframe id="qrlogin-iframe" frameborder="0" border="0" class="qrlogin-iframe" style="width: 340px; height: 340px; margin-top: -170px; margin-left: -170px;"></iframe>
    </div>
</div>
<a target="_blank"></a>
</body>
</html>