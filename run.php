<?php
$jk=file_get_contents("jk.txt");
$lb=explode("\n",$jk);
foreach ($lb as $url){
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
}
?>