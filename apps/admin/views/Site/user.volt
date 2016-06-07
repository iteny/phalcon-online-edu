<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>用户管理</title>
    <link href="/static/admin/css/frame.css" rel="stylesheet">
</head>
<body>
<div id="frame-top">
    当前位置&nbsp;<i class="iconfont" style="color:#666;font-size: 12px;">&#xe60e;</i>&nbsp;&nbsp;设置&nbsp;&nbsp;<i class="iconfont" style="color:#666;font-size: 12px;">&#xe60f;</i>&nbsp;&nbsp;用户设置&nbsp;&nbsp;<i class="iconfont" style="color:#666;font-size: 12px;">&#xe60f;</i>&nbsp;&nbsp;用户管理
</div>
<div id="frame-toolbar">
    <ul>
        <li><a class="active" href="/admin/Site/user"><i class="iconfont" style="color:white;font-size: 16px;">&#xe611;</i>&nbsp;&nbsp;用户管理</a></li>
        <li><a href="/admin/Site/addEditUser"><i class="iconfont" style="color:white;font-size: 16px;">&#xe610;</i>&nbsp;&nbsp;添加用户</a></li>
    </ul>
</div>
<div id="frame-content">
    <form name="commonSort" class="ajax-form" action="/admin/Site/sortUser" method="post">
        <div class="frame-table-list">
            <table width="100%">
                <colgroup>
                    <col width="40">
                    <col width="80">
                    <col width="40">
                    <col width="80">
                    <col width="40">
                    <col width="80">
                    <col width="40">
                    <col width="40">
                    <col width="80">
                </colgroup>
                <thead>
                <tr>
                    <td align="center">ID</td>
                    <td align="center">用户名</td>
                    <td align="center">所属用户组</td>
                    <td align="center">创建时间</td>
                    <td align="center">创建IP</td>
                    <td align="center">E-Mail</td>
                    <td align="center">备注</td>
                    <td align="center">是否启用</td>
                    <td align="center">操作管理</td>
                </tr>
                </thead>
                <tbody>
                {% for user in user %}
                <tr>
                    <td align="center">{{user['id']|e}}</td>
                    <td align="center">{{user['username']}}</td>
                    <td align="center">{{user['title']|e}}</td>
                    <td align="center">{{date('Y年m月d日',user['create_time']|e)}}</td>
                    <td align="center">{{user['create_ip']}}</td>
                    <td align="center">{{user['email']|e}}</td>
                    <td align="center">{{user['remark']|e}}</td>
                    <td align="center">{% if user['status'] == 1 %}<i class="iconfont" style="color:green;font-size: 16px;">&#xe60c;</i>{% else %}<i class="iconfont" style="color:red;font-size: 16px;">&#xe60a;</i>{% endif %}</td>
                    <td align="center">
                        {% if user['id'] == 1 %}

                        <a class="ajax-edit blue" style="background: #666;border-color:#666"><i class="iconfont" style="color:white;font-size: 16px;">&#xe615;</i>&nbsp;&nbsp;修改</a>&nbsp;&nbsp;
                        <a class="ajax-edit red" style="background: #666;border-color:#666"><i class="iconfont" style="color:white;font-size: 16px;">&#xe614;</i>&nbsp;&nbsp;删除</a>
                        {% else %}
                        <a class="ajax-edit blue" href="/admin/Site/addEditUser/?id={{user['id']|e}}"><i class="iconfont" style="color:white;font-size: 16px;">&#xe615;</i>&nbsp;&nbsp;修改</a>&nbsp;&nbsp;&nbsp;<a class="ajax-del red" data-title="{{user['username']|e}}" data-type="用户" href="/admin/Site/delUser" data-id="{{user['id']|e}}"><i class="iconfont" style="color:white;font-size: 16px;">&#xe614;</i>&nbsp;&nbsp;删除</a>
                        {% endif %}
                    </td>
                </tr>
                {% endfor %}
                </tbody>
            </table>
            <!-- <div class="p10"><div class="pages">  </div> </div> -->

        </div>
    </form>
</div>
</body>
<script src="/static/common/js/jquery/jquery-1.12.3.min.js"></script>
<script src="/static/common/js/layer/layer.js"></script>
<script src="/static/admin/js/admin.common.js"></script>
<script src="/static/admin/js/common.ajax.js"></script>
</html>