<?php
include "config.php";
$url="https://tool.runoob.com/compile2.php";
$code=$_POST["code"];
$data=array("code"=>$code,"token"=>"4381fe197827ec87cbac9552f14ec62a","language"=>"3","fileext"=>"php");
$r=post($url,$data);
$out=json_decode($r,true);
echo $out["output"];
?>