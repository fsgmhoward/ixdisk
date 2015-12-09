<?php

if(!isset($_GET['fileid']))
{
    $title="拒绝访问";

    $error="你没有权限访问该文件！";

    include "../error.php";

}

else

{
    $title="拒绝访问";

    $error="这个文件不能直接访问，请从下载页进行下载！本文件下载页：<a href='http://pan.fsgmhoward.tk/?action=download&fileid=".$_GET['fileid']."'>点此进入</a>";

    include "../error.php";
}

