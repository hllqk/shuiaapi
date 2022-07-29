<?php
include "config.php";
$r=curl($imgurl);
$r=json_decode($r,true);
$img=$r[$imglx];
echo($img);
?>