<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>后台登录</title>
    <?php echo $this->assets->outputCss('css'); ?>

</head>
<body onkeydown="keyLogin();">
<div id="container">
    <div id="login-logo">
        <h1 class="login-logo-image">logo</h1>
    </div>
    <form method="post" action="/admin/login/doLogin" id="form-login">
        <ul class="inputs black-input large">
            <!-- The autocomplete="off" attributes is the only way to prevent webkit browsers from filling the inputs with yellow -->
            <li id="userli"><i class="iconfont" style="font-size: 24px;margin-right: 10px;">&#xe600;</i><input type="text" name="username" id="username" value="" class="input-unstyled" placeholder="用户名" autocomplete="off"></li>
            <li id="passli"><i class="iconfont" style="font-size: 24px;margin-right: 10px;">&#xe601;</i><input type="password" name="password" id="password" value="" class="input-unstyled" placeholder="密码" autocomplete="off"></li>
            <li id="verifyli"><i class="iconfont" style="font-size: 24px;margin-right: 10px;">&#xe602;</i><input style="width:180px" type="text" name="verify" id="verify" value="" class="input-unstyled" placeholder="验证码" autocomplete="off">
                <div class="yanzhengma_box" id="verifyshow"> <img class="yanzheng_img" id="code_img" src="/admin/login/verify"  width="180" height="80" onclick="refreshs()"></div>
            </li>
        </ul>

        <button type="submit" class="button glossy full-width huge" id="loginsubmit">登录</button>
    </form>
</div>
</body>
<?php echo $this->assets->outputJs('js'); ?>
<script>
    var verifycode = '/admin/login/verify';
    var key = "<?php echo $this->security->getTokenKey();?>";
    var token = "<?php echo $this->security->getToken();?>";
    function keyLogin(){
        if (event.keyCode==13)
            document.getElementById("loginsubmit").click();

    }
    //刷新验证码
    function refreshs(){
        document.getElementById('code_img').src=verifycode+'?time='+Math.random();void(0);
    }
    $(function(){
        $(":input").focus(function(){
            $(this).parents('.inputs').addClass("focus");
        }).blur(function(){
            $(this).parents('.inputs').removeClass("focus");
        });
        var formLogin = $('#form-login');
        formLogin.submit(function(e){
            var username = $.trim($('#username').val()),
                password = $.trim($('#password').val()),
                verify = $.trim($('#verify').val());
            if (username.length === 0)
            {
                admin.error('用户名不能为空','#userli');
                return false;
            }
            else if (password.length === 0)
            {
                admin.error('密码不能为空','#passli');
                return false;
            }
            else if (verify.length === 0)
            {
                admin.error('验证码不能为空','#verifyli');
                return false;
            }
            else
            {
                e.preventDefault();
                if(formLogin.attr("disabledSubmit")){
                    admin.error('请勿重复登录','#loginsubmit');
                    return false;
                }
                formLogin.attr("disabledSubmit",true);
                $.ajax({
                    type: 'post',
                    url: formLogin.attr('action'),
                    data : {'username':username,'password':password,'verify':verify,'key':key,'token':token},
                    dataType:"json",
                    beforeSend: function(){
//                        layer.load(1);
                    },
                    success: function(msg){
                        if(msg.status === 9){
                            admin.error(msg.info,'#loginsubmit');
                            formLogin.attr("disabledSubmit",'');
                        }else if(msg.status === 8){
                            admin.error(msg.info,'#loginsubmit');
                            formLogin.attr("disabledSubmit",'');
                        }else if(msg.status ===7){
                            admin.error(msg.info,'#loginsubmit');
                            formLogin.attr("disabledSubmit",'');
                        }else{
                            alert('111');
                        }
                        key = msg.key;
                        token = msg.token;
                    },
//                    error: function(XMLHttpRequest, textStatus, errorThrown){
//                        admin.error('网络连接异常！','#loginsubmit');
//                        return false;
//                    }
                });
//                $.post(,,function(msg){
//                        alert(msg.info);
//                    if(data.status=='9')
//                    {
//                        alert(data.info);
//                    }
//                    else if(data==6)
//                    {
//                        admin.error('帐号或密码格式错误','#loginsubmit');
//                        $("#verifycode").val('');
//                        document.getElementById('code_img').src=verifycode+'?time='+Math.random();void(0);
//                        $('#loginsubmit').attr("disabledSubmit",'');
//                    }
//                    else if(data==4)
//                    {
//                        admin.error('帐号或密码错误','#loginsubmit');
//                        $("#verifycode").val('');
//                        document.getElementById('code_img').src=verifycode+'?time='+Math.random();void(0);
//                        $('#loginsubmit').attr("disabledSubmit",'');
//                    }
//                    else if(data==5)
//                    {
//                        admin.error('该账户已被封禁','#username');
//                        $("#verifycode").val('');
//                        document.getElementById('code_img').src=verifycode+'?time='+Math.random();void(0);
//                        $('#loginsubmit').attr("disabledSubmit",'');
//                    }else if(data==7)
//                    {
//                        admin.error('该账户不存在','#username');
//                        $("#verifycode").val('');
//                        document.getElementById('code_img').src=verifycode+'?time='+Math.random();void(0);
//                        $('#loginsubmit').attr("disabledSubmit",'');
//                    }else if(data==1){
//                        admin.success('登录成功3秒后为你跳转！','#loginsubmit');
//                        setTimeout(function(){window.location.href=redirect}, 3000);
//                    }else{
//                        admin.error('未知错误请联系管理员','#loginsubmit');
//                        $("#verifycode").val('');
//                        document.getElementById('code_img').src=verifycode+'?time='+Math.random();void(0);
//                        $('#loginsubmit').attr("disabledSubmit",'');
//                    }

//                });
            }
        });

    });
</script>
<style>
    .layui-layer-tips .layui-layer-content{
        font-family: "Microsoft YaHei",SimSun,'\5b8b\4f53',sans-serif;
        padding: 20px 10px;
        line-height: 24px;
        font-size: 24px;
        font-weight:bold;
    }
    #verifyli{position: relative;}
    #verifyli .yanzhengma_box{position: absolute;top:2px;right: 2px;}
</style>
</html>