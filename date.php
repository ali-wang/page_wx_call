<?php
session_start();
require_once("function.class.php");
header("Content-Type:text/html; charset=utf-8");

$name = posturl();
	
	
	//账号
	$my_name = $name['u_ip'];
	//密码
	// $my_password = "456789";

	$name = $_POST['username'];
	//$password = $_POST['password'];
	$date = $_POST['yanzheng'];

//获取验证码
	$numdate = "numdate.txt";
	if(!file_exists($numdate)){
	 header("location:login.php");
	}
	$date_w  =file_get_contents($numdate);

	if($name==$my_name && $date_w ==$date){		
		$_SESSION["username"]=$name;
		//$_SESSION["password"]=$password;
		$_SESSION["yanzheng"]=$date;
			//echo "登录成功";
			//echo $_SESSION['username'];
			//die;
		$logo = "logo.txt";
	  $content = "\n\n登录成功时间和验证码".date("Y-m-d h:i:sa")."\n";
	  file_put_contents($logo, $content,FILE_APPEND);
	  file_put_contents($logo, $date,FILE_APPEND);

		header("location:root.php");


	}else{
		//echo "账号或密码错误";
		// echo('<script language="javascript"> 
		// var con;
		// con=confirm("账号或密码错误?"); 
		// if(con==true) location.href="login.php";
		// 	else location.href="login.php";
		// </script>');
		header("location:tzpage.php");
		die; 
		//header("location:login.php");
		//die;
	}

	//echo $_SESSION["username"];
?>