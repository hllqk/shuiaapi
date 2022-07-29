<html>
	<head>
  	   	<meta charset="UTF-8">
		<meta name="viewport" id="viewport" content="width=device-width, initial-scale=1">
	</head>
<!---
　　　／　　　 ／ | 
　　 Γ￣￣￣￣ |　| 
　　 |[]::　　　 |　| 
　　 |＿＿_＿＿|　|
　　 |[]::　　　 |　| 
　　 |＿＿_＿＿|　| 
ｶﾞﾗｯ |＿＿_＿＿|　| 
.彡／(´･ω･)　／|　| 
　Γ￣￣￣￣ |　|／ 
　Ｌ＿＿＿＿|／
水啊API from 2022 the web 主要配色黑，蓝，白 at 2022.1.27 last updated
--->
   <script>
function add(nr,url){
		var txt=$("<button></button>").text(nr).attr("class","mdui-btn mdui-btn-raised").click(function () { window.location=url; });  // 使用 jQuery 创建文本
		$(".mdui-card").append(txt);       
}
</script>
    <center>
    	<div class="mdui-container-fluid">
    		<div style="padding: 5px;background: transparent;" class="mdui-card mdui-shadow-24">
    	<br>
    <?php
include "config.php";
if ($web==false){
header("location:$dz/404.html");
}
if ($gg!=""){
    echo "<script>alert('$gg')</script>";
}
start();
echo "<title>$title</title>";
echo "<center><h1 style=\"color: #5DB1FF;\">$title</h1></center><div class='mdui-divider'></div>";
echo "<p>$subtitle</p><div class='mdui-divider'></div>";
foreach ($arrayapi as $nr=>$api){
echo "<script>add('$nr','$api')</script>";
}
//本地
if (isset($_GET["l"])){
$b=randp();
header("Location:/rand/$b");
}
if (isset($_GET["cm"])){
jc();
$cm=$_GET["cm"];
sethome($title,$cm);
header("Location:index.php");
die();
}
//随机本地图片
function randp(){
$d=scandir("rand/");
$bg=array();
foreach ($d as $v){
if ($v!="." and $v!=".."){
$vv=explode(".",$v);
$vv=end($vv);
if ($vv=="jpg" or $vv=="png" or $vv=="jpeg"){
array_push($bg,$v);
}
}
}
$rr=rand(0,count($bg)-1);
$b=$bg[$rr];
return $b;
}
//echo "$b";
$b=randp();
echo("<body style='width: 100%;height: 100%;background: url(\"/rand/$b\") no-repeat;background-size: cover;position: absolute;background-attachment: fixed;'>"); 
	?>
<div class="mdui-divider"></div>
<font size="3">Copyright &copy; 2022 by <a href="admin/">水啊</a></font></center>
</div>
<style>
  .mdui-btn{
           margin: 5px;
           width: 200px;
           color: #74D3FF;
           background: transparent;
    		border-radius: 5px;
    	}</style>
       <?php
       include "bing.php";
       ?>
 </body>
</html>		