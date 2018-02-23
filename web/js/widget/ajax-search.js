/**
 * 搜索式查询数据组件客户端处理 JS
 * @author yejintao <yejintao@xiaomi.com>
 */

(function( $ ) {
    var searchInput, dataDiv, highLightIndex, timeoutId, settings, submitInput;
    $.fn.ajaxSearch = function(options){
        settings = $.extend({
            url : '',
            submitName : '',
            submitField : '',
            otherSetOptions : {},
            showNum : 15,
            method : '',
            emptyTxt : '',
            submitCurrentVal : ''
        }, options || {});
        searchInput = $(this);
        dataDiv = $("#search-data_"+settings.submitName); //数据框
        submitInput = $("input[name='"+settings.submitName+"']"); //隐藏的input，用来提交数据

        searchInput.keyup(function(e) {
            if(e.keyCode == 38 || e.keyCode == 40) { //上下键
                keyUpAndDown(e.keyCode);
            } else if(e.keyCode == 13) { //按下回车
                enter();
            } else {
                dataDiv.html('');
                submitInput.val('');
                settings.submitCurrentVal = '';
                highLightIndex = -1;
                if(searchInput.val().length >= 2) {
                    clearTimeout(timeoutId);
                    timeoutId = setTimeout(ajaxRequest, 500);
                }
            }
        });

        if (settings.submitCurrentVal) {
            ajaxRequest();
        }

        searchInput.parent().find(".clear-btn").click(function() {
            clearAll();
        });
    };

    function ajaxRequest() {
        $.ajax({
            type: 'GET',
            url: settings.url,
            data: {
                method : settings.method,
                content: settings.submitCurrentVal ? settings.submitCurrentVal : searchInput.val(),
                showNum : settings.showNum
            },
            dataType: 'JSON',
            cache: true,
            success: function(result) {
                data = result.data; //数据
                format = result.format; //列表内容格式
                if (data.length > 0) {
                    var ul = $("<ul/>");
                    $.each(data, function(i, value) {
                        var li = $("<li/>");
                        $.each(value, function(key, val) {
                            var set = 0;
                            if (key == settings.submitField)
                                set = 1;
                            if (settings.otherSetOptions.length > 0) {
                                $.each(settings.otherSetOptions, function(j, option) {
                                    if (key == option.field) {
                                        set = 1;
                                    }
                                });
                            }
                            if (set)
                                li.attr(key, val);
                        });

                        li.text(getMatchFormatTxt(format, value));
                        ul.append(li);
                    });
                    dataDiv.append(ul);
                } else {
                    dataDiv.append($("<span class='no-data'>"+settings.emptyTxt+"</span>"));
                }

                if (!settings.submitCurrentVal) {
                    dataDiv.show();
                    dataDiv.find('ul li').click(function() {
                        setValue($(this));
                        dataDiv.hide();
                    });
                    var width = searchInput.width();
                    if(width > 400) {
                        dataDiv.width(width+23);
                    }
                } else {
                    var item = dataDiv.find("ul li["+settings.submitField+"="+settings.submitCurrentVal+"]");
                    if (item) {
                        setValue(item);
                    }
                }
            },
            async: false
        });
    }

    function setValue(item) {
        searchInput.val(item.html());
        //设置隐藏input的值
        var submitVal = item.attr(settings.submitField);
        submitInput.val(submitVal);

        //设置其他表单项的值
        if (settings.otherSetOptions.length > 0) {
            $.each(settings.otherSetOptions, function(i, option) {
                var val = item.attr(option.field);
                $("input[name='"+option.name+"'],select[name='"+option.name+"']").val(val);
            });
        };
    }

    /**
     * 处理按上下键的情况
     */
    function keyUpAndDown(keyCode) {
        var lis = dataDiv.find('ul li');
        var num = lis.length;
        if (num <= 0)
            return;
        changeToWhite();
        highLightIndex = ((keyCode != 38 ? num + 1 : num - 1) + highLightIndex) % num;
        lis.eq(highLightIndex).addClass("active");
        setValue(lis.eq(highLightIndex));
    }

    /**
     * 处理按下Enter键
     * @param keyCode
     */
    function enter() {
        if (highLightIndex != -1) {
            searchInput.val(dataDiv.find('ul li').eq(highLightIndex).html());
            dataDiv.hide();
        }
    }

    /**
     * 如果有高亮的则把高亮变白
     */
    function changeToWhite() {
        if (highLightIndex != -1) {
            dataDiv.find('ul li').eq(highLightIndex).removeClass('active');
        }
    }

    function getMatchFormatTxt(format, item) {
        var txt = format;
        var res = format.match(/[{][^{}]*[}]/g);
        if (res) {
            $.each(res, function(i, val) {
                var field = val.replace(/[{|}]/g, '');
                txt = txt.replace(val, item[field] === undefined ? '' : item[field]);
            });
        }

        return txt;
    }

    function clearAll() {
        searchInput.val('');
        submitInput.val('');
        //设置其他表单项的值
        if (settings.otherSetOptions.length > 0) {
            $.each(settings.otherSetOptions, function(i, option) {
                $("input[name='"+option.name+"'],select[name='"+option.name+"']").val('');
            });
        };
        searchInput.focus();
    }
})(jQuery);