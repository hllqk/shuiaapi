<?php
if ($bingpc){
$b="http://cn.bing.com/";
$url="http://cn.bing.com/HPImageArchive.aspx?format=js&idx=0&n=1";
$r=file_get_contents($url);
$j=json_decode($r,true);
$url=$b.$j["images"][0]["url"];
if ($bingl){
//下载图片
$f="rand/";
$name=$f.md5($url).".jpg";
$ff=scandir($f);
foreach ($ff as $vv){
if ($vv!="." and $vv!=".."){
if($f.$vv==$name) 
{
//die("错误");
//header("Location:$name"); 
die();
}
//下载。
download($url,$name);
} 
}
}
else{
//储存到云端
$yd="rand/$yd";
$t=file_get_contents($yd);
if (strpos($t,$url)===false){
$text=$t.$url."\n";
file_put_contents($yd,$text);
}
}
}
?>