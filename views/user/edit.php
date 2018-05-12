<!DOCTYPE html>
<html lang="cn">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>编辑个人资料</title>
    <style type="text/css">
        label{
            text-align: right;
            width: 40%;
        }
        .form-control{
            width: 60%;
            text-align: left;
            margin-left: 10px;
        }
        .user-line{
            vertical-align: middle;
            margin-bottom: 10px;
        }
        h3{
            text-align: center;
        }

    </style>
</head>
<body>
<div class="box">

    <div class="user_nav">
        <div>
            <h3>编辑个人资料</h3>
        </div>
        <form action="/user/save" method="get">
            <div class="user-line">
                <label class="left">姓　名:</label><input class="form-control" type="text" name="name" value="<?php echo isset($data["name"])?$data["name"]:"";?>">
            </div>
            <div class="user-line">
                <label class="left">性　别:</label>
                <select class="selectpicker" name="sex">
                    <option value="0" checked="<?php echo isset($data["sex"])&&$data["sex"]==0?"checked":"" ?>">男性</option>
                    <option value="1" checked="<?php echo isset($data["sex"])&&$data["sex"]==1?"checked":"" ?>">女性</option>
                </select>
            </div>
            <div class="user-line">
                <label class="left">生　日:</label><input class="form-control"　type="date"  name="birthday" value="<?php echo isset($data["name"])?$data["name"]:"";?>">
            </div>
            <div class="user-line">
                <label class="left">身　高:</label><input class="form-control" type="text" name="height" value="<?php echo isset($data["height"])?$data["height"]:"";?>">
            </div>
            <div class="user-line">
                <label class="left">体　重:</label><input class="form-control" type="text" name="weight" value="<?php echo isset($data["weight"])?$data["weight"]:"";?>">
            </div>
            <div class="user-line">
                <label class="left">身份证:</label><input class="form-control" type="text"  name="identify" value="<?php echo isset($data["identify"])?$data["identify"]:"";?>">
            </div>
            <div class="user-line">
                <label class="left">手机号:</label><input class="form-control" type="text" name="tel" value="<?php echo isset($data["tel"])?$data["tel"]:"";?>">
            </div>
            <div class="user-line">
                <label class="left">微信号:</label><input class="form-control" type="text" name="wx" value="<?php echo isset($data["wx"])?$data["wx"]:"";?>">
            </div>
            <button type="submit" class="btn btn-success">提交</button>
        </form>
    </div>
</div>
</body>


</html>

