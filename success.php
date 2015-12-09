<?php
if(isset($_GET['fileid']))
{
    if(!file_exists("./stream/".$_GET['fileid'].".zip"))
	    header("Location:http://www.fsgmhoward.tk");
}
else
    header("Location:http://www.fsgmhoward.tk");
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
						        <p>恭喜你，上传成功！</p>
								<p>你的文件信息：</p>
								<?php
								$fileid=$_GET['fileid'];
								echo ("文件编号：".$fileid."<br>");
								echo ("分享链接：<a href='http://pan.fsgmhoward.tk/?action=download&fileid=".$fileid."'>http://pan.fsgmhoward.tk/?action=download&fileid=".$fileid."</a><br>");
								echo ("文件大小:".(filesize("./stream/".$fileid.".zip")/1024)."KB<br>");
								?>
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