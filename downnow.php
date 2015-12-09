<?php
if(isset($_GET['acckey']))
{
    if($_POST['code']==NULL)
        {
	    echo("<script>alert('上传错误！你没有填写验证码！');location.replace('index.php?action=download');</script>");
        }
    if(strtolower($_POST['code'])!=$_SESSION['safecode'])
	{
	    echo("<script>alert('上传错误！你没有填写正确验证码！');location.replace('index.php?action=download');</script>");
	}
	$name = $_POST['fileid'].".zip";
	$dir = "./stream";
	$dirx = opendir($dir);
	if($dirx)
	{
	    while(FALSE !== ($file = readdir($dirx)))
		{
		    if($name == $file)
			{
				$oldname = $dir."/".$name;
				$newname = 0;
				for($i=0;$i<10;$i++)
				{
					$newname = $newname * 10 + rand(1,10);
				}
				$newname = "Download_pan.fsgmhoward.tk_".$newname.".zip";
				header("Content-type:application/octet-stream");
				header("Content-Length:".filesize($oldname));
				header("Content-Disposition:attachment;filename=".$newname);
				readfile($oldname);
			}
		}
		echo("<script>alert('文件没有找到，请检查文件ID！');location.replace('index.php?action=download');</script>");
	}
	else
	    echo("<script>alert('打开文件目录失败，请等一下再重试！');location.replace('index.php?action=download');</script>");
}
?>