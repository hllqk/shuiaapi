<!doctype html>
<html>
	<head> 
		<meta charset="UTF-8"> 
		<meta name="viewport" id="viewport" content="width=device-width, initial-scale=1"> 
	</head> 
	<body> 
<?php
include "config.php";
?>
<div style="width: 100%;height: 800px;background-color: #FFFFFF;" id="bg"></div>
   <script>
function set()
{
$.ajax({url:"getimg.php",success:function(result){
url="url("+result+")";
//alert(url)
$("#bg").css("background-image",url);
}});
	}
function fun(){
    //每隔3秒执行一次timelyFun方法
window.setInterval("set()",3000);
}
fun()
      </script>
     <script></script>
	</body>
</html>