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
            <li class="action"><a href="inbox.html" title="Messages">用户中心</a></li>
            <li class=""><a href="inbox.html" title="Messages">用户中心</a></li>
            <li class=""><a href="inbox.html" title="Messages">用户中心</a></li>
            <li class=""><a href="inbox.html" title="Messages">用户中心</a></li>
            </ul>
        </div>
    </div>
    <div id="hmLeft" class="max" style="height: 100%;">
        <div id="menu">
            <div class="click active"><a href=""></a><i class="iconfont" style="color:white;font-size: 18px;">&#xe606;</i></div>
            <div data-collapse>
                <h2 style="position: relative;" class="open west" title="Listen!"><i class="tou iconfont" style="color:white;font-size: 18px;"></i><em>管理首页</em><i class="iconfont" style="color:white;font-size: 12px;position: relative;right: -55px;">&#xe605;</i></h2>
                <ul>
                    <li><a class="west" href="/admin/asdf/index" target="rightFrame" title="撒旦发射!"><i class="iconfont" style="color:white;font-size: 16px;">&#xe600;</i><em>系统设置</em></a></li>
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
    });
</script>
</html>