<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>后台管理</title>
    {{ assets.outputCss('css') }}
</head>
<body>
<div id="hmFrame">
    <div id="hmHead">
        <div class="logo">
            <a href="/Intendant/Index/index" title="管理中心" class="logo"><img src="/static/admin/img/index-logo.png" style="width:100px; height:40px;display:inline-block;"></a>
        </div>
        <div class="nav">
            <ul id="access" class="children-tooltip">
            <!--<li class="action"><a href="inbox.html" title="Messages">用户中心</a></li>-->
            <!--<li class=""><a href="inbox.html" title="Messages">用户中心</a></li>-->
            <!--<li class=""><a href="inbox.html" title="Messages">用户中心</a></li>-->
            <!--<li class=""><a href="inbox.html" title="Messages">用户中心</a></li>-->
                {% for topnav in topNav %}
                <li class=""><a class="top-nav" data-id="{{topnav.id}}" href="javascript:void(0);" title="{{topnav.name}}">{{topnav.name}}</a></li>
                {% endfor %}
            </ul>
        </div>
    </div>
    <div id="hmLeft" class="max" style="height: 100%;">
        <div id="menu">
            <div class="click active"><a href=""></a><i class="iconfont" style="color:white;font-size: 18px;">&#xe606;</i></div>
            <div id="left-menu">
                <div data-collapse>
                    <h2 style="position: relative;" class="open west" title="Listen!"><i class="tou iconfont" style="color:white;font-size: 18px;"></i><em>管理首页</em><i class="iconfont" style="color:white;font-size: 12px;position: relative;right: -55px;">&#xe605;</i></h2>
                    <ul>
                        <li><a class="west" href="/admin/asdf/index" target="rightFrame" title="系统设置"><i class="iconfont" style="color:white;font-size: 16px;">&#xe600;</i><em>系统设置</em></a></li>
                        <li><a href="show.php"><i class="iconfont" style="color:white;font-size: 16px;">&#xe600;</i><em>首页幻灯广告</em></a></li>
                        <li><a href="show.php"><i class="iconfont" style="color:white;font-size: 16px;">&#xe600;</i><em>首页幻灯广告</em></a></li>
                        <li><a href="page.php"><i class="iconfont" style="color:white;font-size: 16px;">&#xe600;</i><em>单页面管理</em></a></li>
                    </ul>
                </div>
                <div data-collapse>
                    <h2 class="open"><i class="tou iconfont" style="color:white;font-size: 18px;"></i><em>管理首页</em><i class="iconfont" style="color:white;font-size: 12px;position: relative;right: -55px;">&#xe605;</i></h2>
                    <ul>
                        <li><a href="nav.php"><i class="iconfont" style="color:white;font-size: 16px;">&#xe600;</i><em>系统设置</em></a></li>
                        <li><a href="nav.php"><i class="iconfont" style="color:white;font-size: 16px;">&#xe600;</i><em>自定义导航栏</em></a></li>
                        <li><a href="show.php"><i class="iconfont" style="color:white;font-size: 16px;">&#xe600;</i><em>首页幻灯广告</em></a></li>
                        <li><a href="page.php"><i class="iconfont" style="color:white;font-size: 16px;">&#xe600;</i><em>单页面管理</em></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div id="hmRight">
        <div class="options">
            <a href="" id="J_refresh" class="bsn refresh" title="刷新" style="border-right: 1px solid #ccc;"><i class="iconfont" style="color:white;font-size: 18px;">&#xe608;</i></a>
            <a href="" id="J_fullScreen" class="bsn full_screen active" title="最大化/最小化"><i class="iconfont" style="color:white;font-size: 18px;">&#xe609;</i></a>
        </div>
        <iframe name="rightFrame" id="iframe_default" src="/admin/login/index" style="height: 100%; width: 100%;display:block;" data-id="default" frameborder="0" scrolling="auto"></iframe>
    </div>
    <div id="hmFooter"></div>
</div>


</body>
<script src="/static/common/js/jquery/jquery-1.12.3.min.js"></script>
<script src="/static/common/js/collapse/json2.js"></script>
<script src="/static/common/js/collapse/jquery.collapse.js"></script>
<script src="/static/common/js/collapse/jquery.collapse_storage.js"></script>
<script src="/static/common/js/collapse/jquery.collapse_cookie_storage.js"></script>
<script src="/static/common/js/poshytip/src/jquery.poshytip.min.js"></script>

<script>
    var getLeftMenu = '/admin/index/getLeftMenu';
    $(function(){
        $('h2').click(function(){
            if($(this).attr('aria-expanded') == 'true'){
                $(this).find('i.tou').html('&#xe603;');
            }
            if($(this).attr('aria-expanded') == 'false'){
                $(this).find('i.tou').html('&#xe604;');
            }
        });
        $('#hmLeft').attr('style','height:'+($(window).height()-$('#hmHead').height())+'px;');
        $('#hmRight').attr('style','height:'+($(window).height()-$('#hmHead').height())+'px;');
        if($('h2').attr('aria-expanded') == 'true'){
            $('i.tou').html('&#xe604;');
        }
        if($('h2').attr('aria-expanded') == 'false'){
            $('i.tou').html('&#xe603;');
        }
        $('.max div.click').click(function(){
            if($(this).hasClass("active")){
                $(this).removeClass("active");
                $('.max').attr('style','height:'+($(window).height()-$('#hmHead').height())+'px;display:none;')
                $('.max').attr('style','height:'+($(window).height()-$('#hmHead').height())+'px;display:block;width:50px;')
                $('#hmRight').attr('style','height:'+($(window).height()-$('#hmHead').height())+'px;margin-left: 51px');

            }else{
                $(this).addClass("active");
                $('.max').attr('style','height:'+($(window).height()-$('#hmHead').height())+'px;display:none;')
                $('.max').attr('style','height:'+($(window).height()-$('#hmHead').height())+'px;display:block;width:180px;')
                $('#hmRight').attr('style','height:'+($(window).height()-$('#hmHead').height())+'px;margin-left: 181px');
            }
        });
        $('.west').poshytip({
            className: 'tip-darkgray',
            alignTo: 'target',
            alignX: 'right',
            alignY: 'center',
            offsetX: 10,
            showTimeout: 100
        });
        $('.bsn').poshytip({
            className: 'tip-darkgray',
            alignTo: 'target',
            alignX: 'left',
            alignY: 'center',
            offsetX: 5,
            showTimeout: 100
        });
        $('#left-menu').on("mouseover mouseout",'a.west',function(event){
            if(event.type == "mouseover"){
                //鼠标悬浮
                alert('111');
            }else if(event.type == "mouseout"){
                //鼠标离开
                alert('222');
            }
        })
        //刷新
        $('#J_refresh').click(function (e) {
            e.preventDefault();
            e.stopPropagation();
            document.getElementById('iframe_default').contentWindow.location.reload(true);
        });
        //最大化/最小化
        $('#J_fullScreen').click(function (e) {
            e.preventDefault();
            e.stopPropagation();
            if($(this).hasClass("active")){
                $(this).removeClass("active");
                $("#hmRight").attr('style','height:100%;width:100%;position: fixed;top:0;left:0;margin-left:0;');
                $('.options').attr('style','top:15px;');
            }else{
                var hmhei = $('#hmLeft').width()+1;
                $(this).addClass("active");
                $("#hmRight").attr('style','margin-left:'+hmhei+'px;height:'+($(window).height()-$('#hmHead').height())+'px;');
                $('.options').attr('style','top:55px;');
            }
        });

        //获取左侧菜单
        $(".top-nav").click(function(e) {
//             alert('111');
//            ITENY.iframe_height();
            if($(this).parent('li').attr("class") == "action"){
                return false;
            }
            $('#access li').removeClass('action');
            $(this).parent('li').addClass('action');
//            alert($(this).attr("data-id"));
//            return false;
            $.ajax({
                type: 'POST',
                url: getLeftMenu,
                data: 'pid='+$(this).attr("data-id"),
                dataType: 'json',
                beforeSend: function(){
                    $('#left-menu').html('<h2 style="position: relative;" class="open west" title="菜单加载中...!"><i class="tou iconfont" style="color:#FFD700;font-size: 16px;">&#xe60b;</i><em style="color:#FFD700;">菜单加载中...!</em></h2>');
                },
                success: function(data){
                    $('#left-menu').html('');
                    var count = data.length;
                    for(var i=0; i<count; i++)
                    {
                        $('#left-menu').append('<h2 style="position: relative;" class="open west" title="'+data[i]['name']+'"><i class="tou iconfont" style="color:white;font-size: 18px;">&#xe604;</i><em>'+data[i]['name']+'</em><i class="iconfont" style="color:white;font-size: 12px;position: relative;right: -55px;">&#xe605;</i></h2>');
//                        $('#left-menu').append("<dt><span data-id='7Admin'><i class='icon "+data[i]['icon']+"'></i>"+data[i]['text']+"</span></dt><dd style='display: block;' class="+data[i]['id']+"><ul></ul></dd>");
                        var icount = data[i]['children'].length;
                         $('#left-menu').append("<ul>");
                        for(var s=0; s<icount; s++)
                        {
                            var thdizhi = '/admin/'+data[i]['children'][s]['controller']+'/'+data[i]['children'][s]['action'];
                            $('#left-menu').append('<li><a class="west" href="'+thdizhi+'" target="rightFrame" title="撒旦发射!"><i class="iconfont" style="color:white;font-size: 16px;">&#xe600;</i><em>'+data[i]['children'][s]['name']+'</em></a></li>');
//                            $('#B_menubar dd.'+data[i]['id']+' ul').append("<li><a href='"+data[i]['children'][s]['url']+"' data-top-id="+topid+" data-id='"+data[i]['children'][s]['id']+"'><i class='icon "+data[i]['children'][s]['icon']+"'></i>"+data[i]['children'][s]['text']+"</a></li>");
                            // alert(data[i]['children'][s]['text']);
                        }
                         $('#left-menu').append("</ul>");
                    }
                },
                error: function(){
                    $('#left-menu').html('<h2 style="position: relative;" class="open west" title="菜单加载失败...!"><i class="tou iconfont" style="color:red;font-size: 16px;">&#xe60b;</i><em style="color:red;">菜单加载失败...!</em></h2>');
                }
            });


        });
        $('.top-nav').eq(0).click();
    });
</script>
</html>