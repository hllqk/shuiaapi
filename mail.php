<html>
	<head>
   	   	<meta charset="UTF-8">
		<meta name="viewport" id="viewport" content="width=device-width, initial-scale=1">
	</head>
      <!--不要删下面的，算了，放全局里面吧!-->
        <div style="margin: auto;" class="mdui-container-fluid">
    		<div style=";padding: 5px;background: transparent;" class="mdui-card mdui-shadow-24">
    	<br>
   <?php
include_once "config.php";
start();
$lj=$_SERVER['HTTP_HOST'];
echo "<title>邮箱发送接口[水啊]</title>";
echo "<center><h1>邮箱发送接口</h1></center>";
echo "<p class='m'>邮箱发送接口 接口邮箱:shuia@shuia.tk，阿巴阿巴阿巴阿巴阿巴阿巴</p>";
echo "<h2>方式POST</h2>";
echo "<center><h3><a href='http://$lj/send_mail.php/'>http://$lj/send_mail.php/</a></h3></center>";
?>
   <h3>POST数据</h3>
   <div class="panel-body">
                <table  class="tftable" id="tfhover" border="1">
<tr><th>参数</th><th>值</th><th>说明</th></tr>
<tr><td rowspan="5" align="center"><font size="5px">默认<br /><span class="label label-success">必须</span></font></td><td class="m">adress</td><td>收件人邮箱地址</td></tr>
<tr><td>content</td><td>发送邮件内容</td></tr>
<tr><td>isHtml</td><td>是否可发送HTML格式的邮件默认为FALSE</td></tr>
<tr><td>title</td><td>邮件内容标题</td></tr>
<td></td></td></tr>
<tr><td rowspan="4" align="center"><font size="4px">自定义<br /><span class="label label-primary">非必须</span></font></td><td>name</td><td>邮件账号</td></tr>
<tr><td>pw</td><td>邮件密码</td></tr>
<tr><td>mail</td><td>邮件地址</td></tr>
</td></tr>
</table>
</div>
<h1>示例:</h1>
 <center>
                </center>
                <div class="panel-body"> <pre style="text-shadow: initial;"><span>
<center>
<textarea style="background-color: transparent;border: none;resize: none;outline:none;" rows="10" cols="50">
&lt;?php
$post_data = array(
&#x27;content&#x27; =&gt; &#x27;内容&#x27;,
&#x27;title&#x27; =&gt; &#x27;标题&#x27;,
&#x27;adress&#x27;=&gt;&#x27;收件邮箱&#x27;,
&#x27;isHTML&#x27;=&gt;&#x27;false&#x27;
);
<?php
echo "echo post(&#x27;http://$lj/send_mail.php/&#x27;,\$post_data);\n";
?>
function post($url, $post_data) {
$postdata = http_build_query($post_data);
$options = array(
&#x27;http&#x27; =&gt; array(
&#x27;method&#x27; =&gt; &#x27;POST&#x27;,
&#x27;header&#x27; =&gt; &#x27;Content-type:application/x-www-form-urlencoded&#x27;,
&#x27;content&#x27; =&gt; $postdata,
&#x27;timeout&#x27; =&gt; 15 * 60 // 超时时间（单位:s）
)
);
$context = stream_context_create($options);
$result =@file_get_contents($url, false, $context);
return $result;
}
?&gt;</textarea>
</center>
</span></pre>
<center>
<font size="3" color="green">Copyright &copy; 2022 by 水啊</font></center>
</div>
</div>
<style>
.m
color: #74BDFF;
{
    }
</style>
   </body>
</html>		