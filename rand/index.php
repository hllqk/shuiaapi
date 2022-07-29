<html>
<body>
<style>
a{
    color: #5DB1FF;
    }
</style>
<?php
include "../config.php";
start();
echo "<div style='width: 100%;height: 100%;' class='mdui-container-fluid'><div style='margin:10px auto;;padding: 5px;background: transparent;' class='mdui-card mdui-shadow-24'>";
$h="../";//home文件夹
//$f="";//当前文件夹
jc();//检查是否登陆
//函数
//爬虫
function getpq($ph,$json){
//curl替代fileget
$r=curl($ph);
//die($r);
//$a=array($r);
$r=json_decode($r,true);
//print_r($r);die();
$r=$r["$json"];
return $r;
}
function gd($f){
//echo "当前文件夹:".$f;
echo "<h2><a href='../rand?zh=$mrzh&mm=$mrmm'>主页</a></h2>";
echo('<form action="index.php?f='.$f.'" method="post" enctype="multipart/form-data"><label for="file">上传文件</label><br> <input class="mdui-btn mdui-btn-raised" type="file" name="file" id="file"><br><input class="mdui-btn mdui-btn-raised" type="submit" name="submit" value="提交"></form>');
$dir=scandir($f);
echo "<h3><a href='index.php?dl'>../</a><br>";
foreach ($dir as $v){
if ($v!="." and $v!=".."){
echo "<a href=$f/$v>$v</a>";
//echo $h.$v."<br>";
if (end(explode(".",$v))=="zip"){
echo " <a href='index.php?unzip=$f/$v&lj=$f'>解压</a>";
}
if (!is_dir($f.$v)){
echo " <a href='index.php?file=$f/$v&delete&lf=$f'>删除</a>";
}
else{
echo " <a href='index.php?file=$f/$v&delete=wjj&lf=$f'>删除文件夹</a>";
echo " <a href='../rand/index.php?gd=$f$v'>进入文件夹</a>";
}
echo "<br>";
}
}
}
//主
//解压
if (isset($_GET["gx"])){
gx();
die();
}
if (isset($_GET["pq"]) and isset($_GET["pqwz"]) and isset($_GET["json"])){
$json=$_GET["json"];
$wz=$_GET["pqwz"];
$cs=$_GET["pq"];
echo "<h1>已爬取</h1>";
for ($i=0;$i<$cs;$i++){
$rwz=getpq($wz,$json);
$t=file_get_contents("$yd");
$text=$t.$rwz."\n";
file_put_contents("$yd",$text);
echo "<a href='$rwz'>$rwz</a><br>";
}
echo "已自动添加到云端";
//header("location:$r");
die();
}
if (isset($_GET["unzip"]) and isset($_GET["lj"])){
$file=$_GET["unzip"];
$f=$_GET["lj"];
//die($file);
$r=unzip($file,$f);
if ($r){
echo "解压成功";   
}
else{
echo "解压失败";
}
die("<a href='../rand/index.php?$mrmm'>返回</a>");
}
//删除与是否删除
if (isset($_GET["delete"]) and isset($_GET["file"]) and isset($_GET["lf"]) or isset($_GET["if"])){
$file=$_GET["file"];
$lf=$_GET["lf"];
$if=$_GET["if"];
if ($_GET["delete"]!="wjj"){
if ($if==true){
$r=unlink($file);
if ($r){
echo "删除成功";
}
else{
echo "删除失败";
}
die("<br><a href='index.php?gd=$lf'>返回</a>");
}
echo "<script>var r=confirm('是否删除');if(r==true) window.location='index.php?delete&file=$file&lf=$lf&if=true';</script>";
//die();是否删除
if ($if!==true){
die("取消删除");
}
}
else{
//删除文件夹
if ($if==true){
//die($file);
$r=deldir($file."/");
if ($r==1){
echo "删除文件夹成功";
}
else{
echo "删除文件夹失败";
}
die("<br><a href='index.php?gd=$lf'>返回</a>");
}
echo "<script>var r=confirm('是否删除文件夹');if(r==true) window.location='index.php?delete=wjj&file=$file&lf=$lf&if=true';</script>";
//die();是否删除
if ($if!==true){
die("取消删除");
}
//
}
}
//gd函数
if (isset($_GET["gd"])){
gd($_GET["gd"]);
die();
}
//缓存清除
if (isset($_GET["killhc"])){
file_put_contents("../log/forbided_ip.log","");
file_put_contents("../access_log","");
die("缓存清除成功 <a href='../rand/'>返回</a>");
    }
//缓存设置
if (isset($_GET["hc"])){
$t=filesize("../log/forbided_ip.log")/1024;
$tt=filesize("../access_log")/1024;
$hc=$tt+$t;
echo "缓存大小".$hc."kb";
echo "<br><form action='../rand/index.php'><input style=\"visibility: hidden;\" name='killhc'><button class='mdui-btn mdui-btn-raised'>清除缓存</button></form>";
die();
}
//防DDOS设置
if (isset($_GET["ddos"])){
$t=file_get_contents("../.htaccess2");
echo "<h2>黑名单</h2><form method='post' action='../rand/index.php'><textarea style='width:100%;overflow:auto;word-break:break-all;' name='hmd'>$t</textarea>";
echo "<br><button class='mdui-btn mdui-btn-raised'>保存</button></form>";
die();
}
//监控设置
if (isset($_GET["jk"])){
$t=file_get_contents("../lock.php");
$jk=file_get_contents("../jk.txt");
echo "<h2>监控设置</h2><form method='post' action='../rand/index.php'><textarea style='width:100%;overflow:auto;word-break:break-all;' name='jksz'>$t</textarea>";
echo "<h2>监控列表</h2><textarea style='width:100%;overflow:auto;word-break:break-all;' name='jklb'>$jk</textarea>";
echo "<br><button class='mdui-btn mdui-btn-raised'>保存</button></form>";
die();
}
//黑名单保存
if (isset($_POST["hmd"])){
$pz=$_POST["hmd"];
file_put_contents("../.htaccess2",$pz);
die("保存成功<a href='../rand/index.php?$mrmm'>返回</a>");
}
//监控设置保存
if (isset($_POST["jksz"]) and isset($_POST["jklb"])){
$jksz=$_POST["jksz"];
$jklb=$_POST["jklb"];
file_put_contents("../lock.php",$jksz);
file_put_contents("../jk.txt",$jklb);
die("保存成功<a href='../rand/index.php?$mrmm'>返回</a>");
}
//高级管理保存
if (isset($_POST["pz"])){
$pz=$_POST["pz"];
file_put_contents("../config.php",$pz);
die("保存成功<a href='../rand/index.php?$mrmm'>返回</a>");
}
//高级管理
if (isset($_GET["high"])){
$m=$_GET["high"];
$text=file_get_contents("../config.php");
$t=htmlentities($text);
$hs=count(explode("\n",$t));
//echo "$t";
echo "<h2>配置文件</h2><form method='post' action='../rand/index.php'><pre><textarea rows=$hs style='width:100%;overflow:auto;word-break:break-all;' id='pz' name='pz'>$t</textarea></pre>";
//echo "<script>function get(){ var text=document.getElementById('pz').value;return text; }</script>";
echo "<br><button class='mdui-btn mdui-btn-raised'>保存</button></form>";
die();
}
if (isset($_GET["logout"])){
setcookie("mm","");
setcookie("zh","");
header("location:../admin/");
}
echo "<center><h1><a href='../'>水啊API管理系统[水啊]</h1></a></center><p>欢迎您!水啊!现在是";
echo date("Y年m月d日")."!服务器正常运行!</p>";
echo "<div class=\"mdui-card-header\">";
echo "<img class=\"mdui-card-header-avatar\" src='$profile'/>";
echo "<div class=\"mdui-card-header-title\">你好!$mrzh</div>";
echo "<div class=\"mdui-card-header-subtitle\">$ts</div></div>";
echo "<a href='../rand?zh=$mrzh&mm=$mrmm'>后台管理</a> <a href='$dz/rand/?logout'>退出登录</a> <a href='../rand/index.php?high'>高级设置</a> <a href='../rand/index.php?jk'>监控设置</a> <a href='../rand/index.php?ddos'>黑名单</a> <a href='../rand/index.php?hc'>缓存设置</a> <a href='../qd.php?key=$hlxkey'>一键签到</a>";
echo "<pre><form action='../index.php'><input placeholder='输入网站标题[输入中文]' class='mdui-textfield-input' name='cm'><button class='mdui-btn mdui-btn-raised'>修改标题</button></form>";
echo "<form action='../rand/xg.php'><input placeholder='输入账号[如果为空就维持原样吧]' class='mdui-textfield-input' name='mrzh'><input placeholder='输入密码[请不要使用无密码]' class='mdui-textfield-input' name='mrmm'><button class='mdui-btn mdui-btn-raised'>修改用户数据</button></form>";
echo "<h2>添加图片</h2><button onclick=\"window.location='../pqhlx.php'\" class='mdui-btn mdui-btn-raised'>一键爬取葫芦侠图片</button>";
//自动
echo "<h4>葫芦侠爬取</h4><form name='upload'><input class='mdui-textfield-input' placeholder='葫芦侠帖子ID' name='hlx'><br><button class='mdui-btn mdui-btn-raised'>爬取</button></form>";
echo "<h4>自动</h4><form name='upload'><input class='mdui-textfield-input' placeholder='JSON地址[懂得都懂]' name='zd'><br><button class='mdui-btn mdui-btn-raised'>爬取</button></form>输入随机图片网址";
echo "<h4>单个</h4><form name='upload'><input placeholder='远程图片链接[的说]' class='mdui-textfield-input' name='photo'><br><button class='mdui-btn mdui-btn-raised'>提交</button></form>";
echo "<h4>多个</h4><a href='$panyd'>获取云端</a><form method='post' name='uploads'><textarea placeholder='多个远程图片链接[的说是语气词的说]' name='photos'></textarea><br><button class='mdui-btn mdui-btn-raised'>提交</button></pre></form><h2>文件管理</h2>";
//列表文件
gd($h);
//上传
if(isset($_FILES["file"]) and isset($_GET["f"]))
{
$f=$_GET["f"];
move_uploaded_file($_FILES["file"]["tmp_name"], "$f/" . $_FILES["file"]["name"]);
echo "<h4>上传成功</h4><br>";
die("文件存储在: " . "<a href='$f/" . $_FILES["file"]["name"]."'>查看</a>");
}
//自动爬取and葫芦侠爬取
if (isset($_GET["hlx"])){
$hlx=$_GET["hlx"];
include "../pq.php";
pq($hlx,"../rand/$yd");
die("爬取完成，但不知道有没有成功的说");
}
if (isset($_GET["zd"])){
$ph=$_GET["zd"];
echo "<form action='../rand/index.php'><input class='mdui-textfield-input' placeholder='img json' name='json'><br><input class='mdui-textfield-input' name='pq' placeholder='爬取次数0-99999999'><br><input class='mdui-textfield-input' name='pqwz' value='$ph'><br><button>确定</button></form>";
die();
}
//多个
//标题
echo '<title>水啊API管理系统</title>';
if (isset($_POST["photos"])){
$photo=$_POST["photos"];
$p=file_get_contents("$yd");
$ps=$p.$photo."\n";
$ps=preg_replace("/https/i","http",$ps);
$f=fopen("$yd","w");
fwrite($f,$ps);
fclose($f);
echo "<h4>$photo</h4>写入文件成功<br><a href='$yd'>查看</a><br><h4><a href='../rand/'>主页</a></h4><br><a href='../rand/?123'>继续</a>";
die();
    }
    //单个
if (isset($_GET["photo"])){
$photo=$_GET["photo"];
$p=file_get_contents("$yd");
$ps=$p.$photo."\n";
$ps=preg_replace("/https/i","http",$ps);
$f=fopen("$yd","w");
fwrite($f,$ps);
fclose($f);
echo "<h4>$photo</h4>写入文件成功<br><a href='$yd'>查看</a><br><h4><a href='../rand/'>主页</a></h4><br><a href='../rand/?123'>继续</a>";
die();
    }
?>
</div>
</div>
</body>
</html>