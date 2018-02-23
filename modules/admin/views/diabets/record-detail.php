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
    <script type="text/javascript" src="/lib/DD_belatedPNG_0.0.8a-min.js"</script>
    <![endif]-->
    <title>用户管理</title>
    <style type="text/css">
        #send-monitor{
            float: right;
            margin-right: 20px;
        }
    </style>
</head>
<body>
<div class="page-container">
    <div class="mt-20">
        <div style="display: none">
           <div id="index-id"><?php echo $id ;?></div>
        </div>
        <table class="table table-border table-bordered table-hover table-bg table-sort">
            <thead>
            <tr class="text-c">
                <th width="100">指标</th>
                <th width="40">标准范围</th>
                <th width="90">测量值</th>
                <th width="130">建议</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($data as $key=>$item):?>
                <tr>
                   <td><?= $item["label"] ?></td>
                    <td><?= $item["standard"] ?></td>
                    <td><?= $item["value"] ?></td>
                    <td><?= $item["desc"] ?></td>
               </tr>
            <?php endforeach;?>
            </tbody>
        </table>
    </div>
</div>
<button type="button" onclick="send_monitor()" class="btn btn-success radius" id="send-monitor" name="">发送预警</button>
<script type="text/javascript" src="/js/jquery-2.1.1.min.js" ></script>
<script type="text/javascript" src="/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/lib/laypage/1.2/laypage.js"></script>
<script type="text/javascript">

    function send_monitor() {
        var id = $("#index-id").text();
        $.ajax(
            {
                type: 'POST',
                url: '/admin/diabets/send-monitor',
                dataType: 'json',
                data :{"id":id},
                success: function(data){
                    $(obj).parents("tr").remove();
                    layer.msg('发送失败!',{icon:1,time:1000});
                },
                error:function(data) {
                    layer.msg('发送成功!',{icon:1,time:1000});
                },
            }
        );
    }
</script>
</body>

</html>