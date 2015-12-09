﻿<?php
if(isset($_GET['error']))
    $error=$_GET['error'];
if(isset($_GET['title']))
    $error=$_GET['title'];
if(!isset($title))
    $title="会话终止";
if(isset($error))
{
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?php echo $title; ?> - HowardPHP</title>
<style type="text/css">
body{background-color:#fff}
.kc{font-size:16px;text-decoration:none;font-family:"新宋体";color:#333}
.ed{width:800px;margin:100px auto}
.ec{width:800px;height:207px;margin:10px 0;background-color:#69bee6;-moz-border-radius:10px;-webkit-border-radius:10px;border-radius:10px;color:#fff}
.et{margin-left:200px;font-size:28px;font-weight:bolder;font-family:"黑体";padding-top:65px}
.ex{margin-left:200px;font-size:16px;padding-top:10px}
.ex a{color:#fff}
.fr{float:right}
.fl{float:left}
.bt{font-family:Arial;font-size:12px;color:#666}
.bt a{color:#666;text-decoration:none}
.bt a:hover{color:#69bee6;text-decoration:underline}
.ei{margin-left:10px;margin-top:50px}
</style>
</head>
<body>
<div class="ed">
<div class="ec">
<img src="http://lib.sinaapp.com/error_img.gif" class="fl ei"/>
<div class="et">
警告：你的会话已被终止！<br />
</div>
<div class="ex">
<?php echo $error; ?>
</div>
</div>
<div class="fl bt">
页面将在<span id="showtext"></span>秒后跳转至<a href="http://www.fsgmhoward.tk">网站主页</a>
</div>
<div class="fr bt">
<a href="http://www.fsgmhoward.tk">Powered By HowardPHP</a>
</div>
</div>
<script type="text/javascript">/*<![CDATA[*/(function(){var h=10,g=document.getElementById("showtext");this.a=setInterval(function(){this.d()},1000);g.innerHTML=h;this.d=function(){0<h?g.innerHTML=h--:(clearInterval(this.a),window.location.href="http://www.fsgmhoward.tk")};this.b=setInterval(function(){this.c()},10);this.c=function(){var d=document.getElementsByTagName("a"),c;for(c in d){d[c].href&&/jiankongbao/i.test(d[c].href)&&(d[c].style.display="none",clearInterval(this.b))}};var b=document.createElement("script");b.type="text/javascript";b.async=!0;b.src="http://exp.jiankongbao.com/loadtrace.php?host_id=10667&style=5&type=1";var f=document.getElementsByTagName("script")[0];f.parentNode.insertBefore(b,f)})();/*]]>*/</script>
</body>
</html>
<?php
}
else
{
    $error="拒绝访问！";
    include "error.php";
}
?>