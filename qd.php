<?php
if (isset($_GET["key"])){
$key=$_GET["key"];
include "config.php";
for ($i=1;$i<=$bkgs;$i++){
$url="http://floor.huluxia.com/user/signin/ANDROID/2.1?platform=2&gkey=000000&app_version=4.0.1.3.1&versioncode=275&market_id=tool_web&_key=$key&device_code=&cat_id=$i";
curl($url);
}
echo "全部板块签到完成";
}
else{
echo "格式错误";
}
?>