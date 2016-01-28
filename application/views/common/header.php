<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>物业管理页面</title>
    <link rel="stylesheet" href="/public/css/style.css">

    <script type="text/javascript" src="/public/js/jquery.min.js"></script>

    <script type="text/javascript" src="/public/js/date.js"></script>
    <script>
        $(document).ready(function(){
            $("#one1,#one2,#one3,#one4,#one5").click(function(){
                $("#con_one_6").css("display","none")
            })
            $("#one0").click(function(){
                $("#con_one_6").css("display","block")
            })
        })
    </script>
</head>
<body>
<div class="top"> <img class="logo" src="images/logo.png">
    <div class="tab1" id="tab1">
        <div class="menu">
            <ul class="nav">
                <li id="one0" onclick="setTab('one',6)"><a href="#"><img src="images/1430958346122214_06.png">
                        <p>回到首页</p>
                    </a></li>
                <li  id="one1" onclick="setTab('one',1)"><a href="#"><img src="images/14309583461214_06.png">
                        <p>服务管理</p>
                    </a></li>
                <li id="one2" onclick="setTab('one',2)"><a href="#"><img src="images/14309583461214_08.png">
                        <p>财务管理</p>
                    </a></li>
                <li id="one3" onclick="setTab('one',3)"><a href="#"><img src="images/14309583461214_16.png">
                        <p>家政服务</p>
                    </a></li>
                <li id="one4" onclick="setTab('one',4)"><a href="#"><img src="images/14309583461214_18.png">
                        <p>资源管理</p>
                    </a></li>
                <li id="one5" onclick="setTab('one',5)"><a href="#"><img src="images/14309583461214_10.png">
                        <p>系统管理</p>
                    </a></li>
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
