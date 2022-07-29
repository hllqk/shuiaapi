<html>
	<head>
	   	<meta charset="UTF-8">
		<meta name="viewport" id="viewport" content="width=device-width, initial-scale=1">
	</head>
<link rel="stylesheet" href="css.css"> 
   <title>正则表达式在线测试</title>
	<body>
     <div style="margin: auto;" class="mdui-container-fluid">
    		<div style="padding: 5px;background: transparent;" class="mdui-card mdui-shadow-24">
    	<br>
       <h1>正则表达式在线测试</h1>
       <form method="post">
   <?php
include_once "config.php";
start();
if (isset($_POST["p"]) and isset($_POST["t"]) and isset($_POST["t1"])){
$p=$_POST["p"];
$t=$_POST["t"];
$t1=$_POST["t1"];
$r=preg_replace($p,$t1,$t);
//die($r);
echo "<pre><textarea id='re'></textarea></pre>";
echo "<script>$('#re').val('$r');</script>";
die();
}
	?>
   <pre>
     <input value="^[\r\n]" name="p" placeholder="在此输入正则表达式">
     </pre>
<div class="mdui-divider"></div>
<pre>
    <textarea name="t" placeholder="待匹配的文本"></textarea>
    </pre>
    <pre>
     <input name="t1" placeholder="替换文本">
     </pre>
   <div class="mdui-divider"></div>
      <button class="mdui-btn mdui-btn-raised">运行</button>
    </form>
      </div></div>
	</body>
</html>		