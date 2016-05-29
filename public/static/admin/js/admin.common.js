/**
 * Created by iteny on 2016/4/26.
 */
$(function(){
    admin =
    {
        /**
         * 右侧错误提示
         * @param info 错误信息
         * @param id 标签的ID
         */
        error:function (info,id)
        {
            layer.tips(info,id, {
                tips: [2, '#ff6347'],
                time: 3000,
            });
        },
        success:function (info,id)
        {
            layer.tips(info,id, {
                tips: [2, '#398439'],
                time: 3000,
            });
        },
        alert: function(title,msg,icon,timeout,showType){//右下角提示框
            layer.alert(msg+'<div>程序将在<b style="color:red;" id="second_show">03秒</b>后为你跳转！</div>', {
                icon: icon,
                title: title,
                time: timeout,
                // offset: 'rb',
                offset: '0px',
                shift: 2,
                shade: 0,
                btn: ['我明白了']
            });
        },
        reloadPage: function(){
            window.location.reload();
        },
        countdown: function(intDiff){
            window.setInterval(function(){
                var day=0,
                    hour=0,
                    minute=0,
                    second=0;//时间默认值
                if(intDiff > 0){
                    day = Math.floor(intDiff / (60 * 60 * 24));
                    hour = Math.floor(intDiff / (60 * 60)) - (day * 24);
                    minute = Math.floor(intDiff / 60) - (day * 24 * 60) - (hour * 60);
                    second = Math.floor(intDiff) - (day * 24 * 60 * 60) - (hour * 60 * 60) - (minute * 60);
                }
                if (minute <= 9) minute = '0' + minute;
                if (second <= 9) second = '0' + second;
                $('#day_show').html(day+"天");
                $('#hour_show').html('<s id="h"></s>'+hour+'时');
                $('#minute_show').html('<s></s>'+minute+'分');
                $('#second_show').html('<s></s>'+second+'秒');
                intDiff--;
            }, 1000);
        }
    }
});