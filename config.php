<?php
//配置，看不懂的不要乱改
$web=true;//是否继续运行网站，默认true，如果false，网站将变为404.html
$dz="http://".$_SERVER['HTTP_HOST'];//网站地址
$gg="";//公告📢
$profile="http://shuia.tk/assets/img/profile.jpg";//头像链接
$mrzh="shuia";//默认账号
$mrmm="123456";//默认密码
$title="API[水啊]";//网站名字
$zdy="false";//是否可以自定义
$fg=true;//文件是否可以覆盖
$yd="photos.txt";//云端位置
$panyd="https://onemanageronvercel-androidhtml.vercel.app/aly/%E4%BA%91%E7%AB%AF/photos.txt";//网盘云端路径[远程更新位置]
$name="shuia";//邮件账号
$pw="";//邮件密码
$maildz="shuia";//邮件地址
$arrayapi=array("随机图片"=>"random.php","随机图片[JSON]"=>"rand.php","随机图片[本地]"=>"index.php/?l","随机图片[云端＋本地]"=>"rand/rand.php","邮件发送接口"=>"mail.php","随机一言"=>"http://shuia.tk/random.html","ACG图片PPT展示"=>"acgppt.php","PHP执行测试"=>"zxphp.php","看板娘"=>"kbn.php","葫芦侠图片爬取"=>"hlxpq.php","正则表达式测试"=>"zzbds.php","葫芦侠取关"=>"qg/","葫芦侠签到"=>"hlxqd.php");//api列表
$subtitle="水啊API，一个不一样的API，基于MDUI，JQUERY，sweetalert，bootstrap等开发";//网站主页副标题
$imgurl="$dz/rand.php";//PPT图片接口JSON类型
$imglx="img";//PPT图片JSON[$imglx]
$bingpc=true;//必应每日壁纸爬虫，默认开启
$bingl=false;//必应每日壁纸爬虫是否下载到本地，默认关闭
$filemin="10";//下载文件最小大小，单位KB
$timec="36000";//全局COOKIE最大储存时间，单位毫秒
$hlxkey="";//葫芦侠KEY
$hlxc="20";//爬取葫芦侠帖子数量，取决于你的服务器性能
$random=true;//是否直接打开随机图片，默认true，如果为false将会缓存打开，速度更慢
$size="10";//上传文件最大大小，单位MB
$allowedExts = array("gif", "jpeg", "jpg", "png","txt","js","css","apk","iApp","zip","rar","7z","html");//允许上传文件后缀
$upload="picture/";//上传文件位置
$allowTime =120;//防DDOS刷新时间 
$allowNum=10;//防DDOS刷新次数 
$ts="天诺友情天亦老，人间正道是沧桑";//后台提示
$bkgs=117;//葫芦侠板块个数，当前117个板块
//有的没的的函数
function admin(){
header("location:../admin/");
die();
}
//检查管理员或其他
function jc(){
/*print_r($_COOKIE);
die();//检查COOKIE*/
global $mrzh,$mrmm;
//die($_COOKIE["zh"]);
if (isset($_COOKIE["zh"]) and isset($_COOKIE["mm"])){
$mm=$_COOKIE["mm"];
$zh=$_COOKIE["zh"];
if ($zh==$mrzh and $mm==$mrmm){
//header("location:../rand/");
}
else{
admin();
}
}
else{
admin();
}
}
//设置主页标题
function sethome($set,$str){
$home="config.php";
$text=file_get_contents($home);
$r=str_replace($set,$str,$text);
file_put_contents($home,$r);
}
//设置标题
function set($set,$str){
$home="../config.php";
$text=file_get_contents($home);
$r=str_replace($set,$str,$text);
file_put_contents($home,$r);
}
function unzip(string $zipName,string $dest){
//检测要解压压缩包是否存在
if(!is_file($zipName)){
return false;
}
//die($file);
//检测是否可以覆盖
$fg=$GLOBALS['fg'];
if ($fg==false){
die("不可以覆盖");
$file=$dest.explode(".",$zipName)[2];
if(file_exists($file)){
echo "文件已存在";
return false;
}
}
//检测目标路径是否存在
if(!is_dir($dest)){
mkdir($dest,0777,true);
}
$zip=new ZipArchive();
if($zip->open($zipName)){
$zip->extractTo($dest);
$zip->close();
return true;
}else{
return false;
}
}
//POST的函数
function post($url, $post_data) {
$postdata = http_build_query($post_data);
$options = array(
'http' => array(
'method' => 'POST',
'header' => 'Content-type:application/x-www-form-urlencoded',
'content' => $postdata,
'timeout' => 15 * 60 // 超时时间（单位:s）
)
);
$context = stream_context_create($options);
$result =@file_get_contents($url, false, $context);
return $result;
}
function curl($url) {
//初始化
$curl = curl_init();
//设置抓取的url
curl_setopt($curl, CURLOPT_URL,$url);
//设置头文件的信息作为数据流输
curl_setopt($curl, CURLOPT_HEADER,0);
//设置获取的信息以文件流的形式返回，而不是直接输出。
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
//执行命令
$data = curl_exec($curl);
//关闭URL请求
curl_close($curl);
//显示获得的数据
return($data);
}
//获取图片
function getimg(){
global $imgurl,$imglx;
$r=file_get_contents($imgurl);
$r=json_encode($r);
//$img=$r[$imglx];
return $r;
}
//获取PPT第1张图片
function getfirstimg(){
global $imgurl,$imglx;
$r=file_get_contents($imgurl);
$r=json_decode($r,true);
$r=$r[$imglx];
return $r;
}
//下载
function download($file_url, $save_to)
{
    //速度更快readfile
		$content =@file_get_contents($file_url);
      if (strlen($content)<=$filemin*1024 or $content=="" or !isset($content)){
header("location:../index.php");
die();
}
		file_put_contents($save_to, $content);
}
//删除文件夹
function deldir($dir){
//$dir=$dir."/";
$d=scandir($dir);
foreach ($d as $v){
if ($v!="." and $v!=".."){
$vv=$dir."/".$v;
if (is_dir($vv)){
deldir($vv);
}
else{
unlink($vv);
}
}
}
$r=rmdir($dir);
return $r;
}
function hlxdown($post,$yd){
//有图文权限图片下载
//die($yd);
$ph=file_get_contents($yd);
$s=explode(",",$post);
foreach ($s as $v){
if (strpos($v,"http")!==false and strpos($v,"pan")===false and strpos($v,"lanzou")===false and strpos($v,"aliyundrive")===false and strpos($v,"mp4")===false){
//echo "$v";
$f=strpos($v,"http");
$r=substr($v,$f);
if (strpos($ph,$r)!==false){
//
}
else{
if (jchlx($r)){
$phh=file_get_contents($yd);
$phh=$phh.$r."\n";
//echo $yyd;
file_put_contents($yd,$phh);
}
}
}
}
}
function tzdown($post,$yd){
$ph=file_get_contents($yd);
//无图文权限图片下载
//print_r($post);
$sz=$post["post"]["images"];

foreach ($sz as $va){
//$va添加
if (strpos($ph,$va)!==false){
//检测到已添加葫芦侠图片
}
else{
if (jchlx($va)){
$phh=file_get_contents($yd);
$phh=$phh.$va."\n";
file_put_contents($yd,$phh);
}
}
}
return;
}
//检查葫芦侠图片是否有用
function jchlx($url){
global $dz;
$ph=file_get_contents($url);
$er=file_get_contents("$dz/error.png");
if ($er==$ph){
return false; 
}
else{
return true;
}
}
//有的没有的其他的东西
function start(){
global $dz;
echo "<script src=\"http://libs.baidu.com/jquery/2.0.0/jquery.min.js\"></script>";
echo "<link rel=\"stylesheet\" href=\"https://unpkg.com/mdui@1.0.2/dist/css/mdui.min.css\" />";
echo "<script src=\"$dz/js.js\"></script><link rel=\"stylesheet\" href=\"$dz/css.css\">";
echo "<link rel=\"stylesheet\" href=\"http://libs.baidu.com/bootstrap/3.0.3/css/bootstrap.min.css\">";
echo "<link rel=\"stylesheet\" href=\"https://unpkg.com/sweetalert/dist/sweetalert.min.js\">";
echo "<script src=\"https://unpkg.com/mdui@1.0.2/dist/js/mdui.min.js\"></script>";
}
?>