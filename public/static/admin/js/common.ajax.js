/**
 * Created by iteny on 2016/5/15.
 */
$(function(){
    $('button.ajax-sort').on('click', function (e) {
        e.preventDefault();
        //alert('111');
        var btn = $(this),
            form = btn.parents('form[name=commonSort]');
        if(btn.attr("disabledSubmit")){
            btn.text('请勿重复提交...').prop('disabled', true).addClass('disabled');
            return false;
        }
        btn.attr("disabledSubmit",true);
        var param = form.serialize();
        $.ajax({
            url: form.attr('action'),
            dataType:'json',
            type:'POST',
            data:param,
            beforeSend: function(){
                myload = layer.load(0,{time:3*1000});
            },
            success: function(data){
                layer.close(layer.load(1));
                if(!data.status){
                    admin.alert('提示信息',data.info,2,'3000');
                } else {
                    admin.alert('提示信息',data.info,1,'3000');
                    setTimeout(function(){
                        admin.reloadPage();
                    },3000);
                }
            },
            //error: function(data){
            //    layer.close(layer.load(1));
            //    admin.alert('提示信息',data.responseText,1,'3000');
            //}
        });
    });
});