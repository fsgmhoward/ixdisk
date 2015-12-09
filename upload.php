<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>欢迎来到第九网盘！</title>
<script type="text/javascript" src="./safepic.js"></script>
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
						        <p>分享文件其实很简单，现在就来上传你的文件吧！</p>
								<p><font color="red"><img src="./images/warning.ico" height="20" width="20"/>注意：上传的文件必须是ZIP格式，否则无法下载！为了节省服务器资源，请在压缩时选用最大压缩比！</font></p>
								<form enctype="multipart/form-data" method="post">
								<p>你的文件：<input type="file" name="myFile"></p>
								<p>请输入验证码（不区分大小写）：<input type="text" name="code"><img src="./createsc.php" width="70" height="25" alt="若看不清图片请点击！"  title="若看不清图片请点击！" id="safepic" onclick="javascript:reload_safepic()"/></p>
								<p><a title="点击放大图片" target="_self" href="javascript:safepic();" id="pictext">点击放大图片</a></p>
								<p><input type="submit" name="up" value="上传文件"></p>
								</form>
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
<?php

if(isset($_POST['up']))
{
    echo "<script>alert('OK！');</script>";
    if($_POST['code']==NULL)
        {
	    echo("<script>alert('上传错误！你没有填写验证码！');location.replace('?action=upload');</script>");
        }
    if(strtolower($_POST['code'])!=$_SESSION['safecode'])
	{
	    echo("<script>alert('上传错误！你没有填写正确验证码！');location.replace('?action=upload');</script>");
	}
	if($_FILES['myFile']['error'] > 0)
		echo("<script>alert('上传错误！错误号：".$_FILES['myFile']['error'].";location.replace('?action=upload');</script>");
	else
	{
		if(@$_FILES['myFile']['type'] == "application/x-zip-compressed")
		{
		    $tmp_name = $_FILES['myFile']['tmp_name'];
			$fileid = md5_file($tmp_name);
			$dir = './stream';
			$dirx = opendir($dir);
			if($dirx)
			{
			   while(FALSE !== ($file = readdir($dirx)))
			    {
			       if($fileid.".zip" == $file)
				       echo("<script>alert('上传错误！错误原因：本文件已经存在。文件ID为:".$fileid."');location.replace('?action=upload');</script>");
 			    }
			}
		    $newname = "./stream/".$fileid.".zip";
			if(rename($tmp_name,($dir."/".$fileid.".zip")))
			    echo("<script>location.replace('?action=success&fileid=".$fileid."');</script>");
		}
	    else
	        echo("<script>alert('上传错误！错误原因：文件类型不为ZIP。若确认文件是ZIP格式，请换一个浏览器上传！（经过测试，IE可以正常上传！）你的文件类型是：".$_FILES['myFile']['type']."');location.replace('?action=upload');</script>");
	}
	
}
?>