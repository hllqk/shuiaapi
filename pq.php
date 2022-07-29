<?php
//爬取葫芦侠帖子
function pq($id,$yd){
include_once "gethlxtz.php";
global $hlxkey,$dz;
$ph=file_get_contents($yd);
$url="http://floor.huluxia.com/post/detail/ANDROID/4.1?platform=2&gkey=000000&app_version=4.1.1.6.1&versioncode=334&market_id=tool_web&_key=$hlxkey&device_code=%5Bd%5D8034ce2a-678d-4ad8-b731-f5db1d5c353f&phone_brand_type=UN&post_id=$id&page_no=1&page_size=20&doc=1";
$t=curl($url);
$j=json_decode($t,true);
$n=$j["post"]["detail"];
//检测机制
if (strpos($n,"http")!==false){
//有图文权限
//die($yd);
hlxdown($n,$yd);    
//echo $yd;
}
else{
//无图文权限
tzdown($j,$yd);
}
//爬取帖子回复图片
pqtz($id,$yd);
}
//爬取葫芦侠给外人看的
if (isset($_GET["id"])){
include "config.php";
$id=$_GET["id"];
pqhlx($id);
tz($id);//爬取评论区
}
function pqhlx($id){
$yd="rand/$yd";
//die($yd);
$url="http://floor.huluxia.com/post/detail/ANDROID/4.1?platform=2&gkey=000000&app_version=4.1.1.6.1&versioncode=334&market_id=tool_web&_key=$hlxkey&device_code=%5Bd%5D8034ce2a-678d-4ad8-b731-f5db1d5c353f&phone_brand_type=UN&post_id=$id&page_no=1&page_size=20&doc=1";
$t=curl($url);
$j=json_decode($t,true);
$n=$j["post"]["detail"];
//检测机制
if (strpos($n,"http")!==false){
//有图文权限
$s=explode(",",$n);
foreach ($s as $v){
if (strpos($v,"http")!==false and strpos($v,"pan")===false){
$f=strpos($v,"http");
$r=substr($v,$f);
echo "<a href='$r'>$r</a> <br>";
}
}
//END
}
else{
$n=$j["post"];
$sz=$n["images"];
foreach ($sz as $va){
echo "<a href='$va'>$va</a> <br>"; 
}
//return;
}
//END
}
//不写注释的话，自己都看不懂，爬取评论区
function tz($id){
$urlid="http://floor.huluxia.com/post/detail/ANDROID/4.1?platform=2&gkey=000000&app_version=4.1.1.6.1&versioncode=334&market_id=tool_web&_key=$hlxkey&device_code=%5Bd%5D8034ce2a-678d-4ad8-b731-f5db1d5c353f&phone_brand_type=UN&post_id=$id&page_no=1&page_size=20&doc=1";
$t=curl($urlid);
//die($t);
$j=json_decode($t,true);
$c=$j["comments"];
$l=count($c);
for ($i=0;$i<$l;$i++){
$a=$c[$i]["images"];
foreach ($a as $v){
if (strpos($v,"http")!==false){
echo "<a href='$v'>$v</a><br>";
} 
}
}
}
?>