<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>添加用户</title>
    <link href="/static/admin/css/frame.css" rel="stylesheet">
</head>
<body>
<div id="frame-top">
    当前位置&nbsp;<i class="iconfont" style="color:#666;font-size: 12px;">&#xe60e;</i>&nbsp;&nbsp;设置&nbsp;&nbsp;<i class="iconfont" style="color:#666;font-size: 12px;">&#xe60f;</i>&nbsp;&nbsp;用户设置&nbsp;&nbsp;<i class="iconfont" style="color:#666;font-size: 12px;">&#xe60f;</i>&nbsp;&nbsp;添加用户
</div>
<div id="frame-toolbar">
    <ul>
        <li><a href="/admin/Site/user"><i class="iconfont" style="color:white;font-size: 16px;">&#xe611;</i>&nbsp;&nbsp;用户管理</a></li>
        <li><a class="active" href="/admin/Site/addEditUser"><i class="iconfont" style="color:white;font-size: 16px;">&#xe610;</i>&nbsp;&nbsp;添加用户</a></li>
    </ul>
</div>
<div id="frame-content">
    <form name="addUser" method="post" class="J_ajaxForm" action="/admin/Site/addEditUser" novalidate="novalidate">
        <input type="hidden" name="addEditUser" value="addEditUser">
        <div class="frame-table-list">
            <div class="input-title">用户信息</div>
            <table cellpadding="0" cellspacing="0" class="table_form" width="100%">
                <tbody>
                <tr>
                    <td width="140">用户名:</td>
                    <td><input type="text" class="input length_5" name="username" value="" id="username"></td>
                </tr>
                <tr>
                    <td>密码:</td>
                    <td><input type="text" class="input length_5" name="password" id="password" value=""></td>
                </tr>
                <tr>
                    <td>确认密码:</td>
                    <td><input type="text" class="input length_5" name="passworded" id="passworded" value=""></td>
                </tr>
                <tr>
                    <td width="140">昵称:</td>
                    <td><input type="text" class="input length_5" name="nickname" value="" id="nickname"></td>
                </tr>
                <tr>
                    <td width="140">E-Mail:</td>
                    <td><input type="text" class="input length_5" name="email" value="" id="email"></td>
                </tr>
                <tr>
                    <td>备注:</td>
                    <td><textarea name="remark" rows="2" cols="20" id="remark" class="inputtext" style="height:100px;width:300px;"></textarea></td>
                </tr>
                <tr>
                    <td>所属用户组</td>
                    <td>
                        <select name="group_id">
                            <?php foreach ($adminGroup as $group) { ?>
                                <option value="<?php echo $group->id; ?>" <?php if ($group->id == 2) { ?>selected<?php } ?>><?php echo $group->title; ?></option>
                            <?php } ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>是否启用:</td>
                    <td><input type="radio" name="status" value="1" checked>启用<label>  &nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="status" value="0">禁止</label></td>
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
    var checkAddGtitle = '/admin/SiteCom/checkAddGtitle';
    var checkAddGrole = '/admin/SiteCom/checkAddGrole';
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
        $('form[name=addGroup]').validate({
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
                        url : checkAddGtitle,
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
                        url : checkAddGrole,
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
                var param = $('form[name=addGroup]').serialize();
                $.ajax({
                    url: $('form[name=addGroup]').attr('action'),
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
                            admin.alert('操作提示', '添加用户组成功!'+'<div>程序将在<b style="color:red;" id="second_show">03秒</b>后为你跳转！</div>', 1, '3000');
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