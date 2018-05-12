<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>注册</title>
    <link rel="stylesheet" href="/css/mobile/bootstrap/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="/css/mobile/mobile.css" type="text/css">
</head>
<body>
<div class="mobile-register container-fluid">
    <form action="/doctor/account/create" class="container-fluid form-register" method="post">
        <div class="alert alert-danger">请输入手机号</div>
        <div class="form-group input-group">
            <span class="input-group-addon" ><i class="iconfont">&#xe644;</i></span>
            <input type="tel" class="form-control" placeholder="请输入手机号" name="username" error="请输入手机号" id="username">
        </div>
        <!--        <div class="form-group input-group">-->
        <!--            <span class="input-group-addon" ><i class="iconfont">&#xe614;</i></span>-->
        <!--            <input type="tel" class="form-control" placeholder="验 证 码" error="请输验证码">-->
        <!--            <span class="input-group-btn pr-10">-->
        <!--                    <button type="button" class="btn  verification btn-danger">获取验证码</button>-->
        <!--                </span>-->
        <!--        </div>-->
        <div class="form-group input-group">
            <span class="input-group-addon" ><i class="iconfont">&#xe65e;</i></span>
            <input type="password" class="form-control" placeholder="密  码" name="password" error="请输入密码" id="pwd1">
        </div>
        <div class="form-group input-group">
            <span class="input-group-addon" ><i class="iconfont">&#xe65e;</i></span>
            <input type="password" class="form-control" placeholder="确认密码" name="re_password" error="两次密码不一致" id="pwd2" onchange="checkpwd2()">
        </div>
        <!--        <div class="form-group input-group">-->
        <!--            <span class="input-group-addon" ><i class="iconfont">&#xe60f;</i></span>-->
        <!--            <input type="tel" class="form-control" placeholder="推 荐 人">-->
        <!--        </div>-->
        <?php if($error != false):?>
            <p id="error-print" style="color: red"><?=$error;?></p>
        <?php endif?>
        <div class="form-group mt-30">
            <button type="submit" class="btn btn-danger btn-lg btn-block" id="submit">注册</button>
        </div>
    </form>
    <div class="tip">
        <p>点击注册按钮，即表示同意</p>
        <a href="javascript:;">&ll; 注册之前请仔细阅读用户协议 &gg;</a>
    </div>
</div>
</body>

<script type="text/javascript">
    var submitBtn = document.getElementById("submit");
    submitBtn.onclick = function (event) {
        var p1=document.getElementById("pwd1").value;//获取密码框的值
        var p2=document.getElementById("pwd2").value;//获取重新输入的密码值
        if(p1==""){
            alert("请输入密码！");//检测到密码为空，提醒输入//
            document.getElementById("pwd1").focus();//焦点放到密码框
            return false;//退出检测函数
        }//如果允许空密码，可取消这个条件
        if(p1!=p2){//判断两次输入的值是否一致，不一致则显示错误信息
            alert(p1)
            alert(p2)
            document.getElementById("error-print").innerText="两次输入密码不一致，请重新输入";//在div显示错误信息
            return false;
        }else{
            //密码一致，可以继续下一步操作
        }
    }

</script>
</html>