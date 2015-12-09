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
						        <p>请输入文件的ID来下载文件！</p>
							    <form method="post" action="downnow.php">
								<p>文件ID:<input type="text" name="fileid" value="<?php echo @$_GET['fileid']; ?>" /></p>
								<p>请输入验证码（不区分大小写）：<input type="text" name="code"><img src="./createsc.php" width="70" height="25" alt="若看不清图片请点击！"  title="若看不清图片请点击！" id="safepic" onclick="javascript:reload_safepic()"/></p>
								<p><a title="点击放大图片" target="_self" href="javascript:safepic();" id="pictext">点击放大图片</a></p>
								<p><input type="submit" name="down"  value="下载文件"></p>
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
							<li class="current_page_item"><a href="?action=download">下载</a></li>
							<li><a href="?action=upload">上传</a></li>
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