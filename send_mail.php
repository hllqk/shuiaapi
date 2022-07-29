<?php
namespace PHPMailer;

require_once("PHPMailer/PHPMailer.php");
require_once("PHPMailer/class.smtp.php");
require_once("config.php");

$mail = new PHPMailer();
$mail->SMTPDebug = 1;
$mail->isSMTP();
$mail->SMTPAuth = true;
$mail->Host = 'smtp.ym.163.com';
$mail->SMTPSecure = 'ssl';
$mail->Port = 465;
$mail->CharSet = 'UTF-8';
if (isset($_POST["name"]) and isset($_POST["pw"]) and isset($_POST["mail"])){
$name=$_POST["name"];
$pw=$_POST["pw"];
$mail=$_POST["mail"];
}
//这里需要自己配置
$mail->Username = $name;  //邮箱账号
$mail->Password = $pw;    //邮箱密码，QQ邮箱是授权码
$mail->From = $maildz;      //邮箱地址
//这里是提交的内容
$content=$_POST['content'];  //邮件内容
$isHTML=$_POST['isHTML'];  //是否为html格式
$mailTitle=$_POST['title'];     //邮件标题
$Adress=$_POST['adress'];   //收件人邮箱地址
//die($mail);
$mail->FromName = '水啊';
// 邮件正文是否为html编码 注意此处是一个方法
$mail->isHTML(false);
// 设置收件人邮箱地址
$mail->addAddress($Adress);
// 添加该邮件的主题
$mail->Subject = $mailTitle;
// 添加邮件正文
$mail->Body = $content;
// 为该邮件添加附件
//$mail->addAttachment('C:\Users\maolimeng\Desktop\PHPMailer-master.zip');
// 发送邮件 返回状态
$status = $mail->send();
if ($status=="1"){
echo "发送成功";
}
else{
echo "发送失败";
}
?>