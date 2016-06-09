<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>系统设置</title>
    <link href="/static/admin/css/frame.css" rel="stylesheet">
</head>
<body>
<div id="frame-top">
    当前位置&nbsp;<i class="iconfont" style="color:#666;font-size: 12px;">&#xe60e;</i>&nbsp;&nbsp;设置&nbsp;&nbsp;<i class="iconfont" style="color:#666;font-size: 12px;">&#xe60f;</i>&nbsp;&nbsp;站长设置&nbsp;&nbsp;<i class="iconfont" style="color:#666;font-size: 12px;">&#xe60f;</i>&nbsp;&nbsp;系统设置
</div>

<div id="frame-content" style="margin-top: 36px;">
    <form name="set" method="post" class="J_ajaxForm" action="/admin/Site/set" novalidate="novalidate">
        <input type="hidden" name="set" value="set">
        <div class="frame-table-list">
            <div class="input-title">后台设置</div>
            <table cellpadding="0" cellspacing="0" class="table_form" width="100%">
                <tbody>
                <tr>
                    <td width="140">是否开启调试模式:</td>
                    <td><input type="radio" name="debug" value="true" <?php if ($debug == true) { ?>checked<?php } ?>>启用<label>  &nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="debug" value="false" <?php if ($debug == false) { ?>checked<?php } ?>>禁止</label></td>
                </tr>
                <tr>
                    <td>redis默认缓存时间:</td>
                    <td><input type="text" class="input length_5" name="safecachetime" id="safecache" value="<?php echo $safecache; ?>"></td>
                </tr>
                <tr>
                    <td>后台菜单缓存:</td>
                    <td><input type="text" class="input length_5" name="adminmenu" id="adminmenu" value="<?php echo $adminmenu; ?>""></td>
                </tr>
                <tr>
                    <td>后台日志缓存:</td>
                    <td><input type="text" class="input length_5" name="adminlog" id="adminlog" value="<?php echo $adminlog; ?>""></td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="frame-table-btn">
            <button class="btn ajax-add" type="submit">设置</button>
        </div>
    </form>
</div>
</body>
<script>
    var usermanage = '/admin/Site/set';
</script>
<script src="/static/common/js/jquery/jquery-1.12.3.min.js"></script>
<script src="/static/common/js/jquery.validate.min.js"></script>
<script src="/static/common/js/layer/layer.js"></script>
<script src="/static/admin/js/admin.common.js"></script>
<script>
    $(function(){
        jQuery.validator.addMethod("chinaese", function(value, element) {
            var chinaese = /^[\u4e00-\u9fa5]+$/;
            return this.optional(element) || (chinaese.test(value));
        }, "请输入中文");
        jQuery.validator.addMethod("english", function(value, element) {
            var english = /^[A-Za-z]+$/;
            return this.optional(element) || (english.test(value));
        }, "请输入英文字符串");
        jQuery.validator.addMethod("username", function(value, element) {
            var tel = /^[a-zA-Z][\w]{4,16}$/;
            return this.optional(element) || (tel.test(value));
        }, "以字母开头,5-17 字母、数字、下划线'_'");
        jQuery.validator.addMethod("password", function(value, element) {
            var tel = /^[a-zA-Z][\w]{7,16}$/;
            return this.optional(element) || (tel.test(value));
        }, "以字母开头,8-17 字母、数字、下划线'_'");
        $('form[name=set]').validate({
            errorElement : 'span',
            validClass: "success",	//非常重要
            success : function (label) {
                label.addClass('success');
            },
            rules : {
                safecachetime : {
                    required : true,
                    digits : true
                },
                adminmenu : {
                    required : true,
                    digits : true
                },
                adminlog : {
                    required : true,
                    digits : true
                },
            },
            messages : {
                safecachetime : {
                    required : "请输入redis缓存时间",
                    digits : '缓存时间只能是数字'
                },
                adminmenu : {
                    required : "请输入后台菜单缓存时间",
                    digits : '缓存时间只能是数字'
                },
                adminlog : {
                    required : "请输入后台日志缓存时间",
                    digits : '缓存时间只能是数字'
                },
            },
            submitHandler: function(form)
            {
                if($('button.btn').attr("disabledSubmit")){
                    $('button.btn').text('请勿重复提交...').prop('disabled', true).addClass('disabled');
                    return false;
                }
                $('button.btn').attr("disabledSubmit",true);
                var param = $('form[name=set]').serialize();
                $.ajax({
                    url: $('form[name=set]').attr('action'),
                    dataType:'json',
                    type:'POST',
                    data:param,
                    beforeSend: function(){
                        myload = layer.load(0,{time:3*1000});
                    },
                    success: function(data) {
                        layer.close(layer.load(1));
                        if (!data.status) {
                            admin.alert('操作提示',''+data.info,2,'8000');
                            $('button.btn').text('设置').removeProp('disabled').removeClass('disabled');
                            $('button.btn').attr("disabledSubmit",'');
                        }else{
                            admin.countdown(3);
                            admin.alert('操作提示', '系统设置成功!'+'<div>程序将在<b style="color:red;" id="second_show">03秒</b>后为你跳转！</div>', 1, '3000');
                            setTimeout(function () {
                                window.location.href = usermanage;
                            }, 3000);
                        }
                    },
                    error: function(data){
                        layer.close(layer.load(1));
                        admin.alert('提示信息',data.responseText,1,'3000');
                    }
                });
            }
        });
    });
</script>
</html>