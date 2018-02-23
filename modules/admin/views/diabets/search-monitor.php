<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <!--[if lt IE 9]>


    <script type="text/javascript" src="/js/jquery-2.1.1.min.js" ></script>
    <script type="text/javascript" src="/lib/html5shiv.js"></script>
    <script type="text/javascript" src="/lib/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" type="text/css" href="/static/h-ui/css/H-ui.min.css" />
    <link rel="stylesheet" type="text/css" href="/static/h-ui.admin/css/H-ui.admin.css" />
    <link rel="stylesheet" type="text/css" href="/lib/Hui-iconfont/1.0.8/iconfont.css" />
    <link rel="stylesheet" type="text/css" href="/static/h-ui.admin/skin/default/skin.css" id="skin" />
    <link rel="stylesheet" type="text/css" href="/static/h-ui.admin/css/style.css" />
    <!--[if IE 6]>
    <script type="text/javascript" src="/lib/DD_belatedPNG_0.0.8a-min.js" ></script>
    <![endif]-->
    <title>用户管理</title>
</head>
<body>
<table class="table table-border table-bordered table-hover table-bg table-sort" id="tbl-data">
    <thead>
    <tr class="text-c">
        <th width="25"><input type="checkbox" name="" value=""></th>
        <th width="80">ID</th>
        <th width="100">用户名</th>
        <th width="40">性别</th>
        <th width="90">手机</th>
        <th width="130">地址</th>
        <th width="150">身份证</th>
        <th width="130">加入时间</th>
        <th width="70">状态</th>
        <th width="100">操作</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($data as $key=>$item):?>
        <div style="display: none"><?= $id= $item["id"]?></div>
        <tr class="text-c" onClick="record_detail('自检详情','/admin/diabets/record-detail',1)">
            <td><input type="checkbox" value="1" name=""></td>
            <td><?= $item["health_id"]?></td>
            <td><?= $item["name"] ?></td>
            <td><?php if($item["sex"] == 0){echo "男";}else{echo "女";} ?></td>
            <td><?= empty($item["tel"])?"暂无":$item["tel"] ?></td>
            <td class="text-l">北京市 海淀区</td>
            <td><?=$item["identify"]?></td>
            <td>2014-6-11 11:11:42</td>
            <td class="td-status"><span class="label label-success radius">正常状态</span></td>
            <td class="td-manage"><a style="text-decoration:none" onClick="member_stop(this,'10001')" href="javascript:;" title="停用"><i class="Hui-iconfont">&#xe631;</i></a> <a title="发送预警" href="javascript:;" onclick="member_edit('发送预警','/admin/diabets/send-monitor','4','','510')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a> <a style="text-decoration:none" class="ml-5" onClick="change_password('修改密码','change-password.html','10001','600','270')" href="javascript:;" title="修改密码"><i class="Hui-iconfont">&#xe63f;</i></a> <a title="删除" href="javascript:;" onclick="member_del(this,'1')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a></td>
        </tr>
    <?php endforeach;?>
    </tbody>
</table>
</body>
</html>

