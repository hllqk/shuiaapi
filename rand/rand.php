<?php
include "../config.php";
$p=file_get_contents("$yd");
$s=explode("\n",$p);
$l=count($s)-1;
//echo $l;
$r=rand(0,$l-1);
$r=$s[$r];
$hzz=explode(".",$r);
$hzzz=end($hzz);
$name='../rand/'.md5($r).'.'.$hzzz;
//die($r);
$f="../rand/";
$ff=scandir($f);
foreach ($ff as $vv){
if ($vv!="." and $vv!=".."){
if($f.$vv==$name) 
{
header("Location:$name"); 
die();
}
//echo "<br>".$vv;
} 
}
//下载图片
download($r,$name);
header("Location:$name");
die();
//echo $name;
?>