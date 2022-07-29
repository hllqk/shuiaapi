<html>
	<head>
	   	<meta charset="UTF-8">
		<meta name="viewport" id="viewport" content="width=device-width, initial-scale=1">
	</head>
	<body style="width: 100%;height: 100%;">
	
	<?php
include "config.php";
start();
	?>
     <div style="margin: auto;" class="mdui-container-fluid">

   	<div class="mdui-container-fluid">
    		<div style="padding: 5px;background: transparent;" class="mdui-card mdui-shadow-24">
	   <div class="panel panel-primary">
      <div class="panel-heading">
     <center> <a href="ppt.php"><h1>PPT背景切换特效</h1></a></center>
        <h3 class="panel-title" style="text-align: center;">方法一：修改网页头部（推荐）</h3></div>
      <div class="panel-body">
          <div style="text-align: center;font-size: 18px;color: #2196F3;text-shadow: #000 1px 1px 1px;">在网站有一个统一的header头部文件时，使用该方法把下面代码插入<body>后即可。</div><br />
<span id="content"><pre style="text-shadow: initial;"><div><span style="color: #800000;">&lt;body&gt;
&lt;style&gt;
    html,
    body </span><span style="color: #000000;">{</span><span style="color: #FF0000;">
        margin</span><span style="color: #000000;">:</span><span style="color: #0000FF;"> 0</span><span style="color: #000000;">;</span><span style="color: #FF0000;">
        width</span><span style="color: #000000;">:</span><span style="color: #0000FF;"> 100%</span><span style="color: #000000;">;</span><span style="color: #FF0000;">
        height</span><span style="color: #000000;">:</span><span style="color: #0000FF;"> 100%</span><span style="color: #000000;">;</span><span style="color: #FF0000;">
    </span><span style="color: #000000;">}</span><span style="color: #800000;">
&lt;/style&gt;
&lt;div id=&quot;dynamic-background&quot; style=&quot;width: 100%; height: 100%; position: fixed;z-index: -1;&quot;&gt;
    &lt;script&gt;
        window.addEventListener(&quot;load&quot;, function(e)</span><span style="color: #000000;">{</span><span style="color: #FF0000;">
            document.getElementById(&quot;dynamic-background&quot;).innerHTML = &#39;&lt;iframe src=&quot;</span><span style="color: #000000;"></span><span style="color: #0000FF;"><?php echo "$dz/ppt.php"; ?>&quot; width=&quot;100%&quot; height=&quot;100%&quot; style=&quot;border: 0</span><span style="color: #000000;">;</span><span style="color: #FF0000;">&quot;&gt;&lt;/iframe&gt;&#39;;
               </span><span style="color: #000000;">}</span><span style="color: #800000;">);
&lt;/script&gt;
&lt;/div&gt;
&lt;/body&gt;</span></div></pre></span>
<center><button id="copyBT" style=";width: 100px;display: block;text-align: center;color: #666;">复制代码</button></center>
<script>
function copyArticle(event) {
    const range = document.createRange();
    range.selectNode(document.getElementById('content'));
    const selection = window.getSelection();
    if (selection.rangeCount > 0) selection.removeAllRanges();
    selection.addRange(range);
    document.execCommand('copy');
}
document.getElementById('copyBT').addEventListener('click', copyArticle, false);
  document.body.oncopy = function() {
    alert("复制成功！");
  };
 </script>
      </div>
    </div>
    <div class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title" style="text-align: center;">方法二：在网页任意位置添加js代码</h3></div>
      <div class="panel-body">
          <div style="text-align: center;font-size: 18px;color: #2196F3;text-shadow: #000 1px 1px 1px;">使用该方法只需把下方js代码放在网页任意位置（放在html里时注意添加script标签），甚至放在全局js文件里都行</div><br />
<span id="content2"><pre style="text-shadow: initial;"><div><span style="color: #000000;">window.addEventListener(</span><span style="color: #800000;">&quot;</span><span style="color: #800000;">load</span><span style="color: #800000;">&quot;</span><span style="color: #000000;">, </span><span style="color: #0000FF;">function</span><span style="color: #000000;">(e){
    </span><span style="color: #0000FF;">var</span><span style="color: #000000;"> obj </span><span style="color: #000000;">=</span><span style="color: #000000;"> document.createElement(</span><span style="color: #800000;">&quot;</span><span style="color: #800000;">div</span><span style="color: #800000;">&quot;</span><span style="color: #000000;">);
    obj.style </span><span style="color: #000000;">=</span><span style="color: #000000;"> </span><span style="color: #800000;">&quot;</span><span style="color: #800000;">width:100%; height:100%; position:fixed; z-index:-1;</span><span style="color: #800000;">&quot;</span><span style="color: #000000;">;
    obj.innerHTML</span><span style="color: #000000;">=</span><span style="color: #000000;"> </span><span style="color: #800000;">&#39;</span><span style="color: #800000;">&lt;iframe src=&quot;<?php echo "$dz/ppt.php"; ?>&quot; width=&quot;100%&quot; height=&quot;100%&quot; style=&quot;border: 0;&quot;&gt;&lt;/iframe&gt;</span><span style="color: #800000;">&#39;</span><span style="color: #000000;">;
    </span><span style="color: #0000FF;">var</span><span style="color: #000000;"> first </span><span style="color: #000000;">=</span><span style="color: #000000;"> document.body.firstChild; </span><span style="color: #008000;">//</span><span style="color: #008000;"> 得到页面的第一个元素</span><span style="color: #008000;">
</span><span style="color: #000000;">    document.body.insertBefore(obj,first); </span><span style="color: #008000;">//</span><span style="color: #008000;"> 在得到的第一个元素之前插入</span><span style="color: #008000;">
</span><span style="color: #000000;">});</span></div></pre></span>

<button id="copyBT2" style="margin: 10px auto 6px auto;width: 100px;display: block;text-align: center;color: #666;">复制代码</button>
<script>
function copyArticle(event) {
    const range = document.createRange();
    range.selectNode(document.getElementById('content2'));
    const selection = window.getSelection();
    if (selection.rangeCount > 0) selection.removeAllRanges();
    selection.addRange(range);
    document.execCommand('copy');
}
document.getElementById('copyBT2').addEventListener('click', copyArticle, false);
  document.body.oncopy = function() {
    alert("复制成功！");
  };
 </script>
      </div>
    </div>
  </div>
  </div></div>
	</body>
</html>		