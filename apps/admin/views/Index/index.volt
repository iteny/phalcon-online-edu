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
            <a href="/Intendant/Index/index" title="管理中心" class="logo"><img src="/static/admin/img/logo.png" style="width:180px; height:40px;display:inline-block;"></a>
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
            <div class="click"><a href=""></a><i class="iconfont" style="color:white;font-size: 18px;">&#xe606;</i></div>
            <div data-collapse>
                <h2 style="position: relative;" class="open"><i class="tou iconfont" style="color:white;font-size: 18px;"></i><em>管理首页</em><i class="iconfont" style="color:white;font-size: 12px;position: relative;right: -55px;">&#xe605;</i></h2>
                <ul>
                    <li><a href="/admin/asdf/index" target="rightFrame"><i class="iconfont" style="color:white;font-size: 16px;">&#xe600;</i><em>系统设置</em></a></li>
                    <li><a href="/admin/login/index" target="rightFrame"<i class="iconfont" style="color:white;font-size: 16px;">&#xe600;</i><em>自定义导航栏</em></a></li>
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
    <div id="hmLeft" class="min" style="display: none;">
        <div id="menu">
            <div class="click"><a href=""></a><i class="iconfont" style="color:white;font-size: 18px;">&#xe607;</i></div>
            <div data-collapse>
                <h2 style="position: relative;" class="open"><i class="tou iconfont" style="color:white;font-size: 18px;"></i><em>管理首页</em><i class="iconfont" style="color:white;font-size: 12px;position: relative;right: -55px;">&#xe605;</i></h2>
                <ul>
                    <li><a href="/admin/asdf/index" target="rightFrame"><i class="iconfont" style="color:white;font-size: 16px;">&#xe600;</i><em>系统设置</em></a></li>
                    <li><a href="/admin/login/index" target="rightFrame"<i class="iconfont" style="color:white;font-size: 16px;">&#xe600;</i><em>自定义导航栏</em></a></li>
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

        <iframe name="rightFrame" id="iframe_default" src="/admin/login/index" style="height: 100%; width: 100%;display:block;" data-id="default" frameborder="0" scrolling="auto"></iframe>
    </div>
    <div id="hmFooter"></div>
</div>
<!--<table width="100%" height="100%" style="table-layout:fixed;">-->
    <!--<tbody>-->
        <!--<tr class="head">-->
            <!--<th>-->
                <!--<a href="/Intendant/Index/index" title="管理中心" class="logo"><img src="/static/admin/img/logo.png" style="width:180px; height:60px;display:inline-block;"></a>-->
            <!--</th>-->
            <!--<td>-->
                <!--<ul id="access" class="children-tooltip">-->
                    <!--<li class=""><a href="inbox.html" title="Messages"><i class="iconfont" style="color:white;font-size: 100%;">&#xe600;</i><span class="content">用户中心</span></a></li>-->
                    <!--<li class=""><a href="inbox.html" title="Messages"><i class="iconfont" style="color:white;font-size: 100%;">&#xe600;</i><span class="content">用户中心</span></a></li>-->
                    <!--<li class=""><a href="inbox.html" title="Messages"><i class="iconfont" style="color:white;font-size: 100%;">&#xe600;</i><span class="content">用户中心</span></a></li>-->
                    <!--<li class=""><a href="inbox.html" title="Messages"><i class="iconfont" style="color:white;font-size: 100%;">&#xe600;</i><span class="content">用户中心</span></a></li>-->
                <!--</ul>-->
            <!--</td>-->
        <!--</tr>-->
        <!--<tr style="background: red;height: 200px;">-->
            <!--<th>asdf</th>-->
            <!--<td>asdfas</td>-->
        <!--</tr>-->
        <!--<tr class="content">-->
            <!--<th class="left" style="overflow:hidden;border-right: 2px solid #dedede;">-->
                <!--<div id="profile" style="position: absolute;top:62px;left: 0px;overflow:hidden;">-->
                    <!--<img src="img/user.png" width="64" height="64" alt="User name" class="user-icon">-->
                    <!--Hello-->
                    <!--<span class="name">John <b>Doe</b></span>-->
                <!--</div>-->
                <!--asdfasd-->
                <!--<div id="B_menunav" style="margin-top: 0px">-->
                    <!--<div class="menubar">-->
                        <!--<dl id="B_menubar" data-id="3Admin">-->
                            <!--<dt>-->
                                <!--<span data-id="7Admin"><i class="icon icons-user-user_add"></i>用户操作</span>-->
                            <!--</dt>-->
                            <!--<dd style="display: block;" class="4"><ul></ul></dd>-->
                            <!--<dt><span data-id="7Admin"><i class="icon icons-application-application_home"></i>内容管理</span></dt><dd style="display: block;" class="6"><ul><li><a href="/Intendant/Login/index" data-top-id="1" data-id="7"><i class="icon icons-application-application_home"></i>内容管理</a></li></ul></dd></dl>-->
                    <!--</div>-->
                    <!--<div id="menu_next" class="menuNext" style="display:none;"> <a href="" class="pre" title="顶部超出，点击向下滚动">向下滚动</a> <a href="" class="next" title="高度超出，点击向上滚动">向上滚动</a> </div>-->
                <!--</div>-->
            <!--</th>-->
            <!--<td id="B_frame" style="height: 1125px;">-->
                <!--<div class="options"> <a href="" class="refresh" id="J_refresh" title="刷新">刷新</a> <a href="" id="J_fullScreen" class="full_screen" title="全屏">全屏</a> </div>-->
                <!--&lt;!&ndash; <div class="loading" id="loading">加载中...</div> &ndash;&gt;-->
                <!--<iframe id="iframe_default" src="/Intendant/Index/home" style="height: 100%; width: 100%;display:block;" data-id="default" frameborder="0" scrolling="auto"></iframe></td>-->
        <!--</tr>-->
    <!--</tbody>-->
<!--</table>-->

</body>
<script src="/static/common/js/jquery/jquery-1.12.3.min.js"></script>
<script src="/static/common/js/collapse/json2.js"></script>
<script src="/static/common/js/collapse/jquery.collapse.js"></script>
<script src="/static/common/js/collapse/jquery.collapse_storage.js"></script>
<script src="/static/common/js/collapse/jquery.collapse_cookie_storage.js"></script>
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
            $('.max').attr('style','height:'+($(window).height()-$('#hmHead').height())+'px;display:none;')
            $('.min').attr('style','height:'+($(window).height()-$('#hmHead').height())+'px;display:block;width:50px;')
            $('#hmRight').attr('style','height:'+($(window).height()-$('#hmHead').height())+'px;margin-left: 51px');
        });
        $('.min div.click').click(function(){
            $('.min').attr('style','height:'+($(window).height()-$('#hmHead').height())+'px;display:none;')
            $('.max').attr('style','height:'+($(window).height()-$('#hmHead').height())+'px;display:block;width:180px;')
            $('#hmRight').attr('style','height:'+($(window).height()-$('#hmHead').height())+'px;margin-left: 181px');
        });

    });
</script>
</html>