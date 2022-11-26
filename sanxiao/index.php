<?php 
require('core.php');
C(require('config.php'));
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>🐑 Yang | Game 🐑</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta charset="utf-8"/>
    <meta name="csdn-baidu-search" content="小闪工作室">
    <meta name="description"content="小闪工作室">
    <meta name="keywords" content="qierkang,shutiao,erkang,xyqierkang@163.com"/>
    <meta name="viewport" content="width=device-width,user-scalable=no,initial-scale=1, minimum-scale=1,maximum-scale=1"/>
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="format-detection" content="telephone=no">
    <meta name="renderer" content="webkit"/>
    <meta name="force-rendering" content="webkit"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta name="msapplication-tap-highlight" content="no">
    <meta name="full-screen" content="yes"/>
    <meta name="x5-fullscreen" content="true"/>
    <meta name="360-fullscreen" content="true"/>
    <meta name="screen-orientation" content=""/>
    <meta name="x5-orientation" content="">
    <meta name="x5-page-mode" content="app">
    <link href="css/button.css" rel="stylesheet" type="text/css">
</head>
<body>
<canvas id="GameCanvas" oncontextmenu="event.preventDefault()" tabindex="0"></canvas>
   <audio style="display:none; height: 0" id="bg-music" preload="auto" src="<?php echo C('bjyy')?C('bjyy'):'static/bg.mp3'?>" loop></audio>
    <div id="musicBtn"></div>
    <script type="text/javascript">
                document.body.style.cssText = "background: url(<?php echo C('bjt')?C('bjt'):'static/image/bg.png'?>) #b0e6ce no-repeat;background-size: 100% auto; backoverflow-x: hidden; margin:0; padding:0;";
        $(document).ready(function(){
        $("#share").click(function(){
            $("#mask").show();
            $("#tip").show();
            scroll(0,0);
            return false;
        });
        $("#mask").click(function(){
            return;
            if($("#mask").is(":visible")){
                $("#mask").hide();
                $("#tip").hide();
            }
            return false;
        });
        $("#mask2").click(function(){
            $("#mask2").hide();
            $(".mask-poptip").hide();
        });
    });
    
    </script>
    <!--开始游戏-->
<div style="margin-top:72%">
<button style="display: flex;justify-content: center;">
    <a href="h5/index.php">
    <span class="TxtEffect">PLAY</span>
    </a>
</button>
</div>
<!--参加人数-->
<div class="spinner" style="text-align: center;">
  <span><h5>* 已有<?php echo (int)C('cjrs')+D('lottory','',3)?>人参与</h5></span>
<?php 
$l = D('award',array('order'=>'rotate'));
?>
</div>
<!--游戏说明-->
 <div id="mask-rule" style="margin-top:10%">
            <div class="box-rule">
                <span class="star"></span>
                <span id="close-rule"></span>
                <div class="con">
                    <div class="text" style="width:80%;margin: 0 auto;">
                        <?php echo str_htmldecode(C('info'))?><br>
                </div>
            </div>
        </div>
</body>
</html>
