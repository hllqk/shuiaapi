<?php
file_put_contents("cs.txt","");
$cs=0;
ignore_user_abort();
set_time_limit(0);
do{
include "lock.php";
if ($jk){
//检测是否运行
$cs++;
$t=file_get_contents("cs.txt");
$t=$t."这是本程序第".$cs."次运行，运行时间:".date("Y-m-d H:i:s")."\n";
file_put_contents("cs.txt",$t);
include "run.php";
sleep($sleep);// 等待  
} 
}
while(true);   
?>