<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>添加用户组</title>
    <link href="/static/admin/css/frame.css" rel="stylesheet">
</head>
<body>
<div id="frame-top">
    当前位置&nbsp;<i class="iconfont" style="color:#666;font-size: 12px;">&#xe60e;</i>&nbsp;&nbsp;设置&nbsp;&nbsp;<i class="iconfont" style="color:#666;font-size: 12px;">&#xe60f;</i>&nbsp;&nbsp;用户设置&nbsp;&nbsp;<i class="iconfont" style="color:#666;font-size: 12px;">&#xe60f;</i>&nbsp;&nbsp;修改用户组
</div>
<div id="frame-toolbar">
    <ul>
        <li><a href="/admin/Site/group"><i class="iconfont" style="color:white;font-size: 16px;">&#xe611;</i>&nbsp;&nbsp;用户组管理</a></li>
        <li><a href="/admin/Site/addEditGroup"><i class="iconfont" style="color:white;font-size: 16px;">&#xe610;</i>&nbsp;&nbsp;添加用户组</a></li>
    </ul>
</div>
<div id="frame-content">
    <form name="editGroup" method="post" class="J_ajaxForm" action="/admin/Site/addEditGroup" novalidate="novalidate">
        <input type="hidden" name="addEditGroup" value="addEditGroup">
        <input type="hidden" name="id" value="<?php echo $thisgroup['id']; ?>">
        <div class="frame-table-list">
            <div class="input-title">用户组信息</div>
            <table cellpadding="0" cellspacing="0" class="table_form" width="100%">
                <tbody>
                <tr>
                    <td width="140">用户组名称:</td>
                    <td><input type="text" class="input length_5" name="title" value="<?php echo $thisgroup['title']; ?>" id="title"></td>
                </tr>
                <tr>
                    <td>用户组排序:</td>
                    <td><input type="text" class="input length_5" name="sort" id="sort" value="<?php echo $thisgroup['sort']; ?>"></td>
                </tr>
                <tr>
                    <td>用户组英文名:</td>
                    <td><input type="text" class="input length_5" name="role" id="role" value="<?php echo $thisgroup['role']; ?>">&nbsp;&nbsp;&nbsp;非常重要必须填写</td>
                </tr>
                <tr>
                    <td>是否启用:</td>
                    <td>
                        <input type="radio" name="status" value="1" <?php if ($thisgroup['status'] == 1) { ?>checked<?php } ?>>启用<label>  &nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="radio" name="status" value="0" <?php if ($thisgroup['status'] == 0) { ?>checked<?php } ?>>禁止</label></td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="frame-table-btn">
            <button class="btn ajax-add" type="submit">添加</button>
        </div>
    </form>
</div>
</body>
<script>
    var groupmanage = '/admin/Site/group';
    var checkEditGtitle = '/admin/SiteCom/checkEditGtitle/?id='+<?php echo $thisgroup['id']; ?>;
    var checkEditGrole = '/admin/SiteCom/checkEditGrole/?id='+<?php echo $thisgroup['id']; ?>;
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
        $('form[name=editGroup]').validate({
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
                        url : checkEditGtitle,
                        type : 'post',
                        dataType : 'json',
                        data : {
                            name : function(){
                                return $('#title').val();
                            }
                        }
                    }
                },
                role : {
                    required : true,
                    english : true,
                    remote : {
                        url : checkEditGrole,
                        type : 'post',
                        dataType : 'json',
                        data : {
                            name : function(){
                                return $('#role').val();
                            }
                        }
                    }
                },
                sort : {
                    required : true,
                    digits : true
                }
            },
            messages : {
                title : {
                    required : "请输入用户组名称",
                    remote : '用户组名称已存在'
                },
                role : {
                    required : "请输入用户组英文名称",
                    remote : '用户组英文名称已存在'
                },
                sort : {
                    required : "请输入排序号",
                    digits : '请输入整数'
                }
            },
            submitHandler: function(form)
            {
                if($('button.btn').attr("disabledSubmit")){
                    $('button.btn').text('请勿重复提交...').prop('disabled', true).addClass('disabled');
                    return false;
                }
                $('button.btn').attr("disabledSubmit",true);
                var param = $('form[name=editGroup]').serialize();
                $.ajax({
                    url: $('form[name=editGroup]').attr('action'),
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
                            $('button.btn').text('添加').removeProp('disabled').removeClass('disabled');
                            $('button.btn').attr("disabledSubmit",'');
                        }else{
                            admin.countdown(3);
                            admin.alert('操作提示', '修改用户组成功!'+'<div>程序将在<b style="color:red;" id="second_show">03秒</b>后为你跳转！</div>', 1, '3000');
                            setTimeout(function () {
                                window.location.href = groupmanage;
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