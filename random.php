<?php
include "config.php";
//改进，更快加载
$p=file_get_contents("rand/$yd");
$s=explode("\n",$p);
$l=count($s)-1;
$r=rand(0,$l-1);
$img=$s[$r];
if ($random){
header("location:$img");
}
else{
//die("<a href='$img'>$img</a>");
$img=file_get_contents($img);
header("Content-Type: image/jpeg;text/html; charset=utf-8");
echo $img;
exit;
}
?>