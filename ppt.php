<!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>ACG图片PPT展示</title>
<?php
include "config.php";
start();
?>
<style>
			html,
			body {
				font-size: 20px;
				margin: 0;
				width: 100%;
				height: 100%;
				display: flex;
				justify-content: center;
				align-items: center;
			}
			
			.bg {
				width: 100%;
				height: 100%;
				position: fixed;
				z-index: -1;
				background-position: center;
				background-repeat: no-repeat;
				background-attachment: fixed;
				background-size: cover;
				animation: bg 10s infinite;
			}
			#bg2 {
				animation-delay: 5s;
			}
			
			@keyframes bg{
				0%{transform: scale(1.5, 1.5);opacity: 0;}
				20%{opacity: 1;}
				30%{transform: scale(1, 1);}
				50%{opacity: 1;}
				70%{opacity: 0;}
				100%{opacity: 0;}
			}
			
		</style>
</head>
<body>
<div id="bg2" class="bg"></div>
<div id="bg1" class="bg"></div>
<script type="text/javascript">
			countImg = 1;
			countTime = 0;
         setInterval(function(){
				countTime += 1;
				if(countTime % 10 == 7){
					countImg += 1;
					$.ajax({url:"getimg.php",success:function(result){
url="url("+result+")";
//alert(url)
$("#bg1").css("background-image",url);
}});
    				}else if((countTime + 5) % 10 == 7){
					countImg += 1;
					$.ajax({url:"getimg.php",success:function(result){
url="url("+result+")";
//alert(url)
$("#bg2").css("background-image",url);
}});				}
			}, 1000);
</script>
<script type='text/javascript'> 
    window.oncontextmenu=function(){return false;} 
    window.onkeydown = window.onkeyup = window.onkeypress = function () { 
        window.event.returnValue = false; 
        return false; 
    } 
</script>
<?php
$url=getfirstimg();
echo "<script>$(\"#bg1\").css(\"background-image\",\"url($url)\")</script>";
?>
</body>
</html>