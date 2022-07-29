<?php
include "config.php";
//改进，更快加载
$p=file_get_contents("rand/$yd");
$s=explode("\n",$p);
$l=count($s)-1;
$r=rand(0,$l-1);
$img=$s[$r];
$r=array("client"=>"true","img"=>$img);
$r=json_encode($r,true);
die($r);
$img = file_get_contents($img,true);
//使用图片头输出浏览器
header("Content-Type: image/jpeg;text/html; charset=utf-8");
echo $img;
exit;
?>