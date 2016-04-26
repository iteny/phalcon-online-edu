
<html>
    <!--<head>-->
        <!--<title>Some amazing website</title>-->
        <!--<?php $this->assets->outputCss() ?>-->
    <!--</head>-->
    <body>
    <!--<span></span>-->
    <span></span>

    <a href="/admin/user/index/?name=222">asdfasd</a>
    <?php echo $user; ?>
    <ul>
        <?php foreach ($name as $robot) { ?>
            <li>
                <?php echo $this->escaper->escapeHtml($robot->id); ?>
                <?php echo $this->escaper->escapeHtml($robot->username); ?>
                <?php echo $this->escaper->escapeHtml($robot->password); ?>
            </li>
        <?php } ?>
    </ul>

    </body>
<html>
