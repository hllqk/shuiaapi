<html>
	<head>
	   	<meta charset="UTF-8">
		<meta name="viewport" id="viewport" content="width=device-width, initial-scale=1">
	</head>
	<body>	
	<?php
   include "config.php";
   start();
	?>
    <div style="width: 100%" class="mdui-container-fluid">
    		<div style="margin: auto;;padding: 5px;background: transparent;" class="mdui-card mdui-shadow-24">
<form method="POST" action="zx.php">
<center><h1 style="color: #5DB1FF;">PHP执行测试</h1></center>
<div class="panel-body"> <pre style="text-shadow: initial;">
<textarea name="code" id="edit" contenteditable="true">
&lt;?php
echo &quot;Hello World!&quot;;
?&gt;  
</textarea>
</pre></div>
	<button id="button" class="mdui-btn mdui-float-right mdui-shadow-24">执行</button>
</form>
<br>
<pre style="width: 100%;">
      接口:网站/zx.php
      方式:POST
      参数:code=php代码
      懒得写UI了，反正看得懂就可以了
</pre>
</div>
</div></div>
<style>
   .mdui-btn{
       color: #FFFFFF;
           margin: 5px;
           background: transparent;
    		border-radius: 5px;
    	}
</style>
	</body>
</html>		