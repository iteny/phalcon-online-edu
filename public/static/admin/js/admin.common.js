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
                time: 113000,
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
            layer.alert(msg, {
                icon: icon,
                title: title,
                time: timeout,
                // offset: 'rb',
                offset: '0px',
                shift: 2,
                shade: 0,
                btn: ['我明白了']
            });
        }
    }
});