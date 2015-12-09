<?php
$sumsize = 0;
$filenum = 0;
$dir = './stream/';
$dirx = opendir($dir);
if($dirx)
{
   while(FALSE !== ($file = readdir($dirx)))
   {
      if(strstr($file,".zip"))
      {
          $sumsize += filesize($dir.$file);
          $filenum += 1;
      }
   }
   $sumsize /= 1024;
   echo "<p><center><font color='blue'>本站资源信息：共上传了 $sumsize KB，共上传了 $filenum 个文件。</font></center></p>";
}
else
   echo "无法读取目录文件大小";
?>