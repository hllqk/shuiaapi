<?php
include_once "config.php";
include_once "pq.php";
$yd="rand/$yd";
//die($yd);
$ph=file_get_contents($yd);
$urlid="http://floor.huluxia.com/post/list/ANDROID/2.1?platform=2&gkey=000000&app_version=4.1.1.8&versioncode=342&market_id=tool_web&_key=$hlxkey&device_code=%5Bd%5D59a2ec0d-fa82-4fea-97ef-bac48575bcd4&phone_brand_type=UN&start=0&count=$hlxc&cat_id=29&tag_id=2902&sort_by=0";
$re=curl($urlid);
$re=json_decode($re,true);
$sz=$re["posts"];
//$rl=count($sz);
//print_r($sz[20]);
foreach ($sz as $vv){
$id=$vv["postID"];
pq($id,$yd);
pqtz($id,$yd);
}
?>