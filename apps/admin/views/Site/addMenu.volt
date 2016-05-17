<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link href="/static/admin/css/frame.css" rel="stylesheet">
</head>
<body>
<div id="frame-top">
    当前位置&nbsp;<i class="iconfont" style="color:#666;font-size: 12px;">&#xe60e;</i>&nbsp;&nbsp;设置&nbsp;&nbsp;<i class="iconfont" style="color:#666;font-size: 12px;">&#xe60f;</i>&nbsp;&nbsp;站长设置&nbsp;&nbsp;<i class="iconfont" style="color:#666;font-size: 12px;">&#xe60f;</i>&nbsp;&nbsp;添加菜单
</div>
<div id="frame-toolbar">
    <ul>
        <li><a href="/admin/site/index">菜单设置</a></li>
        <li><a class="active" href="/admin/site/addMenu">添加菜单</a></li>
    </ul>
</div>
<div id="frame-content">
    <form name="addMenu" method="post" class="J_ajaxForm" action="/Intendant/Site/addMenu" novalidate="novalidate">
        <input type="hidden" name="addMenu" value="addMenu">

        <div class="frame-table-list">
            <div class="input-title">菜单信息</div>
            <table cellpadding="0" cellspacing="0" class="table_form" width="100%">
                <tbody>
                <tr>
                    <td width="140">上级菜单:</td>
                    <td>
                        <select name="pid" class="length_3">
                        <option value="0" {% if pid == 0 %}selected{% endif %}>顶级菜单</option>
                        {% for menu in adminSelect %}
                        <option value="{{menu['id']}}" {% if menu['id'] == pid %}selected{% endif %}><?php echo str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;',$menu['level']); ?><if condition='$vo["level"] gt 0'>├─</if>{{menu['html']}}{{menu['name']}}</option>
                        {% endfor %}
                    </td>
                </tr>
                <tr>
                    <td>菜单名称:</td>
                    <td><input type="text" class="input length_5" name="name" value="" id="name"></td>
                </tr>
                <tr>
                    <td>控制器:</td>
                    <td><input type="text" class="input length_5" name="controller" id="controller" value=""></td>
                </tr>
                <tr>
                    <td>方法:</td>
                    <td><input type="text" class="input length_5" name="action" id="action" value=""></td>
                </tr>
                <tr>
                    <td>菜单排序:</td>
                    <td><input type="text" class="input length_5" name="sort" id="sort" value=""></td>
                </tr>
                <tr>
                    <td>菜单图标：</td>
                    <td>
                        <input id="System_Menu_icons_input" name="icon" type="hidden" value="icons-other-cog">
                        <strong id="System_Menu_icons" style="margin-right: 10px;"><span class="tree-icon tree-file icons-other-cog"></span></strong>
                        <a class="btn" onclick="Show_System_Menu_icons()">选择图标</a>
                    </td>
                </tr>
                <tr>
                    <td>是否显示:</td>
                    <td><select name="isshow">
                        <option value="1">显示</option>
                        <option value="0">不显示</option>
                    </select>&nbsp;&nbsp;&nbsp;是否显示菜单在后台管理页面上</td>
                </tr>

                </tbody>
            </table>
        </div>
        <div class="frame-table-btn">
            <a class="btn ajax-add" type="submit">添加</a>
        </div>
    </form>
</div>

</body>
<script>
    var iconPach = '/admin/site/iconsCls';
</script>
<script src="/static/common/js/jquery/jquery-1.12.3.min.js"></script>
<script src="/static/common/js/layer/layer.js"></script>

<script>
    function Select_System_Menu_icons(icon){
        $("#System_Menu_icons").html('<i class="iconfont">'+icon+'</i>');
        $("#System_Menu_icons_input").val(icon);
        layer.closeAll();
    }
    function Show_System_Menu_icons(){
        layer.open({
            type: 1,
            title: '请选择菜单图标',
            shadeClose: true,
            shade: 0.8,
            offset: '100px',
            area: ['480px', '500px'],
            content: '正在加载图标中...' //iframe的url
        });
        $.post(iconPach,"",function(data){
            if(typeof data == 'object'){
                var content = [];
                for(x in data){
                    content[x] = "<a style='color: #666;font-size: 16px;' class='iconfont' onclick=\"Select_System_Menu_icons('"+data[x]+"')\" style='cursor:pointer;'>"+data[x]+"</a>";
                }
                var ss = '<div style="padding:10px">';
                ss += content;
                ss += '</div>';
                $('.layui-layer-content').html("<div style='padding:10px;'>"+content.join(" ")+"</div>");
            } else {
                $('.layui-layer-content').html("<div style='padding:10px;color: #FFD700;'>图标加载失败，请联系管理员！</div>");
            }
        },'json').error(function(){
            $('.layui-layer-content').html("<div style='padding:10px;color: #FFD700;'>图标加载失败，请联系管理员！3秒后自动关闭...</div>");
        });

    }
    $(function(){
        jQuery.validator.addMethod("chinaese", function(value, element) {
            var chinaese = /^[\u4e00-\u9fa5]+$/;
            return this.optional(element) || (chinaese.test(value));
        }, "只能输入中文");
        $('form[name=addMenu]').validate({
            errorElement : 'span',
            validClass: "success",	//非常重要
            success : function (label) {
                label.addClass('success');
            },
            rules : {
                title : {
                    required : true,
                    chinaese : true,
                    remote : {
                        url : checkAddMTit,
                        type : 'post',
                        dataType : 'json',
                        data : {
                            title : function(){
                                return $('#title').val();
                            }
                        }
                    }
                },
                name : {
                    required : true,
                    remote : {
                        url : checkAddMenu,
                        type : 'post',
                        dataType : 'json',
                        data : {
                            name : function(){
                                return $('#name').val();
                            }
                        }
                    }
                },
            },
            messages : {
                title : {
                    required : "请输入菜单名称",
                    remote : '菜单名称已存在'
                },
                name : {
                    required : "请输入菜单规则",
                    remote : '菜单规则已存在'
                },
            },
            submitHandler: function(form)
            {
                if($('.J_ajax_submit_btn').attr("disabledSubmit")){
                    $('.J_ajax_submit_btn').text('请勿重复提交...').prop('disabled', true).addClass('disabled');
                    return false;
                }
                $('.J_ajax_submit_btn').attr("disabledSubmit",true);
                var param = $('form[name=addMenu]').serialize();
                $.ajax({
                    url: $('form[name=addMenu]').attr('action'),
                    dataType:'json',
                    type:'POST',
                    data:param,
                    success: function(data) {
                        if (data=='-20') {
                            ITENY.alert('提示','添加菜单成功,3秒后为你跳转!',1,'3000');
                            setTimeout(function(){
                                window.location.href=menudizhi;
                            },3000);
                        }else if(data=='-1')
                        {
                            ITENY.alert('提示','菜单名称不能为空',1,'3000');
                            $('.J_ajax_submit_btn').text('添加').removeProp('disabled').removeClass('disabled');
                            $('.J_ajax_submit_btn').attr("disabledSubmit",'');						}
                        else if(data=='-2')
                        {
                            ITENY.alert('提示','菜单规则不能为空',1,'3000');
                            $('.J_ajax_submit_btn').text('添加').removeProp('disabled').removeClass('disabled');
                            $('.J_ajax_submit_btn').attr("disabledSubmit",'');
                        }
                        else if(data=='-3')
                        {
                            ITENY.alert('提示','菜单名称已存在',1,'3000');
                            $('.J_ajax_submit_btn').text('添加').removeProp('disabled').removeClass('disabled');
                            $('.J_ajax_submit_btn').attr("disabledSubmit",'');
                        }
                        else if(data=='-4')
                        {
                            ITENY.alert('提示','菜单规则已存在',1,'3000');
                            $('.J_ajax_submit_btn').text('添加').removeProp('disabled').removeClass('disabled');
                            $('.J_ajax_submit_btn').attr("disabledSubmit",'');
                        }
                        else {
                            ITENY.alert('提示','未知错误，请联系管理员！',1,'3000');
                            $('.J_ajax_submit_btn').text('添加').removeProp('disabled').removeClass('disabled');
                            $('.J_ajax_submit_btn').attr("disabledSubmit",'');
                        }
                    }
                });

            }

        });
    });
</script>
</html>