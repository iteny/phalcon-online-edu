<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>登录日志</title>
    <link href="/static/admin/css/frame.css" rel="stylesheet">
</head>
<body>
<div id="frame-top">
    当前位置&nbsp;<i class="iconfont" style="color:#666;font-size: 12px;">&#xe60e;</i>&nbsp;&nbsp;设置&nbsp;&nbsp;<i class="iconfont" style="color:#666;font-size: 12px;">&#xe60f;</i>&nbsp;&nbsp;日志管理&nbsp;&nbsp;<i class="iconfont" style="color:#666;font-size: 12px;">&#xe60f;</i>&nbsp;&nbsp;登录日志
</div>
<div id="frame-toolbar">
    <ul>
        <li><a class="active" href="/admin/Site/loginLog"><i class="iconfont" style="color:white;font-size: 16px;">&#xe611;</i>&nbsp;&nbsp;登录日志</a></li>
        <li><a class="ajax-del" href="/admin/Site/delLoginLog"><i class="iconfont" style="color:white;font-size: 16px;">&#xe610;</i>&nbsp;&nbsp;删除一个月前的登录日志</a></li>
    </ul>
</div>
<div id="frame-content">
    <div class="frame-table-list">
        <div class="input-title">用户信息</div>
        <form method="get" action="/Intendant/Site/loginLog">
            <div class="search-content">
                     搜索类型：
                  <select class="select_2" name="status" style="width:70px;">
                      <option value="" selected="">不限</option>
                      <option style="color:green" value="1">登陆成功</option>
                      <option style="color:red" value="0">登陆失败</option>
                  </select>
                    用户名：<input type="text" class="input length_2" name="username" size="10" value="" placeholder="用户名">
                    IP：<input type="text" class="input length_2" name="loginip" size="20" value="" placeholder="IP">
                    时间：
                    <input type="text" name="start_time" class="input length_2 J_date date" value="" style="width:80px;">
                    -
                    <input type="text" class="input length_2 J_date date" name="end_time" value="" style="width:80px;">
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
                    <td align="center">ID</td>
                    <td align="center" width="100">用户名</td>
                    <td align="center">登录信息</td>
                    <td align="center">状态</td>
                    <td align="center">用户浏览器信息</td>
                    <td align="center">时间</td>
                    <td align="center">IP</td>
                    <td align="center">用户登录地区</td>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($loginLog as $log) { ?>
                <tr>
                    <td align="center"><?php echo $this->escaper->escapeHtml($log['id']); ?></td>
                    <td align="center"><?php echo $log['username']; ?></td>
                    <td align="center"><?php echo $this->escaper->escapeHtml($log['info']); ?></td>
                    <td align="center"><?php if ($log['status'] == 1) { ?><i class="iconfont" style="color:green;font-size: 16px;">&#xe60c;</i><?php } else { ?><i class="iconfont" style="color:red;font-size: 16px;">&#xe60a;</i><?php } ?></td>
                    <td align="center"><?php echo $log['useragent']; ?></td>
                    <td align="center"><?php echo date('Y年m月d日 H:i:s', $this->escaper->escapeHtml($log['logintime'])); ?></td>
                    <td align="center"><?php echo $this->escaper->escapeHtml($log['loginip']); ?></td>
                    <td align="center"><?php echo $log['country']; ?></td>
                    <!--<td align="center">-->
                        <!--<?php if ($user['id'] == 1) { ?>-->

                        <!--<a class="ajax-edit blue" style="background: #666;border-color:#666"><i class="iconfont" style="color:white;font-size: 16px;">&#xe615;</i>&nbsp;&nbsp;修改</a>&nbsp;&nbsp;-->
                        <!--<a class="ajax-edit red" style="background: #666;border-color:#666"><i class="iconfont" style="color:white;font-size: 16px;">&#xe614;</i>&nbsp;&nbsp;删除</a>-->
                        <!--<?php } else { ?>-->
                        <!--<a class="ajax-edit blue" href="/admin/Site/addEditUser/?id=<?php echo $this->escaper->escapeHtml($user['id']); ?>"><i class="iconfont" style="color:white;font-size: 16px;">&#xe615;</i>&nbsp;&nbsp;修改</a>&nbsp;&nbsp;&nbsp;<a class="ajax-del red" data-title="<?php echo $this->escaper->escapeHtml($user['username']); ?>" data-type="用户" href="/admin/Site/delUser" data-id="<?php echo $this->escaper->escapeHtml($user['id']); ?>"><i class="iconfont" style="color:white;font-size: 16px;">&#xe614;</i>&nbsp;&nbsp;删除</a>-->
                        <!--<?php } ?>-->
                    </td>
                </tr>
                <?php } ?>
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