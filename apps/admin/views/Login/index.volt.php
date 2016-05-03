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
<script>
    var verifycode = '/admin/login/verify';
    var key = "<?php echo $this->security->getTokenKey();?>";
    var token = "<?php echo $this->security->getToken();?>";
    var redirect = '/admin/index/index';
    var myload = '';
</script>
<?php echo $this->assets->outputJs('js'); ?>

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