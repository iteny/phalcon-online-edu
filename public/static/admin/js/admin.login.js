/**
 * Created by iteny on 2016/5/3.
 */
function keyLogin(){
    if (event.keyCode==13)
        document.getElementById("loginsubmit").click();

}
//刷新验证码
function refreshs(){
    document.getElementById('code_img').src=verifycode+'?time='+Math.random();void(0);
    document.getElementById("verify").value="";
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
                    myload = layer.load(0,{time:3*1000});
                },
                success: function(msg){
                    if(msg.status === 1){
                        admin.success(msg.info,'#loginsubmit');
                        setTimeout(function(){window.location.href=redirect}, 3000);
                    }else{
                        layer.close(myload);
                        admin.error(msg.info,'#loginsubmit');
                        formLogin.attr("disabledSubmit",'');
                        refreshs();

                    }
                    key = msg.key;
                    token = msg.token;
                },
                error: function(XMLHttpRequest, textStatus, errorThrown){
                    admin.error('网络连接异常！','#loginsubmit');
                    return false;
                }
            });

        }
    });

});
