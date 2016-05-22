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
        <li><a class="active" href="/admin/site/menu">菜单设置</a></li>
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
                <col width="80">
                <col width="80">
                <col width="80">
                <col width="160">
            </colgroup>
            <thead>
            <tr>
                <td align="center">排序</td>
                <td align="center">ID</td>
                <td align="left">菜单名称</td>
                <td align="center">控制器</td>
                <td align="center">方法</td>
                <td align="center">是否显示</td>
                <td align="center">管理操作</td>
            </tr>
            </thead>
            <tbody>
                {% for menu in adminMenu %}
                <tr>
                    <td align="center"><input style="text-align: center" name="sort[{{menu['id']|e}}]" type="text" size="3" value="{{menu['sort']|e}}" class="input"></td>
                    <td align="center">{{menu['id']|e}}</td>
                    <td><span class="tree-icon tree-file icons-calendar-calculator_edit"></span><!-- <i class="org-2">1</i> --><?php echo str_repeat('&nbsp;&nbsp;&nbsp;',$menu['level']); ?>{{menu['html']}}<i class="iconfont icon" style="">&#xe60f;</i>{{menu['name']|e}}</td>
                    <td align="center">{{menu['controller']|e}}</td>
                    <td align="center">{{menu['action']|e}}</td>
                    <!-- <td></td>
                    <td align="center"><span class="greens">显示</span></td> -->
                    <td align="center"><span class="greens">{% if menu['isshow'] == 1 %}显示{% else %}不显示{% endif %}</span></td>
                    <td align="center"><a class="ajax-add" href="/admin/site/addMenu/?pid={{menu['id']|e}}" data="0">添加子菜单</a> | <a class="ajax-edit" href="/admin/site/editMenu/?id={{menu['id']|e}}">修改</a> | <a class="ajax-del" datatitle="用户中心" href="/admin/site/delMenu" data-id="{{menu['id']|e}}">删除</a> </td>
                </tr>
                {% endfor %}
            </tbody>
        </table>
        <!-- <div class="p10"><div class="pages">  </div> </div> -->

    </div>
    <div class="frame-table-btn">
        <a class="btn ajax-sort" type="submit">排序</a>
    </div>
</form>
</div>
</body>
<script src="/static/common/js/jquery/jquery-1.12.3.min.js"></script>
<script src="/static/common/js/layer/layer.js"></script>
<script src="/static/admin/js/common.ajax.js"></script>
</html>