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
                    <td><input type="password" class="input length_5" name="password" id="password" value=""></td>
                </tr>
                <tr>
                    <td>确认密码:</td>
                    <td><input type="password" class="input length_5" name="passworded" id="passworded" value=""></td>
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
    var usermanage = '/admin/Site/user';
    var checkAddUsername = '/admin/SiteCom/checkAddUsername';
    var checkAddNickname = '/admin/SiteCom/checkAddNickname';
    var checkAddEmail = '/admin/SiteCom/checkAddEmail';
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
        $('form[name=addUser]').validate({
            errorElement : 'span',
            validClass: "success",	//非常重要
            success : function (label) {
                label.addClass('success');
            },
            rules : {
                username : {
                    required : true,
                    username : true,
                    remote : {
                        url : checkAddUsername,
                        type : 'post',
                        dataType : 'json',
                        data : {
                            username : function(){
                                return $('#username').val();
                            }
                        }
                    }
                },
                nickname : {
                    required : true,
                    rangelength : [2,6],
                    chinaese : true,
                    remote : {
                        url : checkAddNickname,
                        type : 'post',
                        dataType : 'json',
                        data : {
                            nickname : function(){
                                return $('#nickname').val();
                            }
                        }
                    }
                },
                password : {
                    required : true,
                    password : true
                },
                passworded : {
                    required : true,
                    equalTo : "#password"
                },
                email : {
                    required : true,
                    email : true,
                    remote : {
                        url : checkAddEmail,
                        type : 'post',
                        dataType : 'json',
                        data : {
                            email : function(){
                                return $('#email').val();
                            }
                        }
                    }
                },

            },
            messages : {
                username : {
                    required : "请输入用户名",
                    remote : '用户名已存在'
                },

                nickname : {
                    required : '请填写您的昵称',
                    rangelength : '昵称在2-12个字之间',
                    remote : '昵称已存在'
                },
                password : {
                    required : "请输入密码"
                },
                passworded : {
                    required : '请确认密码',
                    equalTo : '两次密码不一致'
                },
                email : {
                    required : "请输入email",
                    email: "email格式错误",
                    remote : '邮箱已存在'
                },
            },
            submitHandler: function(form)
            {
                if($('button.btn').attr("disabledSubmit")){
                    $('button.btn').text('请勿重复提交...').prop('disabled', true).addClass('disabled');
                    return false;
                }
                $('button.btn').attr("disabledSubmit",true);
                var param = $('form[name=addUser]').serialize();
                $.ajax({
                    url: $('form[name=addUser]').attr('action'),
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
                            admin.alert('操作提示', '添加用户成功!'+'<div>程序将在<b style="color:red;" id="second_show">03秒</b>后为你跳转！</div>', 1, '3000');
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