

<!DOCTYPE html>
<html lang="zh-CN">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<title>微信更改后台管理系统</title>

<link rel="stylesheet" href="js/css/style.css">
<style type="text/css" media="screen">
	.yanzheng{ width: 150px; float: left;}
	#submits{ width: 100px; margin-left: 20px; line-height: 42px; display: block; float: left; margin-top:25px;  background: rgba(6, 127, 228, 0.71);-moz-border-radius: 6px;-webkit-border-radius: 6px;border-radius: 6px;}
	
</style>
<body>

<div class="login-container">
	<h1>微信更改后台管理系统</h1>
	
	<div class="connect">
		<p>come on baby</p>
	</div>
	
	<form action="date.php" method="post" id="loginForm">
		<div>
			<input type="text" id="username" name="username" class="username" placeholder="用户名" autocomplete="off"/>
		</div>
		
		<div>
			<input type="text" name="yanzheng" class="yanzheng" placeholder="请输入验证码" /><span id="submits" onclick="ajax()">获取验证码</span>
		</div>
		<button id="submit" type="submit">登 陆</button>
	</form>
	<div id="email">
		
			
			<div>
			<div id="em" name="mail" style="display: none;">719362307@qq.com</div>
			</div>
		
	</div>


</div>

<script src="js/jquery.min.js"></script>
<script src="js/common.js"></script>
<!--背景图片自动更换-->
<script src="js/supersized.3.2.7.min.js"></script>
<script src="js/supersized-init.js"></script>
<!--表单验证-->
<script src="js/jquery.validate.min.js?var1.14.0"></script>


<script type="text/javascript">
	$.fn.onlyNumAlpha = function () {
    $(this).keypress(function (event) {
        var eventObj = event || e;
        var keyCode = eventObj.keyCode || eventObj.which;
        if ((keyCode >= 48 && keyCode <= 57) || (keyCode >= 65 && keyCode <= 90) || (keyCode >= 97 && keyCode <= 122))
            return true;
        else
            return false;
    }).focus(function () {
        this.style.imeMode = 'disabled';
    }).bind("paste", function () {
        var clipboard = window.clipboardData.getData("Text");
        if (/^(\d|[a-zA-Z])+$/.test(clipboard))
            return true;
        else
            return false;
    });
};
</script>
<div style="text-align:center;margin:50px 0; font:normal 14px/24px 'MicroSoft YaHei';">
<p>好的心情决定了每天的工作态度</p>
<script>

function ajax(){
	var m =document.getElementById("em");
	var btns = document.getElementById("submits");
	var btn1 =btns.innerText;
	//btns.innerHTML="邮件已发送";
		console.log(btn1);
		var username =document.getElementById("username");
		var user = username.value;
		//alert(user);
			if(!user){
				alert("请输入用户名");		
			}

			else{
				btns.innerHTML="验证码发送中";
				//alert("发送邮件");
				var emile =m.innerText;
				//alert(emile);
				var xmlhttp;	
				if (window.XMLHttpRequest)
				  {// code for IE7+, Firefox, Chrome, Opera, Safari
				  xmlhttp=new XMLHttpRequest();
				  }
				else
				  {// code for IE6, IE5
				  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
				  }

				xmlhttp.open("get","indexaa.php?emile="+emile,true);
				xmlhttp.send();
				xmlhttp.onreadystatechange=function()
				  {
				  if (xmlhttp.readyState==4 && xmlhttp.status==200)
				    {
				    	//document.getElementById("myDiv").innerHTML=xmlhttp.responseText;
				    	r = xmlhttp.responseText;
				    	if(r==0){ 
				    		alert("邮箱错误");
				    	}
				    	if(r==1){ 
				    		alert("发送成功");
				    	}
				    	if(r==2){ 
				    		alert("发送失败");
				    	}
				    }
				  }
			}
	

}
</script>
</div>
</body>
</html>