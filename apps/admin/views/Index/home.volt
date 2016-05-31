<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>后台首页</title>
    <link href="/static/admin/css/frame.css" rel="stylesheet">
    <style>
        tr{border-left: none;}
        td{border-right: none;}
    </style>
</head>
<body>
<div id="frame-top">
    当前位置&nbsp;<i class="iconfont" style="color:#666;font-size: 12px;">&#xe60e;</i>&nbsp;&nbsp;后台首页
</div>
<div id="frame-content" style="margin-top:32px;">
    <table width="100%" border="0" cellspacing="10" cellpadding="0" class="indexBoxTwo">
        <tbody>
            <tr>
                <td width="49%" border="0" cellspacing="0" cellpadding="0" class="home">
                    <div class="frame-table-list">
                        <table width="100%">
                            <thead>
                            <div class="title">用户信息</div>
                            </thead>
                            <tbody>
                            <tr>
                                <td width="120" align="right">您好&nbsp;：</td>
                                <td>iteny</td>
                            </tr>
                            <tr>
                                <td width="120" align="right">所属角色&nbsp;：</td>
                                <td>超级管理员</td>
                            </tr>
                            <!--{% for key,val in loginlog if key < 1 %}-->
                            <tr>
                                <td width="120" align="right">项目开发者&nbsp;：</td>
                                <td>河马叔叔[<a style="color: #4169E1">8192332@qq.com</a>]</td>
                            </tr>
                            <tr>
                                <td width="120" align="right">github地址&nbsp;：</td>
                                <td>https://github.com/iteny</td>
                            </tr>
                            <tr>
                                <td width="120" align="right">二次开发手册&nbsp;：</td>
                                <td><a style="color: #4169E1" href="">http://www.hemacms.com/docs</a></td>
                            </tr>
                            <!--{% endfor %}-->
                            <tr>
                                <td width="120" align="right">产品名称&nbsp;：</td>
                                <td>河马CMS[<a style="color: #4169E1" href="#">访问官网</a>]</td>
                            </tr>
                            <tr>
                                <td width="120" align="right">用户类型&nbsp;：</td>
                                <td>开源使用</td>
                            </tr>
                            <tr>
                                <td width="120" align="right">产品版本&nbsp;：</td>
                                <td>0.1</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </td>
                <td height="200" width="51%" border="0" cellspacing="0" cellpadding="0">
                    <div class="frame-table-list">
                        <table width="100%">
                            <thead>
                            <div class="title">系统信息</div>
                            </thead>
                            <tbody>
                                <?php $i = 0; ?>
                                {% for key,val in systeminfo %}
                                    <?php $i++; ?>
                                    {% if i%2==1 %}
                                       <?php echo "<tr>";?>
                                    {% endif %}

                                    <td width="180" align="right">{{key}}&nbsp;：</td>
                                    <td>{{val}}</td>
                                    {% if i%2==0 %}
                                        <?php echo "</tr>";?>
                                    {% endif %}


                                {% endfor %}


                            </tbody>
                        </table>
                    </div>
                </td>

            </tr>
            <tr>
                <td width="49%" border="0" cellspacing="0" cellpadding="0" class="home">
                    <div class="frame-table-list">
                        <table width="100%">
                            <thead>
                            <div class="title">近期登录</div>
                            </thead>
                            <tbody>
                                {% for log in loginlog %}
                                <tr>
                                    <td width="90" align="right">登录时间&nbsp;：</td>
                                    <td>{{date("Y年m月d日 H点i分s秒",log.logintime)}}</td>
                                    <td width="90" align="right">登录IP&nbsp;：</td>
                                    <td>{{log.loginip}}</td>
                                    <td width="90" align="right">登录地点&nbsp;：</td>
                                    <td>{{log.country}}</td>
                                </tr>
                                {% endfor %}
                            </tbody>
                        </table>
                    </div>
                </td>
            </tr>
            <tr>
                <td width="49%" border="0" cellspacing="0" cellpadding="0" class="home">
                    <div class="frame-table-list">
                        <table width="100%">
                            <thead>
                            <div class="title">开发日志</div>
                            </thead>
                            <tbody>
                            {% for log in loginlog %}
                            <tr>
                                <td width="140" align="right">{{date("Y年m月d日",log.logintime)}}&nbsp;：</td>
                                <td>发布0.1版本</td>
                            </tr>
                            {% endfor %}
                            </tbody>
                        </table>
                    </div>
                </td>
            </tr>

        </tbody>
    </table>
</div>
</body>
</html>