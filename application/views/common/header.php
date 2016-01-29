
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title><?php echo $this->config->item('project_name'); ?></title>
    <meta name="author" content="peasant" />
    <link rel="stylesheet" type="text/css" href="/public/green/css/style.css" />
    <!--[if lt IE 9]>
    <script src="/public/green/js/html5.js"></script>
    <![endif]-->
    <script src="/public/green/js/jquery.js"></script>
    <script src="/public/green/js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script>
        (function($){
            $(window).load(function(){

                $("a[rel='load-content']").click(function(e){
                    e.preventDefault();
                    var url=$(this).attr("href");
                    $.get(url,function(data){
                        $(".content .mCSB_container").append(data); //load new content inside .mCSB_container
                        //scroll-to appended content
                        $(".content").mCustomScrollbar("scrollTo","h2:last");
                    });
                });

                $(".content").delegate("a[href='top']","click",function(e){
                    e.preventDefault();
                    $(".content").mCustomScrollbar("scrollTo",$(this).attr("href"));
                });

            });
        })(jQuery);
    </script>
</head>
<body>
<header>
    <h1><img src="<?php $logo = $this->config->item('project_logo'); echo $logo['admin']?>"/></h1>
    <ul class="rt_nav">
        <li><a href="http://www.baidu.com" target="_blank" class="website_icon">站点首页</a></li>
        <li><a href="#" class="admin_icon">DeathGhost</a></li>
        <li><a href="#" class="set_icon">账号设置</a></li>
        <li><a href="login.php" class="quit_icon">安全退出</a></li>
    </ul>
</header>
<?php require 'left_menu.php';?>
<section class="rt_wrap content mCustomScrollbar _mCS_2">
    <div id="mCSB_2_container" class="mCSB_container" style="position: relative; top: 0px; left: 0px;" dir="ltr">
<div class="rt_content">
<!--
<div class="top"> <img class="logo" src="<?php /*$logo = $this->config->item('project_logo'); echo $logo['admin']*/?>">
    <div class="tab1" id="tab1">
        <div class="menu">

            <ul class="nav">
                <li id="one0" onclick="setTab('one',6)"><a href="#"><img src="/public/BLUE/images/1430958346122214_06.png">
                        <p>回到首页</p>
                    </a></li>
                <?php /*$list =  $this->config->item('admin_menu'); foreach($list as $key=>$value):*/?>
                <li><a href="#"><img src="<?php /*echo $value['icon'];*/?>">
                        <p><?php /*echo $value['title']; */?></p>
                    </a></li>
                <?php /*endforeach; */?>
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
</div>-->
