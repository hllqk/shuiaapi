<?php
//修改密码和账号[用户数据修改]
include "../config.php";
jc();
if(isset($_GET["mrmm"]) and isset($_GET["mrzh"])){
$m=$_GET["mrmm"];
$z=$_GET["mrzh"];
if ($z==""){
    $z=$mrzh;
}
if ($m==""){
    $m=$mrmm;
}
set($mrmm,$m);
set($mrzh,$z);
die("<script>alert(\"修改账号数据成功\");setTimeout(\"window.location='../admin/?zh=$z&&mm=$m'\",500)</script>");
}
?>