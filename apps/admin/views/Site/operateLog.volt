<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>操作日志</title>
    <link href="/static/admin/css/frame.css" rel="stylesheet">
</head>
<body>
<div id="frame-top">
    当前位置&nbsp;<i class="iconfont" style="color:#666;font-size: 12px;">&#xe60e;</i>&nbsp;&nbsp;设置&nbsp;&nbsp;<i class="iconfont" style="color:#666;font-size: 12px;">&#xe60f;</i>&nbsp;&nbsp;日志管理&nbsp;&nbsp;<i class="iconfont" style="color:#666;font-size: 12px;">&#xe60f;</i>&nbsp;&nbsp;登录日志
</div>
<div id="frame-toolbar">
    <ul>
        <li><a class="active" href="/admin/Site/operateLog"><i class="iconfont" style="color:white;font-size: 16px;">&#xe611;</i>&nbsp;&nbsp;操作日志</a></li>
        <li><a class="ajax-del" data-type="操作日志" data-title="一个月前" href="/admin/Site/delOperateLog"><i class="iconfont" style="color:white;font-size: 16px;">&#xe610;</i>&nbsp;&nbsp;删除一个月前的操作操作日志</a></li>
    </ul>
</div>
<div id="frame-content">
    <div class="frame-table-list">
        <div class="input-title">搜索</div>
        <form method="get" action="/admin/Site/operateLog">
            <!--<input type="hidden" name="search" value="ok">-->
            <div class="search-content">
                搜索类型：
                <select class="select_2" name="status" style="width:70px;">
                    <option value='' <?php if($status == ''){ ?>selected<?php } ?>>不限</option>
                    <option style="color:green" value="1" <?php if($status == '1'){ ?>selected<?php } ?>>登陆成功</option>
                    <option style="color:red" value="0" <?php if($status == '0'){ ?>selected<?php } ?>>登陆失败</option>
                </select>
                用户名：<input type="text" class="input length_2" name="username" size="10" value="{{username}}" placeholder="用户名">
                IP：<input type="text" class="input length_2" name="loginip" size="20" value="{{loginip}}" placeholder="IP">
                时间：
                <input type="text" name="start_time" class="input length_2 my-date" value="" style="width:140px;">
                -
                <input type="text" class="input length_2 my-date" name="end_time" value="" style="width:140px;">
                <button class="btn" style="height: 30px;line-height: 30px;padding-bottom: 31px;">搜索</button>
            </div>
        </form>
    </div>
    <form name="commonSort" class="ajax-form" action="/admin/Site/sortUser" method="post">
        <div class="frame-table-list">
            <table width="100%">
                <!--<colgroup>-->
                <!--<col width="10">-->
                <!--<col width="30">-->
                <!--<col width="30">-->
                <!--<col width="5">-->
                <!--<col width="280">-->
                <!--<col width="60">-->
                <!--<col width="40">-->
                <!--<col width="40">-->
                <!--</colgroup>-->
                <thead>
                <tr>
                    <td align="center" width="40">ID</td>
                    <td align="center" width="100">操作用户</td>
                    <td align="left" width="300">操作说明</td>
                    <td align="center">请求路径</td>
                    <td align="center">状态</td>
                    <td align="center" width="300">用户浏览器信息</td>
                    <td align="center">时间</td>
                    <td align="center" width="100">IP</td>
                    <td align="center">用户登录地区</td>
                </tr>
                </thead>
                <tbody>
                {% for i,log in page.items %}
                <tr>
                    <td align="center">{{log.id|e}}</td>
                    <td align="center">{{log.username}}</td>
                    <td align="left">{{log.info}}</td>
                    <td align="center">{{log.get}}</td>
                    <td align="center">{% if log.status == 1 %}<i class="iconfont" style="color:green;font-size: 16px;">&#xe60c;</i>{% else %}<i class="iconfont" style="color:red;font-size: 16px;">&#xe60a;</i>{% endif %}</td>
                    <td align="center">{{log.useragent}}</td>
                    <td align="center">{{date('Y年m月d日 H:i:s',log.time|e)}}</td>
                    <td align="center">{{log.ip|e}}</td>
                    <td align="center">{{log.country}}</td>
                    <!--<td align="center">-->
                    <!--{% if user['id'] == 1 %}-->

                    <!--<a class="ajax-edit blue" style="background: #666;border-color:#666"><i class="iconfont" style="color:white;font-size: 16px;">&#xe615;</i>&nbsp;&nbsp;修改</a>&nbsp;&nbsp;-->
                    <!--<a class="ajax-edit red" style="background: #666;border-color:#666"><i class="iconfont" style="color:white;font-size: 16px;">&#xe614;</i>&nbsp;&nbsp;删除</a>-->
                    <!--{% else %}-->
                    <!--<a class="ajax-edit blue" href="/admin/Site/addEditUser/?id={{user['id']|e}}"><i class="iconfont" style="color:white;font-size: 16px;">&#xe615;</i>&nbsp;&nbsp;修改</a>&nbsp;&nbsp;&nbsp;<a class="ajax-del red" data-title="{{user['username']|e}}" data-type="用户" href="/admin/Site/delUser" data-id="{{user['id']|e}}"><i class="iconfont" style="color:white;font-size: 16px;">&#xe614;</i>&nbsp;&nbsp;删除</a>-->
                    <!--{% endif %}-->
                    </td>
                </tr>
                {% endfor %}
                </tbody>
            </table>
            <div id="page">
                <div class="pages">
                    <?php if($page->current == 1){ ?>
                    <span>首页</span>
                    <?php }else{ ?>
                    <a href="/admin/Site/operateLog?status=<?= $status; ?>&username=<?= $username; ?>&loginip=<?= $loginip; ?>&start_time=<?= $start_time; ?>&end_time=<?= $end_time; ?>&">首页</a>
                    <?php } ?>
                    <?php if($page->current == $page->before){ ?>
                    <span>上一页</span>
                    <?php }else{ ?>
                    <a href="/admin/Site/operateLog?status=<?= $status; ?>&username=<?= $username; ?>&loginip=<?= $loginip; ?>&start_time=<?= $start_time; ?>&end_time=<?= $end_time; ?>&page=<?= $page->before; ?>">上一页</a>
                    <?php } ?>
                    <?php if($page->current == $page->next){ ?>
                    <span>下一页</span>
                    <?php }else{ ?>
                    <a href="/admin/Site/operateLog?status=<?= $status; ?>&username=<?= $username; ?>&loginip=<?= $loginip; ?>&start_time=<?= $start_time; ?>&end_time=<?= $end_time; ?>&page=<?= $page->next; ?>">下一页</a>
                    <?php } ?>
                    <?php if($page->current == $page->last){ ?>
                    <span>末页</span>
                    <?php }else{ ?>
                    <a href="/admin/Site/operateLog?status=<?= $status; ?>&username=<?= $username; ?>&loginip=<?= $loginip; ?>&start_time=<?= $start_time; ?>&end_time=<?= $end_time; ?>&page=<?= $page->last; ?>">末页</a>
                    <?php } ?>
                    <?php echo "页码：", $page->current, "/", $page->total_pages; ?>
                </div>
            </div>

        </div>
    </form>
</div>
</body>
<script src="/static/common/js/jquery/jquery-1.12.3.min.js"></script>
<script src="/static/common/js/datetimepicker/build/jquery.datetimepicker.full.min.js"></script><!--时间插件-->
<link href="/static/common/js/datetimepicker/jquery.datetimepicker.css" rel="stylesheet" /> <!--时间插件CSS-->
<script src="/static/common/js/layer/layer.js"></script>
<script src="/static/admin/js/admin.common.js"></script>
<script src="/static/admin/js/common.ajax.js"></script>
<script>
    $.datetimepicker.setLocale('ch');
    $('.my-date').datetimepicker({lang:'ch'});
</script>
</html>