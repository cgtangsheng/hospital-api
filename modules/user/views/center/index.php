<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- 屏幕宽度 && 放大比例 && minimal-ui Safari 网页加载时隐藏地址栏与导航栏-->
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-
	scale=1,maximum-scale=1,user-scalable=0,minimal-ui">
    <!-- safari私有meta标签，允许全屏模式浏览 -->
    <meta content="yes" name="apple-mobile-web-app-capable"/>
    <!-- ios系统的私有标签，它指定在web app状态下，ios设备中顶端的状态条的颜色 -->
    <meta content="black" name="apple-mobile-web-app-status-bar-style" />
    <!-- 设备浏览网页时对数字不启用电话功能 -->
    <meta content="telephone=no,email=no" name="format-detection" />
    <title>锦医卫－医心为你</title>
    <link rel="stylesheet" href="/css/client/css/common.css">
    <!-- 自适应样式单 -->
    <link rel="stylesheet" href="/css/client/css/adaptive.css">
    <link rel="stylesheet" href="/css/client/css/user.css">
    <style type="text/css">
        .nav-header{
            /*background: url("/img/client/banner-3.jpeg") no-repeat;*/
            background-color: #00dd1c;
            width: 100%;
            height: 30%;
            margin-bottom: 10px;
            display: -webkit-flex;
            display: flex;
            -webkit-align-items: center;
            align-items: center;
            -webkit-justify-content: center;
            justify-content: center;
            text-align: center;

        }
        .nav-avatar{
            width: 80%;
        }
        #user-id{
            font-size: 20px;
            padding-left: 15px;
        }

        .left{
           font-size: larger;
            font-weight: bolder;
            padding-right: 5px;
            padding-top: 15px;
            /*padding-bottom: 15px;*/
        }
        .right{
            /*text-align: right;*/
            font-size: larger;
            padding-right: 15px;
            /*padding-top: 15px;*/
            /*padding-bottom: 15px;*/
            float: right;
        }
        .un_04{
            color: orangered;
        }
    </style>
</head>
<body>
<!-- header start -->
<div id="Cheader" style="">
    <div id="header" class="header_03">
        <div class="back">
            <a href="/" class="arrow" data-stat-id="ee3d8ad4696c648d" onclick="_msq.push(['trackEvent', 'e2a622d1b7caf838-ee3d8ad4696c648d', '/home/', 'pcpid']);">首页</a>
        </div>
        <div class="tit" style="">
            <h3>登录</h3>
        </div>
    </div>
</div>
<!-- header end -->

<!-- wrapper start -->
<div id="wrapper" class="xm_app">
    <div id="viewport" class="viewport" style="background: transparent;">

        <div class="user_view_03 mt20">

            <div class="box box_01">
                <div class="nav-avatar">
                    <img src="/img/avater.png" width="20%" height="50%" >
                    <span id="user-id"><?php echo Yii::$app->user->identity->getId()?></span>
                </div>

            </div>

            <div class="box box_02 mb20">

                <div class="user_nav list_nav mlr20">
                    <ul>
                        <li class="items">
                            <label class="left">姓 名</label>
                            <label class="right">汤升</label>
                        </li>
                        <li class="items">
                            <label class="left">性　别</label>
                            <label class="right">男</label>
                        </li>
                        <li class="items">
                            <label class="left">出生日期（选填）</label>
                            <label class="right">1987-11-14</label>
                        </li>
                        <li class="items">
                            <label class="left">身　高(选填)</label>
                            <label class="right">172 cm</label>
                        </li>
                        <li class="items">
                            <label class="left">体　重(选填)</label>
                            <label class="right">67 kg</label>
                        </li>
                        <li class="items">
                            <label class="left">腰 围(选填)</label>
                            <label class="right">100 cm</label>
                        </li>
                        <li class="items">
                            <label class="left">臀 围(选填)</label>
                            <label class="right">130 cm</label>
                        </li>
                    </ul>

                    <ul>
                        <li class="items"><a href="coupon.html" onclick="_msq.push(['trackEvent', 'e2a622d1b7caf838-f0297cf5af5c4a47', 'javascript:;', 'pcpid']);_hmt.push(['_trackEvent', 'app数据', '我的账户', '优惠券'])" class="userLogin lnk" data-stat-id="f0297cf5af5c4a47">
                                <div class="un un_04">修改个人信息</div></a>
                        </li>
                        <li class="items"><a href="coupon.html" onclick="_msq.push(['trackEvent', 'e2a622d1b7caf838-f0297cf5af5c4a47', 'javascript:;', 'pcpid']);_hmt.push(['_trackEvent', 'app数据', '我的账户', '优惠券'])" class="userLogin lnk" data-stat-id="f0297cf5af5c4a47">
                                <div class="un un_04">修改密码</div></a>
                        </li>
                     </ul>

                    <ul>
                        <li class="items">
                            <form id="_form" method="post" action="/site/logout">
                                <input type="hidden" name="name" value="value" />
                                <a onclick="document.getElementById('_form').submit();">点击提交</a>
                            </form>
                        </li>
                    </ul>
                </div>

            </div>

        </div>
    </div>
</div>

<!-- wrapper end -->

</body>
</html>