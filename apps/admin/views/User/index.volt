
<html>
    <!--<head>-->
        <!--<title>Some amazing website</title>-->
        <!--<?php $this->assets->outputCss() ?>-->
    <!--</head>-->
    <body>
    <!--<span></span>-->
    <span></span>

    <a href="/admin/user/index/?name=222">asdfasd</a>
    {{user}}
    <ul>
        {% for robot in name %}
            <li>
                {{ robot.id|e }}
                {{ robot.username|e }}
                {{ robot.password|e }}
            </li>
        {% endfor %}
    </ul>

    </body>
<html>
