<?php
include "connectdb.php";
$acckey="";
for($i=0;$i<6;$i++)
{ 
$acckey.=dechex(rand(1,15)); //生成包含十六进制的随机数 
}
$sql = "INSERT INTO `ixdisk`.`dl_info` (`access_key`, `file_id`, `ip`, `time`) VALUES ('".$acckey."', '".$fileid."', '".$ip."', CURRENT_TIMESTAMP);";
mysql_query($sql);
?>