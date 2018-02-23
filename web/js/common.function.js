function showFailureInfo(msg) {

}

function showSuccessInfo(msg) {

}


function redirctUrl(url) {

}

//form表单渲染
/**
 * 显示form表单验证失败的项
 * @param frm           form
 * @param result        JSON 结果 {code:200, msg:[]}
 * @param showOption    是否将错误显示在form的各选项
 * @param container     渲染结果通知的容器，为空表示:右上角弹出
 */
function showFormResult(frm, result, showOption, container) {
    if (!result.code) {
        return 1;
    }
    if (result.code == 200) { //表单提交成功
        showAlertNotification(result.code, result.msg, container);
    } else { //显示表单的错误信息
        var publicErr = '', onlyPublic = true;
        var fs = $(frm).serializeArray();
        $.each(result.msg, function(key, value) {
            var i = 0;
            $.each(fs, function () {
                if((key === this.name || this.name.indexOf("["+key+"]") > 0) && frm.find("input[name='"+this.name+"']").attr('type') != 'hidden') {
                    showOptionErrInfo(frm, this.name, value, showOption, publicDiv);//显示错误信息
                    i++;
                    onlyPublic = false;
                }
            });

            if(i == 0 && showOption) {    //没有符合的input选项则显示在notice区域
                publicErr += value+"；";
            }
        });
        if (!showOption) {
            $.each(result.msg, function (key, val) {
                $.each(val, function (k, v) {
                    publicErr += v+"; ";
                });
            });
        }
        //显示错误信息
        if(publicErr) {
            showAlertNotification(400, publicErr, container);
        }
        if (onlyPublic) {
            frm.find('input[type!="hidden"]').val('');
        }
        frm.find("input.invalid").first().focus();
    }
}

/**
 * 渲染form表单每个失败项的样式及信息
 * @param {type} frm
 * @param {type} name
 * @param {type} info
 * @returns {undefined}
 */
function showOptionErrInfo(frm, name, info, showOption) {
    var input = frm.find("input[name='"+name+"'],select[name='"+name+"']");
    input.val('');
    input.addClass('invalid');
    var div = input.parent();
    div.addClass("has-error");
    if(!div.find('e').length && showOption) {
        div.append("<e>"+info+"</e>");
    }
    input.focus();
    input.bind("keyup change", function(){ //输入时隐藏
        $(this).removeClass('invalid');
        if(div.hasClass('has-error')) {
            div.find('e').remove();
            div.removeClass('has-error');
        }
        var divObj = $("#"+publicDiv);
        divObj.fadeOut('normal', function(){
            $(this).empty();
        });
    });
}

function showAlertNotification(code, msg, container) {
    var displayTime = 8000;
    var icon = code == 200 ? 'fa-thumbs-up' : 'fa-times';
    var title = code == 200 ? 'Success!' : 'Wrong!';
    var html = '<div class="text-1x"> <i class="fa '+ icon +'"></i> <strong>'+title+'</strong>';
    html += ' <span class="text-semibold">' + msg + '</span></div>';
    $.niftyNoty({
        type: code == 200 ? 'success' : 'danger',
        container : container ? container : 'floating',
        html : html,
        timer : code == 200 ? displayTime : displayTime * 5
    });
}