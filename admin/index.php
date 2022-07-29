<!doctype html>
 <html lang="zh-CN">
  	<head>
     <meta name="keywords" content="水啊的网站">
      <meta name="copyright" content="水啊">
 <meta name="generator" content="Easy web">
 <meta name="robots" content="all">
 <meta name="author" content="水啊">
    	<meta charset="utf-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no"/>
    	<meta name="renderer" content="webkit"/>
    	<meta name="force-rendering" content="webkit"/>
    	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
<?php
include "../config.php";
start();
?>
           <title>水啊API管理后台</title>
  	</head>
     <!--https://api.sunweihu.com/api/sjbz/api.php?lx=fengjing-->
  	<body class="mdui-theme-primary-indigo mdui-theme-accent-blue">
    	<div class="mdui-container-fluid">
    		<div style="background: transparent;" class="mdui-card mdui-shadow-24">
    			  <div class="mdui-tab mdui-tab-centered" mdui-tab>
  					<a href="#login" class="mdui-ripple">登录</a>
				</div>
				<div class="mdui-p-a-2" id="login">
     	 			<div class="mdui-card-primary mdui-text-center">
        				<div class="mdui-card-primary-title">登录</div>
        				<div class="mdui-card-primary-subtitle">在该站点上登录即可享有所有特权！</div>
      				</div>
                  <form action="../admin/index.php">
      				<div class="mdui-card-content">
      					<div class="mdui-textfield mdui-textfield-floating-label">
      						<label class="mdui-textfield-label">用户名</label>
      						<input id="zh" name="zh" class="mdui-textfield-input" type="text">
    					</div>
      					<div class="mdui-textfield mdui-textfield-floating-label">
      						<label class="mdui-textfield-label">密码</label>
      						<input id="mm" name="mm" class="mdui-textfield-input" type="password">
    					</div>
    					<label class="mdui-checkbox">
      						<input type="checkbox"/>
      							<i class="mdui-checkbox-icon"></i>
      							自动登录
    					</label>
      				</div>
      				<div class="mdui-card-actions">
       	 				<button id="button" class="mdui-btn mdui-float-right mdui-shadow-24">登录</button>
    				</div>
                </form>
    			</div>
    	
    		</div> 
          	</div>
             	<script src="https://cdn.jsdelivr.net/gh/hllqk/hllqk.github.io@api/js/jquery.js"></script>
              	<script src="https://cdn.jsdelivr.net/gh/hllqk/hllqk.github.io@api/js/mdui.min.js"></script>
<?php
ob_start();
if (isset($_COOKIE["zh"]) and isset($_COOKIE["mm"])){
$zh=$_COOKIE["zh"];
$mm=$_COOKIE["mm"];
//echo "$mm";
echo "<script>$(document).ready(function(){ $('#zh').val('$zh') })</script>";
echo "<script>$(document).ready(function(){ $('#mm').val('$mm') })</script>";
}
if (isset($_GET["zh"]) and isset($_GET["mm"])){
$zh=$_GET["zh"];
$mm=$_GET["mm"];
setcookie("mm",$mm,time()+$timec,"/");
setcookie("zh",$zh,time()+$timec,"/");
if ($zh==$mrzh and $mm==$mrmm){
//die($_COOKIE["mm"]);
echo "<script>mdui.alert('登录成功,欢迎回来,水啊!');setTimeout(\"window.location='../rand/'\",1000)</script>";  
}
else{
echo "<script>mdui.alert('登录失败，密码或账号错误，请重新登录!');setTimeout(\"window.location='../admin/'\",1000)</script>";
}
}
?>
<style>
*
{
    color: #FFFFFF;
    }
      .mdui-btn{
           margin: 5px;
           background: transparent;
    		border-radius: 5px;
    	}
</style>
  	</body>
</html>