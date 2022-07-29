<?php
echo "<h1 id='qg'>取关中。。。请耐心等待</h1>";
$id=$_GET["id"];
$key=$_GET["key"];
$url="http://floor.huluxia.com/friendship/following/list/ANDROID/2.0?platform=2&gkey=000000&app_version=4.1.1.4&versioncode=324&market_id=tool_web&_key=$key&device_code=%5Bd%5D8034ce2a-678d-4ad8-b731-f5db1d5c353f&phone_brand_type=UN&start=0&count=99999&user_id=$id";
$a=file_get_contents($url);
$b=json_decode($a,true);
$rr=count($b["friendships"]);
$szz=array();
for($i=0;$i<=$rr;$i++){
  array_push($szz,$b["friendships"][$i]["user"]["userID"]);
}
$url="http://floor.huluxia.com/friendship/follower/list/ANDROID/2.0?platform=2&gkey=000000&app_version=4.1.1.4&versioncode=324&market_id=tool_web&_key=$key&device_code=%5Bd%5D8034ce2a-678d-4ad8-b731-f5db1d5c353f&phone_brand_type=UN&start=0&count=999999&user_id=$id&compare_id=$id";
$rr=file_get_contents($url);
$r=json_decode($rr,true);
$rr=count($r["friendships"]);
$sz=array();
for($i=0;$i<=$rr;$i++){
  array_push($sz,$r["friendships"][$i]["user"]["userID"]);
}
$sb=array_diff($szz,$sz);
sort($sb);
$lj=count($sb);
for ($i=0;$i<=$lj;$i++){
    $ssb=$sb[$i];
    $url="http://floor.huluxia.com/friendship/unfollow/ANDROID/2.0?platform=2&gkey=000000&app_version=4.1.1.4&versioncode=324&market_id=tool_web&_key=$key&device_code=%5Bd%5D8034ce2a-678d-4ad8-b731-f5db1d5c353f&phone_brand_type=UN&user_id=$ssb";
    $r=file_get_contents($url);
}
echo "<script>document.getElementById('qg').innerHTML='';</script>";
echo "(有 $lj 个傻逼取关了你\n)";
echo "已经取消关注所有傻逼";
?>