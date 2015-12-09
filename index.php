<?php
if(isset($_GET['action']))
{
    if($_GET['action'] == "upload")
	    include "./upload.php";
	elseif($_GET['action'] == "download")
	    include "./download.php";
	elseif($_GET['action'] == "success")
	    include "./success.php";
	else
	    include "./ixphp.php";
}
else
    echo "<script>location.replace('?action=download');</script>";
?>