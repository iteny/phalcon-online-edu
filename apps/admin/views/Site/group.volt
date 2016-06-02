<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>用户组管理</title>
    <link href="/static/admin/css/frame.css" rel="stylesheet">
</head>
<body>
<div id="frame-top">
    当前位置&nbsp;<i class="iconfont" style="color:#666;font-size: 12px;">&#xe60e;</i>&nbsp;&nbsp;设置&nbsp;&nbsp;<i class="iconfont" style="color:#666;font-size: 12px;">&#xe60f;</i>&nbsp;&nbsp;用户设置&nbsp;&nbsp;<i class="iconfont" style="color:#666;font-size: 12px;">&#xe60f;</i>&nbsp;&nbsp;用户组管理
</div>
<div id="frame-toolbar">
    <ul>
        <li><a class="active" href="/admin/Site/group"><i class="iconfont" style="color:white;font-size: 16px;">&#xe611;</i>&nbsp;&nbsp;用户组管理</a></li>
        <li><a href="/admin/Site/addEditGroup"><i class="iconfont" style="color:white;font-size: 16px;">&#xe610;</i>&nbsp;&nbsp;添加用户组</a></li>
    </ul>
</div>
<div id="frame-content">
    <form name="commonSort" class="ajax-form" action="/admin/Site/sortGroup" method="post">
        <div class="frame-table-list">
            <table width="100%">
                <colgroup>
                    <col width="40">
                    <col width="200">
                    <col width="40">
                    <col width="80">
                </colgroup>
                <thead>
                <tr>
                    <td align="center">ID</td>
                    <td align="left">用户组名称</td>
                    <td align="center">状态</td>
                    <td align="center">操作管理</td>
                </tr>
                </thead>
                <tbody>
                {% for group in group %}
                <tr>
                    <td align="center">{{group['id']|e}}</td>
                    <td align="left">{{group['title']|e}}</td>
                    <td align="center">{% if group['status'] == 1 %}<i class="iconfont" style="color:green;font-size: 16px;">&#xe60c;</i>{% else %}<i class="iconfont" style="color:red;font-size: 16px;">&#xe60a;</i>{% endif %}</td>
                    <td align="center">
                        {% if group['id'] == 1 %}
                        <a class="ajax-add blue" style="background: #666;border-color:#666"><i class="iconfont" style="color:white;font-size: 16px;">&#xe610;</i>&nbsp;&nbsp;权限设置</a>&nbsp;&nbsp;
                        <a class="ajax-edit blue" style="background: #666;border-color:#666"><i class="iconfont" style="color:white;font-size: 16px;">&#xe615;</i>&nbsp;&nbsp;修改</a>&nbsp;&nbsp;
                        <a class="ajax-edit red" style="background: #666;border-color:#666"><i class="iconfont" style="color:white;font-size: 16px;">&#xe614;</i>&nbsp;&nbsp;删除</a>
                        {% else %}
                        <a class="ajax-add blue" href="/admin/Site/setGroup/?id={{group['id']|e}}" data-level="{{menu['level']|e}}"><i class="iconfont" style="color:white;font-size: 16px;">&#xe610;</i>&nbsp;&nbsp;权限设置</a>&nbsp;&nbsp;&nbsp;<a class="ajax-edit blue" href="/admin/Site/addEditGroup/?id={{group['id']|e}}"><i class="iconfont" style="color:white;font-size: 16px;">&#xe615;</i>&nbsp;&nbsp;修改</a>&nbsp;&nbsp;&nbsp;<a class="ajax-del red" data-title="{{group['title']|e}}" data-type="用户组" href="/admin/Site/delGroup" data-id="{{group['id']|e}}"><i class="iconfont" style="color:white;font-size: 16px;">&#xe614;</i>&nbsp;&nbsp;删除</a>
                        {% endif %}
                    </td>
                </tr>
                {% endfor %}
                </tbody>
            </table>
            <!-- <div class="p10"><div class="pages">  </div> </div> -->

        </div>
        <!--<div class="frame-table-btn">-->
            <!--<button class="btn ajax-sort" type="submit">排序</button>-->
        <!--</div>-->
    </form>
</div>
</body>
<script src="/static/common/js/jquery/jquery-1.12.3.min.js"></script>
<script src="/static/common/js/layer/layer.js"></script>
<script src="/static/admin/js/admin.common.js"></script>
<script src="/static/admin/js/common.ajax.js"></script>
</html>