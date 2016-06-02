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
                <?php foreach ($user as $user) { ?>
                <tr>
                    <td align="center"><?php echo $this->escaper->escapeHtml($user['id']); ?></td>
                    <td align="center"><?php echo $user['username']; ?></td>
                    <td align="center"><?php echo $this->escaper->escapeHtml($user['title']); ?></td>
                    <td align="center"><?php echo date('Y年m月d日', $this->escaper->escapeHtml($user['create_time'])); ?></td>
                    <td align="center"><?php echo $user['create_ip']; ?></td>
                    <td align="center"><?php echo $this->escaper->escapeHtml($user['email']); ?></td>
                    <td align="center"><?php echo $this->escaper->escapeHtml($user['remark']); ?></td>
                    <td align="center"><?php if ($user['status'] == 1) { ?><i class="iconfont" style="color:green;font-size: 16px;">&#xe60c;</i><?php } else { ?><i class="iconfont" style="color:red;font-size: 16px;">&#xe60a;</i><?php } ?></td>
                    <td align="center">
                        <?php if ($user['id'] == 1) { ?>

                        <a class="ajax-edit blue" style="background: #666;border-color:#666"><i class="iconfont" style="color:white;font-size: 16px;">&#xe615;</i>&nbsp;&nbsp;修改</a>&nbsp;&nbsp;
                        <a class="ajax-edit red" style="background: #666;border-color:#666"><i class="iconfont" style="color:white;font-size: 16px;">&#xe614;</i>&nbsp;&nbsp;删除</a>
                        <?php } else { ?>
                        <a class="ajax-edit blue" href="/admin/Site/addEditGroup/?id=<?php echo $this->escaper->escapeHtml($group['id']); ?>"><i class="iconfont" style="color:white;font-size: 16px;">&#xe615;</i>&nbsp;&nbsp;修改</a>&nbsp;&nbsp;&nbsp;<a class="ajax-del red" data-title="<?php echo $this->escaper->escapeHtml($group['title']); ?>" data-type="用户组" href="/admin/Site/delGroup" data-id="<?php echo $this->escaper->escapeHtml($group['id']); ?>"><i class="iconfont" style="color:white;font-size: 16px;">&#xe614;</i>&nbsp;&nbsp;删除</a>
                        <?php } ?>
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