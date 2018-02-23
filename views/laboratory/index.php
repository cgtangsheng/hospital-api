<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>化验单上传</title>
    <link rel="stylesheet" type="text/css" href="/css/Huploadify.css"/>
    <script type="text/javascript" src="/js/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="/js/jquery.Huploadify.js"></script>
    <style type="text/css">
        .check-upload,.check-result{
            float:left;
        }
    </style>
    <script type="text/javascript">
        $(function(){
            var up = $('#upload').Huploadify({
                auto:true,
                fileTypeExts:'*.*',
                multi:false,
                formData:{key:123456,key2:'vvvv'},
                fileSizeLimit:99999999999,
                showUploadedPercent:true,
                showUploadedSize:true,
                removeTimeout:9999999,

                uploader:'/laboratory/upload',
                onUploadStart:function(file){
                    console.log(file.name+'开始上传');
                },
                onInit:function(obj){
                    console.log('初始化');
                    console.log(obj);
                },
                onUploadComplete:function(file,data){
                    $('#source-img').html(data);
                }
            });

            $('#btn2').click(function(){
                up.upload('*');
            });

            $('#check').click(function(){
                var url = $('#laboratory')[0].src;
                htmlobj = $.ajax(
                    {
                        url:"/laboratory/check",
                        async:false,
                        dataType:"html",
                        data:{
                            url:url,
                        },
                    }
                );
                $("#source-img").html(htmlobj.responseText);
            });
        });
    </script>
</head>

<body>
<div id="upload"></div>
<button id="check">check</button>
<div id="source-img" class="check-upload"></div>
<!--<button id="btn3">cancel</button>-->
<!--<button id="btn4">disable</button>-->
<!--<button id="btn5">ennable</button>-->
<!--<button id="btn6">destroy</button>-->
</body>
</html>