<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link href="/static/admin/css/frame.css" rel="stylesheet">
</head>
<body>
<div id="frame-top">
    当前位置&nbsp;<i class="iconfont" style="color:#666;font-size: 12px;">&#xe60e;</i>&nbsp;&nbsp;设置&nbsp;&nbsp;<i class="iconfont" style="color:#666;font-size: 12px;">&#xe60f;</i>&nbsp;&nbsp;站长设置&nbsp;&nbsp;<i class="iconfont" style="color:#666;font-size: 12px;">&#xe60f;</i>&nbsp;&nbsp;添加菜单
</div>
<div id="frame-toolbar">
    <ul>
        <li><a href="/admin/site/index">菜单设置</a></li>
        <li><a class="active" href="/admin/site/addMenu">添加菜单</a></li>
    </ul>
</div>
<div id="frame-content">
    <form name="addMenu" method="post" class="J_ajaxForm" action="/Intendant/Site/addMenu" novalidate="novalidate">
        <input type="hidden" name="addMenu" value="addMenu">

        <div class="frame-table-list">
            <div class="input-title">菜单信息</div>
            <table cellpadding="0" cellspacing="0" class="table_form" width="100%">
                <tbody>
                <tr>
                    <td width="140">上级菜单:</td>
                    <td><select name="pid">
                        <option value="0" selected="">顶级菜单</option>
                        <option value="1">用户中心</option><option value="4">&nbsp;&nbsp;&nbsp;&nbsp;├─ 用户操作</option><option value="6">&nbsp;&nbsp;&nbsp;&nbsp;├─ 内容管理</option><option value="7">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├─  内容管理</option><option value="2">设置</option><option value="8">&nbsp;&nbsp;&nbsp;&nbsp;├─ 站长设置</option><option value="9">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├─  系统配置</option><option value="70">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├─   更新配置</option><option value="71">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├─   生成前台配置</option><option value="72">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├─   生成后台配置</option><option value="10">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├─  菜单设置</option><option value="32">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├─   添加菜单</option><option value="33">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├─   修改菜单</option><option value="34">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├─   删除菜单</option><option value="35">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├─   菜单排序</option><option value="36">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├─   导出菜单</option><option value="37">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├─   导入菜单</option><option value="45">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├─  后台首页管理</option><option value="48">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├─   添加版块</option><option value="49">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├─   修改版块</option><option value="50">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├─   删除版块</option><option value="51">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├─   版块排序</option><option value="46">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├─  文件备份</option><option value="59">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├─   开始文件备份</option><option value="60">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├─   发送文件备份</option><option value="61">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├─   删除文件备份</option><option value="69">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├─  数据备份</option><option value="11">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├─   查看数据备份</option><option value="47">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├─   查看数据表</option><option value="52">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├─   优化数据表</option><option value="53">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├─   修复数据表</option><option value="54">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├─   开始数据备份</option><option value="55">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├─   清除执行任务</option><option value="56">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├─   还原数据备份</option><option value="57">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├─   发送数据备份</option><option value="58">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├─   删除数据备份</option><option value="12">&nbsp;&nbsp;&nbsp;&nbsp;├─ 用户设置</option><option value="13">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├─  用户管理</option><option value="27">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├─   添加用户</option><option value="28">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├─   修改用户</option><option value="29">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├─   删除单个用户</option><option value="30">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├─   批量删除用户</option><option value="31">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├─   查看权限</option><option value="14">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├─  角色管理</option><option value="38">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├─   添加角色</option><option value="39">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├─   修改角色</option><option value="40">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├─   删除角色</option><option value="41">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├─   角色排序</option><option value="42">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├─   角色配置权限</option><option value="15">&nbsp;&nbsp;&nbsp;&nbsp;├─ 日志设置</option><option value="16">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├─  登录日志管理</option><option value="43">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├─   删除上月登录日志</option><option value="17">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├─  操作日志管理</option><option value="44">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├─   删除上月操作日志</option><option value="3">内容管理</option><option value="25">&nbsp;&nbsp;&nbsp;&nbsp;├─ 商品管理</option><option value="26">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├─  商品分类</option><option value="63">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├─  商城广告</option><option value="64">农业信息</option><option value="65">&nbsp;&nbsp;&nbsp;&nbsp;├─ 农业信息管理</option><option value="66">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├─  农业栏目管理</option><option value="67">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├─  农业信息广告</option><option value="68">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;├─  农业文章管理</option>	                </select></td>
                </tr>
                <tr>
                    <td>菜单名称:</td>
                    <td><input type="text" class="input length_5" name="title" value="" id="title"></td>
                </tr>
                <tr>
                    <td>菜单规则:</td>
                    <td><input type="text" class="input length_5" name="name" id="name" value=""></td>
                </tr>
                <tr>
                    <td>菜单排序:</td>
                    <td><input type="text" class="input length_5" name="sort" id="sort" value=""></td>
                </tr>
                <tr>
                    <td>菜单条件:</td>
                    <td><input type="text" class="input length_5" name="condition" id="condition" value=""></td>
                </tr>
                <tr>
                    <td>菜单图标：</td>
                    <td>
                        <input id="System_Menu_icons_input" name="icon" type="hidden" value="icons-other-cog">
                        <strong id="System_Menu_icons" style="margin-right: 10px;"><span class="tree-icon tree-file icons-other-cog"></span></strong>
                        <a class="tubiao" onclick="Show_System_Menu_icons()">选择图标</a>
                    </td>
                </tr>
                <tr>
                    <td>状态:</td>
                    <td><select name="status">
                        <option value="1">显示</option>
                        <option value="0">不显示</option>
                    </select>&nbsp;&nbsp;&nbsp;需要明显不确定的操作时建议设置为不显示，例如：删除，修改等</td>
                </tr>
                <tr>
                    <td>是否显示:</td>
                    <td><select name="isshow">
                        <option value="1">显示</option>
                        <option value="0">不显示</option>
                    </select>&nbsp;&nbsp;&nbsp;是否显示菜单在后台管理页面上</td>
                </tr>
                <tr>
                    <td>类型:</td>
                    <td><select name="type">
                        <option value="1" selected="">权限认证+菜单</option>
                        <option value="0">只作为菜单</option>
                    </select>
                        &nbsp;&nbsp;&nbsp;注意：“权限认证+菜单”表示加入后台权限管理，纯粹是菜单项请不要选择此项。</td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="frame-table-btn">
            <a class="btn ajax-add" type="submit">添加</a>
        </div>
    </form>
</div>

</body>
</html>