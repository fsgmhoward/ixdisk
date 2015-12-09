<?php
session_start();
if(isset($_POST['down']))
{
    if($_POST['code']==NULL)
	    echo("<script>alert('下载错误！你没有填写验证码！');location.replace('index.php?action=download');</script>");
    if(strtolower($_POST['code'])!=$_SESSION['safecode'])
	    echo("<script>alert('下载错误！你没有填写正确验证码！');location.replace('index.php?action=download');</script>");
	$fileid = $_POST['fileid'];
	if (!file_exists("./stream/".$fileid.".zip"))
	    echo("<script>alert('下载错误！文件不存在！');location.replace('index.php?action=download');</script>");
    $ip = $_SERVER['REMOTE_ADDR'];
	include "geturlnow.php";
	$url = $_SERVER['HTTP_HOST']."\downloadnow.php?acckey=".$acckey;
	include "dl_encode.php";
}
else
{
    $title = "拒绝访问！";
    $error = "你无权访问该页面！";
	include "./error.php";
	return;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>欢迎来到第九网盘！</title>
<link href="style.css" rel="stylesheet" type="text/css" media="screen" />
</head>
<body>
<div id="wrapper">
	<div id="page">
		<div id="page-bgtop">
			<div id="page-bgbtm">
				<div id="content">
					<div class="post">
						<h2 class="title"><center>欢迎来到第九网盘！</center></h2>
						<?php
						include "./size.php";
						?>
						<div style="clear: both;">&nbsp;</div>
						    <div class="entry">
								<p>请点击下面的链接进行下载！</p>
								<p>普通下载：<a href='<?php echo $url; ?>'>点击这里</a></p>
								<p>迅雷下载：<a href='<?php echo $url_thunder; ?>'>点击这里</a></p>
								<p>快车下载：<a href='<?php echo $url_flashget; ?>'>点击这里</a></p>
								<p>旋风下载：<a href='<?php echo $url_qqdl; ?>'>点击这里</a></p>
						    </div>
					</div>
				</div>
				<!-- end #content -->
				<div id="sidebar">
					<div id="logo">
						<h1><a href="">IXDisk</a></h1>
						<p></p>
					</div>
					<div id="menu">
						<ul>
							<li><a href="?action=download">下载</a></li>
							<li class="current_page_item"><a href="?action=upload">上传</a></li>
							<li><a href="?action=howardphp">关于本程序</a></li>
						</ul>
					</div>
				</div>
				<!-- end #sidebar -->
				<div style="clear: both;">&nbsp;</div>
			</div>
		</div>
	</div>
	<!-- end #page -->
</div>
<div id="footer">
	<p>Powered by <i>IXDisk V1 Beta 1</i> . Copyright &copy; 2013 FSGM-Howard@IXPHP Group. All rights reserved.</p>
</div>
<!-- end #footer -->
</body>
</html>