<?php
include "settings.php";
$con = mysql_connect($db_host,$db_user,$db_pass);
if (!$con)
    die('无法连接数据库： ' . mysql_error());
mysql_select_db($db_name, $con);
?>