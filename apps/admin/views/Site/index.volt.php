<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link href="/static/admin/css/frame.css" rel="stylesheet">
</head>
<body>
<div id="frame-top">
    当前位置&nbsp;<i class="iconfont" style="color:#666;font-size: 12px;">&#xe60e;</i>&nbsp;&nbsp;设置&nbsp;&nbsp;<i class="iconfont" style="color:#666;font-size: 12px;">&#xe60f;</i>&nbsp;&nbsp;站长设置&nbsp;&nbsp;<i class="iconfont" style="color:#666;font-size: 12px;">&#xe60f;</i>&nbsp;&nbsp;菜单设置
</div>
<div id="frame-toolbar">
    <ul>
        <li><a class="active" href="/admin/site/index">菜单设置</a></li>
        <li><a href="/admin/site/addMenu">添加菜单</a></li>
    </ul>
</div>
<div id="frame-content">
<form class="J_ajaxForm" action="/Intendant/Site/sortMenu" method="post">
    <div class="frame-table-list">
        <table width="100%">
            <colgroup>
                <col width="40">
                <col width="40">
                <col width="270">
                <col width="170">
                <!-- <col width="100">
                <col width="50"> -->
                <col width="80">
                <col width="160">
            </colgroup>
            <thead>
            <tr>
                <td align="center">排序</td>
                <td align="center">ID</td>
                <td align="left">菜单名称</td>
                <td align="center">菜单规则</td>
                <!--  <td align="center">条件</td> -->
                <!-- <td align="center">状态</td> -->
                <td align="center">是否显示</td>
                <td align="center">管理操作</td>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td align="center"><input style="text-align: center" name="sort[1]" type="text" size="3" value="1" class="input"></td>
                <td align="center">1</td>
                <td><span class="tree-icon tree-file icons-calendar-calculator_edit"></span><!-- <i class="org-2">1</i> -->用户中心</td>
                <td align="center">Index</td>
                <!-- <td></td>
                <td align="center"><span class="greens">显示</span></td> -->
                <td align="center"><span class="greens">显示</span></td>
                <td align="center"><a class="J_add" href="/Intendant/Site/addMenu/parentid/1" data="0">添加子菜单</a> | <a class="J_edit" href="/Intendant/Site/editMenu/id/1">修改</a> | <a class="J_ajax_del" datatitle="用户中心" href="/Intendant/Site/delMenu" data="1">删除</a> </td>
            </tr><tr>
                <td align="center"><input style="text-align: center" name="sort[4]" type="text" size="3" value="1" class="input"></td>
                <td align="center">4</td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="tree-icon tree-file icons-user-user_add"></span><!-- <i class="org-2">2</i> -->用户操作</td>
                <td align="center">Index/userOperate11</td>
                <!-- <td></td>
                <td align="center"><span class="greens">显示</span></td> -->
                <td align="center"><span class="greens">显示</span></td>
                <td align="center"><a class="J_add" href="/Intendant/Site/addMenu/parentid/4" data="1">添加子菜单</a> | <a class="J_edit" href="/Intendant/Site/editMenu/id/4">修改</a> | <a class="J_ajax_del" datatitle="用户操作" href="/Intendant/Site/delMenu" data="4">删除</a> </td>
            </tr><tr>
                <td align="center"><input style="text-align: center" name="sort[6]" type="text" size="3" value="2" class="input"></td>
                <td align="center">6</td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="tree-icon tree-file icons-application-application_home"></span><!-- <i class="org-2">2</i> -->内容管理</td>
                <td align="center">Index/index1</td>
                <!-- <td></td>
                <td align="center"><span class="greens">显示</span></td> -->
                <td align="center"><span class="greens">显示</span></td>
                <td align="center"><a class="J_add" href="/Intendant/Site/addMenu/parentid/6" data="1">添加子菜单</a> | <a class="J_edit" href="/Intendant/Site/editMenu/id/6">修改</a> | <a class="J_ajax_del" datatitle="内容管理" href="/Intendant/Site/delMenu" data="6">删除</a> </td>
            </tr><tr>
                <td align="center"><input style="text-align: center" name="sort[7]" type="text" size="3" value="1" class="input"></td>
                <td align="center">7</td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="tree-icon tree-file icons-application-application_home"></span><!-- <i class="org-2">3</i> -->内容管理</td>
                <td align="center">Login/index</td>
                <!-- <td></td>
                <td align="center"><span class="greens">显示</span></td> -->
                <td align="center"><span class="greens">显示</span></td>
                <td align="center"><a class="J_add" href="/Intendant/Site/addMenu/parentid/7" data="2">添加子菜单</a> | <a class="J_edit" href="/Intendant/Site/editMenu/id/7">修改</a> | <a class="J_ajax_del" datatitle="内容管理" href="/Intendant/Site/delMenu" data="7">删除</a> </td>
            </tr><tr>
                <td align="center"><input style="text-align: center" name="sort[2]" type="text" size="3" value="2" class="input"></td>
                <td align="center">2</td>
                <td><span class="tree-icon tree-file icons-calendar-calendar_add"></span><!-- <i class="org-2">1</i> -->设置</td>
                <td align="center">设置</td>
                <!-- <td></td>
                <td align="center"><span class="greens">显示</span></td> -->
                <td align="center"><span class="greens">显示</span></td>
                <td align="center"><a class="J_add" href="/Intendant/Site/addMenu/parentid/2" data="0">添加子菜单</a> | <a class="J_edit" href="/Intendant/Site/editMenu/id/2">修改</a> | <a class="J_ajax_del" datatitle="设置" href="/Intendant/Site/delMenu" data="2">删除</a> </td>
            </tr><tr>
                <td align="center"><input style="text-align: center" name="sort[8]" type="text" size="3" value="1" class="input"></td>
                <td align="center">8</td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="tree-icon tree-file icons-user-user_gray"></span><!-- <i class="org-2">2</i> -->站长设置</td>
                <td align="center">System/zhanzhang</td>
                <!-- <td></td>
                <td align="center"><span class="greens">显示</span></td> -->
                <td align="center"><span class="greens">显示</span></td>
                <td align="center"><a class="J_add" href="/Intendant/Site/addMenu/parentid/8" data="1">添加子菜单</a> | <a class="J_edit" href="/Intendant/Site/editMenu/id/8">修改</a> | <a class="J_ajax_del" datatitle="站长设置" href="/Intendant/Site/delMenu" data="8">删除</a> </td>
            </tr><tr>
                <td align="center"><input style="text-align: center" name="sort[9]" type="text" size="3" value="1" class="input"></td>
                <td align="center">9</td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="tree-icon tree-file icons-other-cog_go"></span><!-- <i class="org-2">3</i> -->系统配置</td>
                <td align="center">Site/config</td>
                <!-- <td></td>
                <td align="center"><span class="greens">显示</span></td> -->
                <td align="center"><span class="greens">显示</span></td>
                <td align="center"><a class="J_add" href="/Intendant/Site/addMenu/parentid/9" data="2">添加子菜单</a> | <a class="J_edit" href="/Intendant/Site/editMenu/id/9">修改</a> | <a class="J_ajax_del" datatitle="系统配置" href="/Intendant/Site/delMenu" data="9">删除</a> </td>
            </tr><tr>
                <td align="center"><input style="text-align: center" name="sort[70]" type="text" size="3" value="1" class="input"></td>
                <td align="center">70</td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="tree-icon tree-file icons-other-cog"></span><!-- <i class="org-2">4</i> -->更新配置</td>
                <td align="center">Site/setconfig</td>
                <!-- <td></td>
                <td align="center"><span class="greens">显示</span></td> -->
                <td align="center"><span class="greens">显示</span></td>
                <td align="center"><a class="J_add" href="/Intendant/Site/addMenu/parentid/70" data="3">添加子菜单</a> | <a class="J_edit" href="/Intendant/Site/editMenu/id/70">修改</a> | <a class="J_ajax_del" datatitle="更新配置" href="/Intendant/Site/delMenu" data="70">删除</a> </td>
            </tr><tr>
                <td align="center"><input style="text-align: center" name="sort[71]" type="text" size="3" value="2" class="input"></td>
                <td align="center">71</td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="tree-icon tree-file icons-other-cog"></span><!-- <i class="org-2">4</i> -->生成前台配置</td>
                <td align="center">System/writeQian</td>
                <!-- <td></td>
                <td align="center"><span class="greens">显示</span></td> -->
                <td align="center"><span class="greens">显示</span></td>
                <td align="center"><a class="J_add" href="/Intendant/Site/addMenu/parentid/71" data="3">添加子菜单</a> | <a class="J_edit" href="/Intendant/Site/editMenu/id/71">修改</a> | <a class="J_ajax_del" datatitle="生成前台配置" href="/Intendant/Site/delMenu" data="71">删除</a> </td>
            </tr><tr>
                <td align="center"><input style="text-align: center" name="sort[72]" type="text" size="3" value="3" class="input"></td>
                <td align="center">72</td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="tree-icon tree-file icons-other-cog"></span><!-- <i class="org-2">4</i> -->生成后台配置</td>
                <td align="center">System/writeHou</td>
                <!-- <td></td>
                <td align="center"><span class="greens">显示</span></td> -->
                <td align="center"><span class="greens">显示</span></td>
                <td align="center"><a class="J_add" href="/Intendant/Site/addMenu/parentid/72" data="3">添加子菜单</a> | <a class="J_edit" href="/Intendant/Site/editMenu/id/72">修改</a> | <a class="J_ajax_del" datatitle="生成后台配置" href="/Intendant/Site/delMenu" data="72">删除</a> </td>
            </tr><tr>
                <td align="center"><input style="text-align: center" name="sort[10]" type="text" size="3" value="2" class="input"></td>
                <td align="center">10</td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="tree-icon tree-file icons-camera-camera"></span><!-- <i class="org-2">3</i> -->菜单设置</td>
                <td align="center">Site/menu</td>
                <!-- <td></td>
                <td align="center"><span class="greens">显示</span></td> -->
                <td align="center"><span class="greens">显示</span></td>
                <td align="center"><a class="J_add" href="/Intendant/Site/addMenu/parentid/10" data="2">添加子菜单</a> | <a class="J_edit" href="/Intendant/Site/editMenu/id/10">修改</a> | <a class="J_ajax_del" datatitle="菜单设置" href="/Intendant/Site/delMenu" data="10">删除</a> </td>
            </tr><tr>
                <td align="center"><input style="text-align: center" name="sort[32]" type="text" size="3" value="1" class="input"></td>
                <td align="center">32</td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="tree-icon tree-file icons-script-script_add"></span><!-- <i class="org-2">4</i> -->添加菜单</td>
                <td align="center">Site/addMenu</td>
                <!-- <td></td>
                <td align="center"><span class="greens">显示</span></td> -->
                <td align="center"><span class="greens">显示</span></td>
                <td align="center"><a class="J_add" href="/Intendant/Site/addMenu/parentid/32" data="3">添加子菜单</a> | <a class="J_edit" href="/Intendant/Site/editMenu/id/32">修改</a> | <a class="J_ajax_del" datatitle="添加菜单" href="/Intendant/Site/delMenu" data="32">删除</a> </td>
            </tr><tr>
                <td align="center"><input style="text-align: center" name="sort[33]" type="text" size="3" value="2" class="input"></td>
                <td align="center">33</td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="tree-icon tree-file icons-script-script_edit"></span><!-- <i class="org-2">4</i> -->修改菜单</td>
                <td align="center">Site/editMenu</td>
                <!-- <td></td>
                <td align="center"><span class="greens">显示</span></td> -->
                <td align="center"><span class="greens">显示</span></td>
                <td align="center"><a class="J_add" href="/Intendant/Site/addMenu/parentid/33" data="3">添加子菜单</a> | <a class="J_edit" href="/Intendant/Site/editMenu/id/33">修改</a> | <a class="J_ajax_del" datatitle="修改菜单" href="/Intendant/Site/delMenu" data="33">删除</a> </td>
            </tr><tr>
                <td align="center"><input style="text-align: center" name="sort[34]" type="text" size="3" value="3" class="input"></td>
                <td align="center">34</td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="tree-icon tree-file icons-script-script_delete"></span><!-- <i class="org-2">4</i> -->删除菜单</td>
                <td align="center">Site/delMenu</td>
                <!-- <td></td>
                <td align="center"><span class="greens">显示</span></td> -->
                <td align="center"><span class="greens">显示</span></td>
                <td align="center"><a class="J_add" href="/Intendant/Site/addMenu/parentid/34" data="3">添加子菜单</a> | <a class="J_edit" href="/Intendant/Site/editMenu/id/34">修改</a> | <a class="J_ajax_del" datatitle="删除菜单" href="/Intendant/Site/delMenu" data="34">删除</a> </td>
            </tr><tr>
                <td align="center"><input style="text-align: center" name="sort[35]" type="text" size="3" value="4" class="input"></td>
                <td align="center">35</td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="tree-icon tree-file icons-script-script_code"></span><!-- <i class="org-2">4</i> -->菜单排序</td>
                <td align="center">Site/sortMenu</td>
                <!-- <td></td>
                <td align="center"><span class="greens">显示</span></td> -->
                <td align="center"><span class="greens">显示</span></td>
                <td align="center"><a class="J_add" href="/Intendant/Site/addMenu/parentid/35" data="3">添加子菜单</a> | <a class="J_edit" href="/Intendant/Site/editMenu/id/35">修改</a> | <a class="J_ajax_del" datatitle="菜单排序" href="/Intendant/Site/delMenu" data="35">删除</a> </td>
            </tr><tr>
                <td align="center"><input style="text-align: center" name="sort[36]" type="text" size="3" value="5" class="input"></td>
                <td align="center">36</td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="tree-icon tree-file icons-script-script_go"></span><!-- <i class="org-2">4</i> -->导出菜单</td>
                <td align="center">System/exportMenu</td>
                <!-- <td></td>
                <td align="center"><span class="greens">显示</span></td> -->
                <td align="center"><span class="greens">显示</span></td>
                <td align="center"><a class="J_add" href="/Intendant/Site/addMenu/parentid/36" data="3">添加子菜单</a> | <a class="J_edit" href="/Intendant/Site/editMenu/id/36">修改</a> | <a class="J_ajax_del" datatitle="导出菜单" href="/Intendant/Site/delMenu" data="36">删除</a> </td>
            </tr><tr>
                <td align="center"><input style="text-align: center" name="sort[37]" type="text" size="3" value="6" class="input"></td>
                <td align="center">37</td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="tree-icon tree-file icons-script-script_key"></span><!-- <i class="org-2">4</i> -->导入菜单</td>
                <td align="center">System/importMenu</td>
                <!-- <td></td>
                <td align="center"><span class="greens">显示</span></td> -->
                <td align="center"><span class="greens">显示</span></td>
                <td align="center"><a class="J_add" href="/Intendant/Site/addMenu/parentid/37" data="3">添加子菜单</a> | <a class="J_edit" href="/Intendant/Site/editMenu/id/37">修改</a> | <a class="J_ajax_del" datatitle="导入菜单" href="/Intendant/Site/delMenu" data="37">删除</a> </td>
            </tr><tr>
                <td align="center"><input style="text-align: center" name="sort[45]" type="text" size="3" value="6" class="input"></td>
                <td align="center">45</td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="tree-icon tree-file icons-other-shape_flip_horizontal"></span><!-- <i class="org-2">3</i> -->后台首页管理</td>
                <td align="center">System/websiteHome</td>
                <!-- <td></td>
                <td align="center"><span class="greens">显示</span></td> -->
                <td align="center"><span class="greens">显示</span></td>
                <td align="center"><a class="J_add" href="/Intendant/Site/addMenu/parentid/45" data="2">添加子菜单</a> | <a class="J_edit" href="/Intendant/Site/editMenu/id/45">修改</a> | <a class="J_ajax_del" datatitle="后台首页管理" href="/Intendant/Site/delMenu" data="45">删除</a> </td>
            </tr><tr>
                <td align="center"><input style="text-align: center" name="sort[48]" type="text" size="3" value="1" class="input"></td>
                <td align="center">48</td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="tree-icon tree-file icons-application-application_form_add"></span><!-- <i class="org-2">4</i> -->添加版块</td>
                <td align="center">System/addWebsiteHome</td>
                <!-- <td></td>
                <td align="center"><span class="greens">显示</span></td> -->
                <td align="center"><span class="greens">显示</span></td>
                <td align="center"><a class="J_add" href="/Intendant/Site/addMenu/parentid/48" data="3">添加子菜单</a> | <a class="J_edit" href="/Intendant/Site/editMenu/id/48">修改</a> | <a class="J_ajax_del" datatitle="添加版块" href="/Intendant/Site/delMenu" data="48">删除</a> </td>
            </tr><tr>
                <td align="center"><input style="text-align: center" name="sort[49]" type="text" size="3" value="2" class="input"></td>
                <td align="center">49</td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="tree-icon tree-file icons-application-application_form_edit"></span><!-- <i class="org-2">4</i> -->修改版块</td>
                <td align="center">System/editWebsiteHome</td>
                <!-- <td></td>
                <td align="center"><span class="greens">显示</span></td> -->
                <td align="center"><span class="greens">显示</span></td>
                <td align="center"><a class="J_add" href="/Intendant/Site/addMenu/parentid/49" data="3">添加子菜单</a> | <a class="J_edit" href="/Intendant/Site/editMenu/id/49">修改</a> | <a class="J_ajax_del" datatitle="修改版块" href="/Intendant/Site/delMenu" data="49">删除</a> </td>
            </tr><tr>
                <td align="center"><input style="text-align: center" name="sort[50]" type="text" size="3" value="3" class="input"></td>
                <td align="center">50</td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="tree-icon tree-file icons-application-application_form_delete"></span><!-- <i class="org-2">4</i> -->删除版块</td>
                <td align="center">System/delWebsiteHome</td>
                <!-- <td></td>
                <td align="center"><span class="greens">显示</span></td> -->
                <td align="center"><span class="greens">显示</span></td>
                <td align="center"><a class="J_add" href="/Intendant/Site/addMenu/parentid/50" data="3">添加子菜单</a> | <a class="J_edit" href="/Intendant/Site/editMenu/id/50">修改</a> | <a class="J_ajax_del" datatitle="删除版块" href="/Intendant/Site/delMenu" data="50">删除</a> </td>
            </tr><tr>
                <td align="center"><input style="text-align: center" name="sort[51]" type="text" size="3" value="4" class="input"></td>
                <td align="center">51</td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="tree-icon tree-file icons-application-application_get"></span><!-- <i class="org-2">4</i> -->版块排序</td>
                <td align="center">System/sortWebsiteHome</td>
                <!-- <td></td>
                <td align="center"><span class="greens">显示</span></td> -->
                <td align="center"><span class="greens">显示</span></td>
                <td align="center"><a class="J_add" href="/Intendant/Site/addMenu/parentid/51" data="3">添加子菜单</a> | <a class="J_edit" href="/Intendant/Site/editMenu/id/51">修改</a> | <a class="J_ajax_del" datatitle="版块排序" href="/Intendant/Site/delMenu" data="51">删除</a> </td>
            </tr><tr>
                <td align="center"><input style="text-align: center" name="sort[46]" type="text" size="3" value="5" class="input"></td>
                <td align="center">46</td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="tree-icon tree-file icons-map-map"></span><!-- <i class="org-2">3</i> -->文件备份</td>
                <td align="center">System/fileBackup</td>
                <!-- <td></td>
                <td align="center"><span class="greens">显示</span></td> -->
                <td align="center"><span class="greens">显示</span></td>
                <td align="center"><a class="J_add" href="/Intendant/Site/addMenu/parentid/46" data="2">添加子菜单</a> | <a class="J_edit" href="/Intendant/Site/editMenu/id/46">修改</a> | <a class="J_ajax_del" datatitle="文件备份" href="/Intendant/Site/delMenu" data="46">删除</a> </td>
            </tr><tr>
                <td align="center"><input style="text-align: center" name="sort[59]" type="text" size="3" value="1" class="input"></td>
                <td align="center">59</td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="tree-icon tree-file icons-folder-folder_image"></span><!-- <i class="org-2">4</i> -->开始文件备份</td>
                <td align="center">System/zipFileBackup</td>
                <!-- <td></td>
                <td align="center"><span class="greens">显示</span></td> -->
                <td align="center"><span class="greens">显示</span></td>
                <td align="center"><a class="J_add" href="/Intendant/Site/addMenu/parentid/59" data="3">添加子菜单</a> | <a class="J_edit" href="/Intendant/Site/editMenu/id/59">修改</a> | <a class="J_ajax_del" datatitle="开始文件备份" href="/Intendant/Site/delMenu" data="59">删除</a> </td>
            </tr><tr>
                <td align="center"><input style="text-align: center" name="sort[60]" type="text" size="3" value="2" class="input"></td>
                <td align="center">60</td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="tree-icon tree-file icons-email-email_go"></span><!-- <i class="org-2">4</i> -->发送文件备份</td>
                <td align="center">System/sendFileZip</td>
                <!-- <td></td>
                <td align="center"><span class="greens">显示</span></td> -->
                <td align="center"><span class="greens">显示</span></td>
                <td align="center"><a class="J_add" href="/Intendant/Site/addMenu/parentid/60" data="3">添加子菜单</a> | <a class="J_edit" href="/Intendant/Site/editMenu/id/60">修改</a> | <a class="J_ajax_del" datatitle="发送文件备份" href="/Intendant/Site/delMenu" data="60">删除</a> </td>
            </tr><tr>
                <td align="center"><input style="text-align: center" name="sort[61]" type="text" size="3" value="3" class="input"></td>
                <td align="center">61</td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="tree-icon tree-file icons-folder-folder_delete"></span><!-- <i class="org-2">4</i> -->删除文件备份</td>
                <td align="center">System/delFileBackup</td>
                <!-- <td></td>
                <td align="center"><span class="greens">显示</span></td> -->
                <td align="center"><span class="greens">显示</span></td>
                <td align="center"><a class="J_add" href="/Intendant/Site/addMenu/parentid/61" data="3">添加子菜单</a> | <a class="J_edit" href="/Intendant/Site/editMenu/id/61">修改</a> | <a class="J_ajax_del" datatitle="删除文件备份" href="/Intendant/Site/delMenu" data="61">删除</a> </td>
            </tr><tr>
                <td align="center"><input style="text-align: center" name="sort[69]" type="text" size="3" value="2" class="input"></td>
                <td align="center">69</td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="tree-icon tree-file icons-other-database_save"></span><!-- <i class="org-2">3</i> -->数据备份</td>
                <td align="center">Site/dataBase</td>
                <!-- <td></td>
                <td align="center"><span class="greens">显示</span></td> -->
                <td align="center"><span class="greens">显示</span></td>
                <td align="center"><a class="J_add" href="/Intendant/Site/addMenu/parentid/69" data="2">添加子菜单</a> | <a class="J_edit" href="/Intendant/Site/editMenu/id/69">修改</a> | <a class="J_ajax_del" datatitle="数据备份" href="/Intendant/Site/delMenu" data="69">删除</a> </td>
            </tr><tr>
                <td align="center"><input style="text-align: center" name="sort[11]" type="text" size="3" value="3" class="input"></td>
                <td align="center">11</td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="tree-icon tree-file icons-other-database_gear"></span><!-- <i class="org-2">4</i> -->查看数据备份</td>
                <td align="center">Site/dataBackup</td>
                <!-- <td></td>
                <td align="center"><span class="greens">显示</span></td> -->
                <td align="center"><span class="greens">显示</span></td>
                <td align="center"><a class="J_add" href="/Intendant/Site/addMenu/parentid/11" data="3">添加子菜单</a> | <a class="J_edit" href="/Intendant/Site/editMenu/id/11">修改</a> | <a class="J_ajax_del" datatitle="查看数据备份" href="/Intendant/Site/delMenu" data="11">删除</a> </td>
            </tr><tr>
                <td align="center"><input style="text-align: center" name="sort[47]" type="text" size="3" value="1" class="input"></td>
                <td align="center">47</td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="tree-icon tree-file icons-other-database_table"></span><!-- <i class="org-2">4</i> -->查看数据表</td>
                <td align="center">System/dataTable</td>
                <!-- <td></td>
                <td align="center"><span class="greens">显示</span></td> -->
                <td align="center"><span class="greens">显示</span></td>
                <td align="center"><a class="J_add" href="/Intendant/Site/addMenu/parentid/47" data="3">添加子菜单</a> | <a class="J_edit" href="/Intendant/Site/editMenu/id/47">修改</a> | <a class="J_ajax_del" datatitle="查看数据表" href="/Intendant/Site/delMenu" data="47">删除</a> </td>
            </tr><tr>
                <td align="center"><input style="text-align: center" name="sort[52]" type="text" size="3" value="2" class="input"></td>
                <td align="center">52</td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="tree-icon tree-file icons-other-database_gear"></span><!-- <i class="org-2">4</i> -->优化数据表</td>
                <td align="center">System/optimizeTables</td>
                <!-- <td></td>
                <td align="center"><span class="greens">显示</span></td> -->
                <td align="center"><span class="greens">显示</span></td>
                <td align="center"><a class="J_add" href="/Intendant/Site/addMenu/parentid/52" data="3">添加子菜单</a> | <a class="J_edit" href="/Intendant/Site/editMenu/id/52">修改</a> | <a class="J_ajax_del" datatitle="优化数据表" href="/Intendant/Site/delMenu" data="52">删除</a> </td>
            </tr><tr>
                <td align="center"><input style="text-align: center" name="sort[53]" type="text" size="3" value="3" class="input"></td>
                <td align="center">53</td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="tree-icon tree-file icons-other-database_connect"></span><!-- <i class="org-2">4</i> -->修复数据表</td>
                <td align="center">System/repairTables</td>
                <!-- <td></td>
                <td align="center"><span class="greens">显示</span></td> -->
                <td align="center"><span class="greens">显示</span></td>
                <td align="center"><a class="J_add" href="/Intendant/Site/addMenu/parentid/53" data="3">添加子菜单</a> | <a class="J_edit" href="/Intendant/Site/editMenu/id/53">修改</a> | <a class="J_ajax_del" datatitle="修复数据表" href="/Intendant/Site/delMenu" data="53">删除</a> </td>
            </tr><tr>
                <td align="center"><input style="text-align: center" name="sort[54]" type="text" size="3" value="4" class="input"></td>
                <td align="center">54</td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="tree-icon tree-file icons-other-database_save"></span><!-- <i class="org-2">4</i> -->开始数据备份</td>
                <td align="center">System/exportData</td>
                <!-- <td></td>
                <td align="center"><span class="greens">显示</span></td> -->
                <td align="center"><span class="greens">显示</span></td>
                <td align="center"><a class="J_add" href="/Intendant/Site/addMenu/parentid/54" data="3">添加子菜单</a> | <a class="J_edit" href="/Intendant/Site/editMenu/id/54">修改</a> | <a class="J_ajax_del" datatitle="开始数据备份" href="/Intendant/Site/delMenu" data="54">删除</a> </td>
            </tr><tr>
                <td align="center"><input style="text-align: center" name="sort[55]" type="text" size="3" value="5" class="input"></td>
                <td align="center">55</td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="tree-icon tree-file icons-other-database_lightning"></span><!-- <i class="org-2">4</i> -->清除执行任务</td>
                <td align="center">System/delBackupLock</td>
                <!-- <td></td>
                <td align="center"><span class="greens">显示</span></td> -->
                <td align="center"><span class="greens">显示</span></td>
                <td align="center"><a class="J_add" href="/Intendant/Site/addMenu/parentid/55" data="3">添加子菜单</a> | <a class="J_edit" href="/Intendant/Site/editMenu/id/55">修改</a> | <a class="J_ajax_del" datatitle="清除执行任务" href="/Intendant/Site/delMenu" data="55">删除</a> </td>
            </tr><tr>
                <td align="center"><input style="text-align: center" name="sort[56]" type="text" size="3" value="6" class="input"></td>
                <td align="center">56</td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="tree-icon tree-file icons-other-database_refresh"></span><!-- <i class="org-2">4</i> -->还原数据备份</td>
                <td align="center">System/importData</td>
                <!-- <td></td>
                <td align="center"><span class="greens">显示</span></td> -->
                <td align="center"><span class="greens">显示</span></td>
                <td align="center"><a class="J_add" href="/Intendant/Site/addMenu/parentid/56" data="3">添加子菜单</a> | <a class="J_edit" href="/Intendant/Site/editMenu/id/56">修改</a> | <a class="J_ajax_del" datatitle="还原数据备份" href="/Intendant/Site/delMenu" data="56">删除</a> </td>
            </tr><tr>
                <td align="center"><input style="text-align: center" name="sort[57]" type="text" size="3" value="7" class="input"></td>
                <td align="center">57</td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="tree-icon tree-file icons-email-email_go"></span><!-- <i class="org-2">4</i> -->发送数据备份</td>
                <td align="center">System/sendSqlGz</td>
                <!-- <td></td>
                <td align="center"><span class="greens">显示</span></td> -->
                <td align="center"><span class="greens">显示</span></td>
                <td align="center"><a class="J_add" href="/Intendant/Site/addMenu/parentid/57" data="3">添加子菜单</a> | <a class="J_edit" href="/Intendant/Site/editMenu/id/57">修改</a> | <a class="J_ajax_del" datatitle="发送数据备份" href="/Intendant/Site/delMenu" data="57">删除</a> </td>
            </tr><tr>
                <td align="center"><input style="text-align: center" name="sort[58]" type="text" size="3" value="8" class="input"></td>
                <td align="center">58</td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="tree-icon tree-file icons-other-database_delete"></span><!-- <i class="org-2">4</i> -->删除数据备份</td>
                <td align="center">System/delData</td>
                <!-- <td></td>
                <td align="center"><span class="greens">显示</span></td> -->
                <td align="center"><span class="greens">显示</span></td>
                <td align="center"><a class="J_add" href="/Intendant/Site/addMenu/parentid/58" data="3">添加子菜单</a> | <a class="J_edit" href="/Intendant/Site/editMenu/id/58">修改</a> | <a class="J_ajax_del" datatitle="删除数据备份" href="/Intendant/Site/delMenu" data="58">删除</a> </td>
            </tr><tr>
                <td align="center"><input style="text-align: center" name="sort[12]" type="text" size="3" value="2" class="input"></td>
                <td align="center">12</td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="tree-icon tree-file icons-user-user_add"></span><!-- <i class="org-2">2</i> -->用户设置</td>
                <td align="center">Site/intendant</td>
                <!-- <td></td>
                <td align="center"><span class="greens">显示</span></td> -->
                <td align="center"><span class="greens">显示</span></td>
                <td align="center"><a class="J_add" href="/Intendant/Site/addMenu/parentid/12" data="1">添加子菜单</a> | <a class="J_edit" href="/Intendant/Site/editMenu/id/12">修改</a> | <a class="J_ajax_del" datatitle="用户设置" href="/Intendant/Site/delMenu" data="12">删除</a> </td>
            </tr><tr>
                <td align="center"><input style="text-align: center" name="sort[13]" type="text" size="3" value="1" class="input"></td>
                <td align="center">13</td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="tree-icon tree-file icons-user-user_go"></span><!-- <i class="org-2">3</i> -->用户管理</td>
                <td align="center">Site/user</td>
                <!-- <td></td>
                <td align="center"><span class="greens">显示</span></td> -->
                <td align="center"><span class="greens">显示</span></td>
                <td align="center"><a class="J_add" href="/Intendant/Site/addMenu/parentid/13" data="2">添加子菜单</a> | <a class="J_edit" href="/Intendant/Site/editMenu/id/13">修改</a> | <a class="J_ajax_del" datatitle="用户管理" href="/Intendant/Site/delMenu" data="13">删除</a> </td>
            </tr><tr>
                <td align="center"><input style="text-align: center" name="sort[27]" type="text" size="3" value="1" class="input"></td>
                <td align="center">27</td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="tree-icon tree-file icons-user-user_add"></span><!-- <i class="org-2">4</i> -->添加用户</td>
                <td align="center">System/addUser</td>
                <!-- <td></td>
                <td align="center"><span class="greens">显示</span></td> -->
                <td align="center"><span class="greens">显示</span></td>
                <td align="center"><a class="J_add" href="/Intendant/Site/addMenu/parentid/27" data="3">添加子菜单</a> | <a class="J_edit" href="/Intendant/Site/editMenu/id/27">修改</a> | <a class="J_ajax_del" datatitle="添加用户" href="/Intendant/Site/delMenu" data="27">删除</a> </td>
            </tr><tr>
                <td align="center"><input style="text-align: center" name="sort[28]" type="text" size="3" value="2" class="input"></td>
                <td align="center">28</td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="tree-icon tree-file icons-user-user_edit"></span><!-- <i class="org-2">4</i> -->修改用户</td>
                <td align="center">System/editUser</td>
                <!-- <td></td>
                <td align="center"><span class="greens">显示</span></td> -->
                <td align="center"><span class="greens">显示</span></td>
                <td align="center"><a class="J_add" href="/Intendant/Site/addMenu/parentid/28" data="3">添加子菜单</a> | <a class="J_edit" href="/Intendant/Site/editMenu/id/28">修改</a> | <a class="J_ajax_del" datatitle="修改用户" href="/Intendant/Site/delMenu" data="28">删除</a> </td>
            </tr><tr>
                <td align="center"><input style="text-align: center" name="sort[29]" type="text" size="3" value="3" class="input"></td>
                <td align="center">29</td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="tree-icon tree-file icons-user-user_delete"></span><!-- <i class="org-2">4</i> -->删除单个用户</td>
                <td align="center">System/delUser</td>
                <!-- <td></td>
                <td align="center"><span class="greens">显示</span></td> -->
                <td align="center"><span class="greens">显示</span></td>
                <td align="center"><a class="J_add" href="/Intendant/Site/addMenu/parentid/29" data="3">添加子菜单</a> | <a class="J_edit" href="/Intendant/Site/editMenu/id/29">修改</a> | <a class="J_ajax_del" datatitle="删除单个用户" href="/Intendant/Site/delMenu" data="29">删除</a> </td>
            </tr><tr>
                <td align="center"><input style="text-align: center" name="sort[30]" type="text" size="3" value="4" class="input"></td>
                <td align="center">30</td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="tree-icon tree-file icons-user-user_delete"></span><!-- <i class="org-2">4</i> -->批量删除用户</td>
                <td align="center">System/delMoreUser</td>
                <!-- <td></td>
                <td align="center"><span class="greens">显示</span></td> -->
                <td align="center"><span class="greens">显示</span></td>
                <td align="center"><a class="J_add" href="/Intendant/Site/addMenu/parentid/30" data="3">添加子菜单</a> | <a class="J_edit" href="/Intendant/Site/editMenu/id/30">修改</a> | <a class="J_ajax_del" datatitle="批量删除用户" href="/Intendant/Site/delMenu" data="30">删除</a> </td>
            </tr><tr>
                <td align="center"><input style="text-align: center" name="sort[31]" type="text" size="3" value="5" class="input"></td>
                <td align="center">31</td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="tree-icon tree-file icons-user-user_orange"></span><!-- <i class="org-2">4</i> -->查看权限</td>
                <td align="center">Site/showRole</td>
                <!-- <td></td>
                <td align="center"><span class="greens">显示</span></td> -->
                <td align="center"><span class="greens">显示</span></td>
                <td align="center"><a class="J_add" href="/Intendant/Site/addMenu/parentid/31" data="3">添加子菜单</a> | <a class="J_edit" href="/Intendant/Site/editMenu/id/31">修改</a> | <a class="J_ajax_del" datatitle="查看权限" href="/Intendant/Site/delMenu" data="31">删除</a> </td>
            </tr><tr>
                <td align="center"><input style="text-align: center" name="sort[14]" type="text" size="3" value="2" class="input"></td>
                <td align="center">14</td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="tree-icon tree-file icons-vcard-vcard_edit"></span><!-- <i class="org-2">3</i> -->角色管理</td>
                <td align="center">Site/role</td>
                <!-- <td></td>
                <td align="center"><span class="greens">显示</span></td> -->
                <td align="center"><span class="greens">显示</span></td>
                <td align="center"><a class="J_add" href="/Intendant/Site/addMenu/parentid/14" data="2">添加子菜单</a> | <a class="J_edit" href="/Intendant/Site/editMenu/id/14">修改</a> | <a class="J_ajax_del" datatitle="角色管理" href="/Intendant/Site/delMenu" data="14">删除</a> </td>
            </tr><tr>
                <td align="center"><input style="text-align: center" name="sort[38]" type="text" size="3" value="1" class="input"></td>
                <td align="center">38</td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="tree-icon tree-file icons-group-group_add"></span><!-- <i class="org-2">4</i> -->添加角色</td>
                <td align="center">Site/addRole</td>
                <!-- <td></td>
                <td align="center"><span class="greens">显示</span></td> -->
                <td align="center"><span class="greens">显示</span></td>
                <td align="center"><a class="J_add" href="/Intendant/Site/addMenu/parentid/38" data="3">添加子菜单</a> | <a class="J_edit" href="/Intendant/Site/editMenu/id/38">修改</a> | <a class="J_ajax_del" datatitle="添加角色" href="/Intendant/Site/delMenu" data="38">删除</a> </td>
            </tr><tr>
                <td align="center"><input style="text-align: center" name="sort[39]" type="text" size="3" value="2" class="input"></td>
                <td align="center">39</td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="tree-icon tree-file icons-group-group_edit"></span><!-- <i class="org-2">4</i> -->修改角色</td>
                <td align="center">Site/editRole</td>
                <!-- <td></td>
                <td align="center"><span class="greens">显示</span></td> -->
                <td align="center"><span class="greens">显示</span></td>
                <td align="center"><a class="J_add" href="/Intendant/Site/addMenu/parentid/39" data="3">添加子菜单</a> | <a class="J_edit" href="/Intendant/Site/editMenu/id/39">修改</a> | <a class="J_ajax_del" datatitle="修改角色" href="/Intendant/Site/delMenu" data="39">删除</a> </td>
            </tr><tr>
                <td align="center"><input style="text-align: center" name="sort[40]" type="text" size="3" value="3" class="input"></td>
                <td align="center">40</td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="tree-icon tree-file icons-group-group_delete"></span><!-- <i class="org-2">4</i> -->删除角色</td>
                <td align="center">System/delRole</td>
                <!-- <td></td>
                <td align="center"><span class="greens">显示</span></td> -->
                <td align="center"><span class="greens">显示</span></td>
                <td align="center"><a class="J_add" href="/Intendant/Site/addMenu/parentid/40" data="3">添加子菜单</a> | <a class="J_edit" href="/Intendant/Site/editMenu/id/40">修改</a> | <a class="J_ajax_del" datatitle="删除角色" href="/Intendant/Site/delMenu" data="40">删除</a> </td>
            </tr><tr>
                <td align="center"><input style="text-align: center" name="sort[41]" type="text" size="3" value="4" class="input"></td>
                <td align="center">41</td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="tree-icon tree-file icons-group-group_gear"></span><!-- <i class="org-2">4</i> -->角色排序</td>
                <td align="center">System/sortRole</td>
                <!-- <td></td>
                <td align="center"><span class="greens">显示</span></td> -->
                <td align="center"><span class="greens">显示</span></td>
                <td align="center"><a class="J_add" href="/Intendant/Site/addMenu/parentid/41" data="3">添加子菜单</a> | <a class="J_edit" href="/Intendant/Site/editMenu/id/41">修改</a> | <a class="J_ajax_del" datatitle="角色排序" href="/Intendant/Site/delMenu" data="41">删除</a> </td>
            </tr><tr>
                <td align="center"><input style="text-align: center" name="sort[42]" type="text" size="3" value="5" class="input"></td>
                <td align="center">42</td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="tree-icon tree-file icons-group-group_key"></span><!-- <i class="org-2">4</i> -->角色配置权限</td>
                <td align="center">System/setRole</td>
                <!-- <td></td>
                <td align="center"><span class="greens">显示</span></td> -->
                <td align="center"><span class="greens">显示</span></td>
                <td align="center"><a class="J_add" href="/Intendant/Site/addMenu/parentid/42" data="3">添加子菜单</a> | <a class="J_edit" href="/Intendant/Site/editMenu/id/42">修改</a> | <a class="J_ajax_del" datatitle="角色配置权限" href="/Intendant/Site/delMenu" data="42">删除</a> </td>
            </tr><tr>
                <td align="center"><input style="text-align: center" name="sort[15]" type="text" size="3" value="3" class="input"></td>
                <td align="center">15</td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="tree-icon tree-file icons-other-book_link"></span><!-- <i class="org-2">2</i> -->日志设置</td>
                <td align="center">Site/rizhi</td>
                <!-- <td></td>
                <td align="center"><span class="greens">显示</span></td> -->
                <td align="center"><span class="greens">显示</span></td>
                <td align="center"><a class="J_add" href="/Intendant/Site/addMenu/parentid/15" data="1">添加子菜单</a> | <a class="J_edit" href="/Intendant/Site/editMenu/id/15">修改</a> | <a class="J_ajax_del" datatitle="日志设置" href="/Intendant/Site/delMenu" data="15">删除</a> </td>
            </tr><tr>
                <td align="center"><input style="text-align: center" name="sort[16]" type="text" size="3" value="1" class="input"></td>
                <td align="center">16</td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="tree-icon tree-file icons-other-clock_go"></span><!-- <i class="org-2">3</i> -->登录日志管理</td>
                <td align="center">Site/loginLog</td>
                <!-- <td></td>
                <td align="center"><span class="greens">显示</span></td> -->
                <td align="center"><span class="greens">显示</span></td>
                <td align="center"><a class="J_add" href="/Intendant/Site/addMenu/parentid/16" data="2">添加子菜单</a> | <a class="J_edit" href="/Intendant/Site/editMenu/id/16">修改</a> | <a class="J_ajax_del" datatitle="登录日志管理" href="/Intendant/Site/delMenu" data="16">删除</a> </td>
            </tr><tr>
                <td align="center"><input style="text-align: center" name="sort[43]" type="text" size="3" value="1" class="input"></td>
                <td align="center">43</td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="tree-icon tree-file icons-layout-layout"></span><!-- <i class="org-2">4</i> -->删除上月登录日志</td>
                <td align="center">Site/delLoginLog</td>
                <!-- <td></td>
                <td align="center"><span class="greens">显示</span></td> -->
                <td align="center"><span class="greens">显示</span></td>
                <td align="center"><a class="J_add" href="/Intendant/Site/addMenu/parentid/43" data="3">添加子菜单</a> | <a class="J_edit" href="/Intendant/Site/editMenu/id/43">修改</a> | <a class="J_ajax_del" datatitle="删除上月登录日志" href="/Intendant/Site/delMenu" data="43">删除</a> </td>
            </tr><tr>
                <td align="center"><input style="text-align: center" name="sort[17]" type="text" size="3" value="2" class="input"></td>
                <td align="center">17</td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="tree-icon tree-file icons-other-clock_play"></span><!-- <i class="org-2">3</i> -->操作日志管理</td>
                <td align="center">Site/operateLog</td>
                <!-- <td></td>
                <td align="center"><span class="greens">显示</span></td> -->
                <td align="center"><span class="greens">显示</span></td>
                <td align="center"><a class="J_add" href="/Intendant/Site/addMenu/parentid/17" data="2">添加子菜单</a> | <a class="J_edit" href="/Intendant/Site/editMenu/id/17">修改</a> | <a class="J_ajax_del" datatitle="操作日志管理" href="/Intendant/Site/delMenu" data="17">删除</a> </td>
            </tr><tr>
                <td align="center"><input style="text-align: center" name="sort[44]" type="text" size="3" value="1" class="input"></td>
                <td align="center">44</td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="tree-icon tree-file icons-layout-overlays"></span><!-- <i class="org-2">4</i> -->删除上月操作日志</td>
                <td align="center">Site/delOperateLog</td>
                <!-- <td></td>
                <td align="center"><span class="greens">显示</span></td> -->
                <td align="center"><span class="greens">显示</span></td>
                <td align="center"><a class="J_add" href="/Intendant/Site/addMenu/parentid/44" data="3">添加子菜单</a> | <a class="J_edit" href="/Intendant/Site/editMenu/id/44">修改</a> | <a class="J_ajax_del" datatitle="删除上月操作日志" href="/Intendant/Site/delMenu" data="44">删除</a> </td>
            </tr><tr>
                <td align="center"><input style="text-align: center" name="sort[3]" type="text" size="3" value="3" class="input"></td>
                <td align="center">3</td>
                <td><span class="tree-icon tree-file icon03"></span><!-- <i class="org-2">1</i> -->内容管理</td>
                <td align="center">内容管理</td>
                <!-- <td></td>
                <td align="center"><span class="greens">显示</span></td> -->
                <td align="center"><span class="greens">显示</span></td>
                <td align="center"><a class="J_add" href="/Intendant/Site/addMenu/parentid/3" data="0">添加子菜单</a> | <a class="J_edit" href="/Intendant/Site/editMenu/id/3">修改</a> | <a class="J_ajax_del" datatitle="内容管理" href="/Intendant/Site/delMenu" data="3">删除</a> </td>
            </tr><tr>
                <td align="center"><input style="text-align: center" name="sort[25]" type="text" size="3" value="1" class="input"></td>
                <td align="center">25</td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="tree-icon tree-file icons-other-box"></span><!-- <i class="org-2">2</i> -->商品管理</td>
                <td align="center">Content/shopManage</td>
                <!-- <td></td>
                <td align="center"><span class="greens">显示</span></td> -->
                <td align="center"><span class="greens">显示</span></td>
                <td align="center"><a class="J_add" href="/Intendant/Site/addMenu/parentid/25" data="1">添加子菜单</a> | <a class="J_edit" href="/Intendant/Site/editMenu/id/25">修改</a> | <a class="J_ajax_del" datatitle="商品管理" href="/Intendant/Site/delMenu" data="25">删除</a> </td>
            </tr><tr>
                <td align="center"><input style="text-align: center" name="sort[26]" type="text" size="3" value="30" class="input"></td>
                <td align="center">26</td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="tree-icon tree-file icons-application-application_go"></span><!-- <i class="org-2">3</i> -->商品分类</td>
                <td align="center">Content/shopCategory</td>
                <!-- <td></td>
                <td align="center"><span class="greens">显示</span></td> -->
                <td align="center"><span class="greens">显示</span></td>
                <td align="center"><a class="J_add" href="/Intendant/Site/addMenu/parentid/26" data="2">添加子菜单</a> | <a class="J_edit" href="/Intendant/Site/editMenu/id/26">修改</a> | <a class="J_ajax_del" datatitle="商品分类" href="/Intendant/Site/delMenu" data="26">删除</a> </td>
            </tr><tr>
                <td align="center"><input style="text-align: center" name="sort[63]" type="text" size="3" value="30" class="input"></td>
                <td align="center">63</td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="tree-icon tree-file icons-folder-folder_image"></span><!-- <i class="org-2">3</i> -->商城广告</td>
                <td align="center">Content/shopAd</td>
                <!-- <td></td>
                <td align="center"><span class="greens">显示</span></td> -->
                <td align="center"><span class="greens">显示</span></td>
                <td align="center"><a class="J_add" href="/Intendant/Site/addMenu/parentid/63" data="2">添加子菜单</a> | <a class="J_edit" href="/Intendant/Site/editMenu/id/63">修改</a> | <a class="J_ajax_del" datatitle="商城广告" href="/Intendant/Site/delMenu" data="63">删除</a> </td>
            </tr><tr>
                <td align="center"><input style="text-align: center" name="sort[64]" type="text" size="3" value="4" class="input"></td>
                <td align="center">64</td>
                <td><span class="tree-icon tree-file icon04"></span><!-- <i class="org-2">1</i> -->农业信息</td>
                <td align="center">农业信息</td>
                <!-- <td></td>
                <td align="center"><span class="greens">显示</span></td> -->
                <td align="center"><span class="greens">显示</span></td>
                <td align="center"><a class="J_add" href="/Intendant/Site/addMenu/parentid/64" data="0">添加子菜单</a> | <a class="J_edit" href="/Intendant/Site/editMenu/id/64">修改</a> | <a class="J_ajax_del" datatitle="农业信息" href="/Intendant/Site/delMenu" data="64">删除</a> </td>
            </tr><tr>
                <td align="center"><input style="text-align: center" name="sort[65]" type="text" size="3" value="30" class="input"></td>
                <td align="center">65</td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="tree-icon tree-file icons-lock-lock_edit"></span><!-- <i class="org-2">2</i> -->农业信息管理</td>
                <td align="center">Nyxx/nyxxManage</td>
                <!-- <td></td>
                <td align="center"><span class="greens">显示</span></td> -->
                <td align="center"><span class="greens">显示</span></td>
                <td align="center"><a class="J_add" href="/Intendant/Site/addMenu/parentid/65" data="1">添加子菜单</a> | <a class="J_edit" href="/Intendant/Site/editMenu/id/65">修改</a> | <a class="J_ajax_del" datatitle="农业信息管理" href="/Intendant/Site/delMenu" data="65">删除</a> </td>
            </tr><tr>
                <td align="center"><input style="text-align: center" name="sort[66]" type="text" size="3" value="2" class="input"></td>
                <td align="center">66</td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="tree-icon tree-file icons-chart-chart_bar_edit"></span><!-- <i class="org-2">3</i> -->农业栏目管理</td>
                <td align="center">Nyxx/nyxxCategory</td>
                <!-- <td></td>
                <td align="center"><span class="greens">显示</span></td> -->
                <td align="center"><span class="greens">显示</span></td>
                <td align="center"><a class="J_add" href="/Intendant/Site/addMenu/parentid/66" data="2">添加子菜单</a> | <a class="J_edit" href="/Intendant/Site/editMenu/id/66">修改</a> | <a class="J_ajax_del" datatitle="农业栏目管理" href="/Intendant/Site/delMenu" data="66">删除</a> </td>
            </tr><tr>
                <td align="center"><input style="text-align: center" name="sort[67]" type="text" size="3" value="1" class="input"></td>
                <td align="center">67</td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="tree-icon tree-file icons-film-film_edit"></span><!-- <i class="org-2">3</i> -->农业信息广告</td>
                <td align="center">Nyxx/nyxxAd</td>
                <!-- <td></td>
                <td align="center"><span class="greens">显示</span></td> -->
                <td align="center"><span class="greens">显示</span></td>
                <td align="center"><a class="J_add" href="/Intendant/Site/addMenu/parentid/67" data="2">添加子菜单</a> | <a class="J_edit" href="/Intendant/Site/editMenu/id/67">修改</a> | <a class="J_ajax_del" datatitle="农业信息广告" href="/Intendant/Site/delMenu" data="67">删除</a> </td>
            </tr><tr>
                <td align="center"><input style="text-align: center" name="sort[68]" type="text" size="3" value="3" class="input"></td>
                <td align="center">68</td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="tree-icon tree-file icons-folder-folder_edit"></span><!-- <i class="org-2">3</i> -->农业文章管理</td>
                <td align="center">Nyxx/nyxxShow</td>
                <!-- <td></td>
                <td align="center"><span class="greens">显示</span></td> -->
                <td align="center"><span class="greens">显示</span></td>
                <td align="center"><a class="J_add" href="/Intendant/Site/addMenu/parentid/68" data="2">添加子菜单</a> | <a class="J_edit" href="/Intendant/Site/editMenu/id/68">修改</a> | <a class="J_ajax_del" datatitle="农业文章管理" href="/Intendant/Site/delMenu" data="68">删除</a> </td>
            </tr>        </tbody>
        </table>
        <!-- <div class="p10"><div class="pages">  </div> </div> -->

    </div>
    <div class="frame-table-btn">
        <a class="btn " type="submit">排序</a>
    </div>
</form>
</div>
</body>
</html>