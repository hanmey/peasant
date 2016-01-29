<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title><?php echo $this->config->item('project_name'); ?></title>
    <link rel="stylesheet" href="/public/css/style.css">

    <script type="text/javascript" src="/public/js/jquery.min.js"></script>

    <script type="text/javascript" src="/public/js/date.js"></script>
</head>

<body>

<div class="top"> <img class="logo" src="<?php $logo = $this->config->item('project_logo'); echo $logo['admin']?>">
    <div class="tab1" id="tab1">
        <div class="menu">

            <ul class="nav">
                <li id="one0" onclick="setTab('one',6)"><a href="#"><img src="/public/images/1430958346122214_06.png">
                        <p>回到首页</p>
                    </a></li>
                <?php $list =  $this->config->item('admin_menu'); foreach($list as $key=>$value):?>
                <li><a href="#"><img src="<?php echo $value['icon'];?>">
                        <p><?php echo $value['title']; ?></p>
                    </a></li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>
<div class="content" id="con_one_6" style="display:block;">
    <div class="meduo">
        <div class="hyy">
            <p>欢迎页</p>
        </div>
    </div>
</div>
