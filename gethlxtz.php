<?php
function pqtz($id,$yd){
//include_once "config.php";
//获取葫芦侠帖子评论的图片
global $yd,$hlxkey,$dz;
$ph=file_get_contents($yd);
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
if (strpos($ph,$v)!==false){
//检测到已添加葫芦侠图片
}
else{
if(jchlx($v)){
$phh=file_get_contents($yd);
$phh=$phh.$v."\n";
file_put_contents($yd,$phh);
}
}
} 
}
}
}
?>