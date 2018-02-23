<!doctype html>
<html>
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
    <meta content="telephone=no,email=no" name="format-detectPion" />
    <title>锦医卫－医心为你</title>
    <link rel="stylesheet" href="/css/client/css/common.css">
    <!-- 自适应样式单 -->
    <link rel="stylesheet" href="/css/client/css/adaptive.css">
    <!-- 加载前动画样式 -->
    <link rel="stylesheet" href="/css/client/css/loading.css">
    <link rel="stylesheet" href="/css/client/css/index.css">
    <!-- 移动端滑动&轮播框架 -->
    <script src="/js/ready.js"></script>
    <script src="/js/swipe.js"></script>
    <script type="text/javascript">
        /* loading ready */
        document.ready(function(){
            document.getElementById("loading").style.display = "none";
        });
    </script>
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
    </style>
</head>
<body>
<!-- loading -->
<div id="loading" style="height:100%;">
    <div class="spinner" >
        <div class="spinner-container container1">
            <div class="circle1"></div>
            <div class="circle2"></div>
            <div class="circle3"></div>
            <div class="circle4"></div>
        </div>
        <div class="spinner-container container2">
            <div class="circle1"></div>
            <div class="circle2"></div>
            <div class="circle3"></div>
            <div class="circle4"></div>
        </div>
        <div class="spinner-container container3">
            <div class="circle1"></div>
            <div class="circle2"></div>
            <div class="circle3"></div>
            <div class="circle4"></div>
        </div>
    </div>
</div>

<!-- all content  -->
<div class="wrapper" id="content">
    <!-- header start -->
    <div class="header">
        <!-- 绝对定位的logo -->
        <div class="logo">
            <a href="/" title="锦医卫－医心为你" class="home">
                <span>锦医卫－医心为你</span>
            </a>
        </div>
        <!-- 占据高度DIV -->
        <div class="tit"></div>
        <!-- 绝对定位的右侧个人中心 && 购物车-->
        <div class="right">
            <ul>
                <li class="user">
                    <a href="/user/center" title="个人中心">
                        <span class="icon icon-gerenzhongxin"></span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <!-- header end -->
    <!-- banner start -->
    <div class="nav-wrap nav-header" style="<?php if($user["type"]==1){echo "background-color: #00dd1c;";}else{echo "background-color: #00a0e9;";} ?>">
        <div class="nav-avatar">
            <img src="/img/avater.png" width="20%" height="50%" >
        </div>
    </div>
    <!-- banner end -->
    <!-- menu start -->
    <div class="nav-wrap nav-index">
        <div id="slider_nav" class="swipe-new">
            <div class="swipe-wrap">

                <div>
                    <ul>
                        <li>
                            <a href="category.html" data-log="B0-#/product/category" data-stat-id="2c1ee89f7411236e"><span class="icon icon-quanbushangpin"></span><span class="t"><span>资讯</span></span>
                            </a>
                        </li>
                        <li>
                            <a href="/search/index" data-log="B1-#/search" data-stat-id="4be0bd1e89e75509" onclick="_msq.push(['trackEvent', 'c499efdd9c939a49-4be0bd1e89e75509', '#/search', 'pcpid']);">
                                <span class="icon icon-sousuo">
                                </span><span class="t">
                                    <span>搜索</span></span>
                            </a>
                        </li>
                        <li><a href="http://127.0.0.1:8001/" data-log="B2-http://m.xiaomi.cn/" data-stat-id="edfd3e1d45a48ac3" onclick="_msq.push(['trackEvent', 'c499efdd9c939a49-edfd3e1d45a48ac3', 'http://m.xiaomi.cn/', 'pcpid']);"><span class="icon icon-shequ"></span><span class="t"><span>社区</span></span></a></li>
                    </ul>
                </div>

                <div data-index="1">
                    <ul>
                        <li><a href="/dm/index" data-log="B1-#/fcode" data-stat-id="90f2ce1fecd81997" onclick="_msq.push(['trackEvent', 'c499efdd9c939a49-90f2ce1fecd81997', '#/fcode', 'pcpid']);">
                                <span class="icon icon-fcode">
                                </span><span class="t"><span>糖尿病自检</span></span>
                            </a>
                        </li>
                        <li><a href="/health/index" data-log="B0-#/health" data-stat-id="b2173beffbc2a4b5" onclick="_msq.push(['trackEvent', 'c499efdd9c939a49-b2173beffbc2a4b5', '#/health', 'pcpid']);">
                                <span class="icon"><img src="/img/client/check.png" width="100%"></span>
                                <span class="t"><span>自检记录</span></span>
                            </a>
                        </li>
                        <li><a href="/laboratory/index" data-log="B2-#/recharge/productlist" data-stat-id="a1bc230f9e518de9" onclick="_msq.push(['trackEvent', 'c499efdd9c939a49-a1bc230f9e518de9', '#/recharge/productlist', 'pcpid']);">
                                <span class="icon icon-huafeichongzhi"></span>
                                <span class="t"><span>化验单录入</span></span>
                            </a>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </div>
    <!-- menu end -->

    <script type="text/javascript">
        var bottom = document.getElementById("bottomNav").getElementsByTagName("span");
        // 轮播&滑动事件
        var slider = Swipe(document.getElementById('slider_nav'), {
            continuous: true,  //无限循环的图片切换效果
            disableScroll: true,  //阻止由于触摸而滚动屏幕
            stopPropagation: false,  //停止滑动事件
        });

        var sliderBanner = Swipe(document.getElementById('slider'), {
            auto: 2500,
            continuous: true,
            disableScroll: false,
            stopPropagation: false,
            callback: function(index){
                if(index%2){
                    bottom[0].className = "";
                    bottom[1].className = "on";
                }
                else{
                    bottom[0].className = "on";
                    bottom[1].className = "";
                }
            },  //回调函数，切换时触发
        });
    </script>
</div>
</body>
</html>