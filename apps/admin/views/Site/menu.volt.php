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
        <li><a class="active" href="/admin/site/menu"><i class="iconfont" style="color:white;font-size: 16px;">&#xe611;</i>&nbsp;&nbsp;菜单设置</a></li>
        <li><a href="/admin/site/addEditMenu"><i class="iconfont" style="color:white;font-size: 16px;">&#xe610;</i>&nbsp;&nbsp;添加菜单</a></li>
    </ul>
</div>
<div id="frame-content">
<form name="commonSort" class="ajax-form" action="/admin/Site/sortMenu" method="post">
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
                <?php foreach ($adminMenu as $menu) { ?>
                <tr>
                    <td align="center"><input style="text-align: center" name="sort[<?php echo $this->escaper->escapeHtml($menu['id']); ?>]" type="text" size="3" value="<?php echo $this->escaper->escapeHtml($menu['sort']); ?>" class="input"></td>
                    <td align="center"><?php echo $this->escaper->escapeHtml($menu['id']); ?></td>
                    <td><span class="tree-icon tree-file icons-calendar-calculator_edit"></span><!-- <i class="org-2">1</i> --><?php echo str_repeat('&nbsp;&nbsp;&nbsp;',$menu['level']); ?><?php echo $menu['html']; ?><i class="iconfont icon" style=""><?php echo $this->escaper->escapeHtml($menu['icon']); ?></i><?php echo $this->escaper->escapeHtml($menu['name']); ?></td>
                    <td align="center"><?php echo $this->escaper->escapeHtml($menu['controller']); ?></td>
                    <td align="center"><?php echo $this->escaper->escapeHtml($menu['action']); ?></td>
                    <td align="center"><span class="<?php if ($menu['isshow'] == 1) { ?>green<?php } else { ?>red<?php } ?>"><?php if ($menu['isshow'] == 1) { ?>显示<?php } else { ?>不显示<?php } ?></span></td>
                    <td align="center"><a class="ajax-add blue" href="/admin/site/addEditMenu/?pid=<?php echo $this->escaper->escapeHtml($menu['id']); ?>" data-level="<?php echo $this->escaper->escapeHtml($menu['level']); ?>"><i class="iconfont" style="color:white;font-size: 16px;">&#xe610;</i>&nbsp;&nbsp;添加子菜单</a>&nbsp;&nbsp;&nbsp;<a class="ajax-edit blue" href="/admin/site/addEditMenu/?id=<?php echo $this->escaper->escapeHtml($menu['id']); ?>"><i class="iconfont" style="color:white;font-size: 16px;">&#xe615;</i>&nbsp;&nbsp;修改</a>&nbsp;&nbsp;&nbsp;<a class="ajax-del red" data-title="<?php echo $this->escaper->escapeHtml($menu['name']); ?>" data-type="菜单" href="/admin/site/delMenu" data-id="<?php echo $this->escaper->escapeHtml($menu['id']); ?>"><i class="iconfont" style="color:white;font-size: 16px;">&#xe614;</i>&nbsp;&nbsp;删除</a> </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        <!-- <div class="p10"><div class="pages">  </div> </div> -->

    </div>
    <div class="frame-table-btn">
        <button class="btn ajax-sort" type="submit">排序</button>
    </div>
</form>
</div>
</body>
<script src="/static/common/js/jquery/jquery-1.12.3.min.js"></script>
<script src="/static/common/js/layer/layer.js"></script>
<script src="/static/admin/js/admin.common.js"></script>
<script src="/static/admin/js/common.ajax.js"></script>
<script>
    $(function(){
        $('.ajax-add').on('click', function (e) {
            var data = $(this).attr('data-level');
            if(data >= 3){e.preventDefault();admin.alert('提示信息','对不起，菜单最多4级！',2,'3000');}
        });
    });
</script>
</html>