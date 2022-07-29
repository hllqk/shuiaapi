<!doctype html>
<html> 
    <head> 
        <meta charset="UTF-8"> 
        <meta name="viewport" id="viewport" content="width=device-width, initial-scale=1"> 
        </head> 
    <body> 
    <style>
    div{
        color: #FFFFFF;
        }
    </style>
<?php
include "../config.php";
start();
?>
  <div style="margin: auto;" class="mdui-container-fluid">
    		<div style=";padding: 5px;background: transparent;" class="mdui-card mdui-shadow-24">
  <!-- 卡片头部，包含头像、标题、副标题 -->
  <div class="mdui-card-header">
  <?php
   echo "<img class=\"mdui-card-header-avatar\" src='$profile'/>";
    ?>
    <div class="mdui-card-header-title">葫芦侠</div>
    <div class="mdui-card-header-subtitle">自动取关</div>
  </div>

  <!-- 卡片的媒体内容，可以包含图片、视频等媒体内容，以及标题、副标题 -->
  <div class="mdui-card-media">

    <!-- 卡片中可以包含一个或多个菜单按钮 -->
  </div>

  <!-- 卡片的内容 -->
  <div class="mdui-card-content">子曰：「关而不互者，不可耻也？偷取可谓傻者也，故此，行之」用了以前的记忆啊</div>
    <form action="../qg/run.php">
    <div class="mdui-textfield mdui-textfield-floating-label">
  <label class="mdui-textfield-label">你的葫芦侠key</label>
  <input name="key" class="mdui-textfield-input" type="text"/>
</div>
<div class="mdui-textfield mdui-textfield-floating-label">
  <label class="mdui-textfield-label">你的葫芦侠id</label>
  <input name="id" class="mdui-textfield-input" type="text"/>
</div>
<button class="mdui-btn mdui-btn-block mdui-btn-raised">开始取关</button>
</form>
<h4 style="color: #FFFFFF;">GET请求方式:</h4>
<?php
echo "<a href='$dz/qg/run.php?key=&id='>$dz/qg/run.php?key=你的葫芦侠key&id=你的葫芦侠id</a>";
?>
</div></div>
    </body>
</html>