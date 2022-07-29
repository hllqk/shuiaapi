<?php
include "prddos.php";
if (isset($_FILES["file"])){
    $f=$_FILES["file"];
    $e=$f["error"];
    $n=$f["name"];
    $t=$f["tmp_name"];
    $s=$f["size"];
    $end=end(explode(".",$n));
    if (!in_array($end,$allowedExts)){
    die("不支持该文件类型");
}
    if ($s>$size*1024*1024){
    die("上传文件过大，超过".$size."MB");
}
    if ($e>0){
    die("上传错误:".$e);
}
$sz=scandir($upload);
foreach ($sz as $va){
if ($va!=".." and $va!=="."){
if ($va==md5($n).".$end"){
die("文件重复");
}
}
}
$wz=$upload.md5($n).".".$end;
    $r=move_uploaded_file($t,$wz);
    if ($r==1){
    echo "上传成功，文件链接:\n".$dz."/".$wz;
}
else{
    echo "上传失败";
}
}
else{
    echo "参数错误";
}
?>