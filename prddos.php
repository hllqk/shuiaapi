<?php
//查询禁止IP 
include_once "config.php";
$ip =$_SERVER['REMOTE_ADDR']; 
//die($ip);
$fileht=".htaccess2"; 
if(!file_exists($fileht))file_put_contents($fileht,""); 
$filehtarr=@file_get_contents($fileht); 
$a=explode("\n",$filehtarr);
foreach ($a as $v){
if ($v==$ip){
    die("⚠警告⚠:"."<br>"."你的IP地址已被封禁，如果你有疑问可以发邮箱到shuia@shuia.tk!");
}
}
$time=time();

$fileforbid="log/forbidchk.dat"; 

if(file_exists($fileforbid)) 

{ if($time-filemtime($fileforbid)>60)unlink($fileforbid); 

else{ 

$fileforbidarr=@file($fileforbid); 

if($ip==substr($fileforbidarr[0],0,strlen($ip))) 

{ 

if($time-substr($fileforbidarr[1],0,strlen($time))>600)unlink($fileforbid); 

elseif($fileforbidarr[2]>600){file_put_contents($fileht,$filehtarr."\n$ip");unlink($fileforbid);} 

else{$fileforbidarr[2]++;file_put_contents($fileforbid,$fileforbidarr);} 

} 

} 

} 

//防刷新 

$str=""; 

$file="log/ipdate.dat"; 

if(!file_exists("log")&&!is_dir("log"))mkdir("log",0777); 

if(!file_exists($file))file_put_contents($file,""); 

$uri=$_SERVER['REQUEST_URI']; 

$checkip=md5($ip); 

$checkuri=md5($uri); 

$yesno=true; 

$ipdate=@file($file); 

foreach($ipdate as $k=>$v) 

{ $iptem=substr($v,0,32); 

$uritem=substr($v,32,32); 

$timetem=substr($v,64,10); 

$numtem=substr($v,74); 

if($time-$timetem<$allowTime){ 

if($iptem!=$checkip)$str.=$v; 

else{ 

$yesno=false; 

if($uritem!=$checkuri)$str.=$iptem.$checkuri.$time."1\r\n"; 

elseif($numtem<$allowNum)$str.=$iptem.$uritem.$timetem.($numtem+1)."\r\n"; 

else

{ 

if(!file_exists($fileforbid)){$addforbidarr=array($ip."\r\n",time()."\r\n",1);file_put_contents($fileforbid,$addforbidarr);} 

file_put_contents("log/forbided_ip.log",$ip."--".date("Y-m-d H:i:s",time())."--".$uri."\r\n",FILE_APPEND); 

$timepass=$timetem+$allowTime-$time; 

die("⚠警告⚠"."<br>"."抱歉，你发起了太多次请求，请等待 ".$timepass." 秒后继续"); 

} 

} 

} 

} 

if($yesno) $str.=$checkip.$checkuri.$time."1\r\n"; 

file_put_contents($file,$str); 

?>