window.addEventListener("load", function(e){
    var obj = document.createElement("div");
    obj.style = "width:100%; height:100%; position:fixed; z-index:-1;";
    obj.innerHTML= '<iframe src="../ppt.php" width="100%" height="100%" style="border: 0;"></iframe>';
    var first = document.body.firstChild; // 得到页面的第一个元素
    document.body.insertBefore(obj,first); // 在得到的第一个元素之前插入
});