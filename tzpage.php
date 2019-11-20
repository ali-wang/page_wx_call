<?php 
header("Content-Type:text/html;charset=utf-8");
header("refresh:4;url=login.php"); 
//print('账号、密码、验证错误，请稍等...<br>五秒后自动跳转。'); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<p>账号、密码、验证错误，请稍等...<br></p>
请等待<span id="dd">4</span>秒后重新输入
<script type="text/javascript">
function run(){
    var s = document.getElementById("dd");
    s.innerHTML = s.innerHTML * 1 - 1;
}
window.setInterval("run();", 1000);
</script>
</body>
</html>