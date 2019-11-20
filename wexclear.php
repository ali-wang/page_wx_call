<?php
 session_start();
  //
  $dat = isset($_SESSION['yanzheng']);
  if($dat!=1)
  {
   // echo "登录失败";
   echo '<script language="javascript"> 
    var con;
    con=confirm("请登录账号");  
    if(con==true) location.href="login.php";
      else location.href="login.php";
    </script>';
   die; 
  }
	$file_path = "wx.txt";
	$file="";
	file_put_contents($file_path,$file);
	echo "清除成功";

	


	$files_path = "logo.txt";

	if(!isset($_SESSION["passwordss"])){
		$content = "\n\n清除所有微信时间:".date("Y-m-d h:i:sa")."\n";
	}else{
		$content = "\n\n管理员：".$_SESSION["usernamess"]."清除所有微信时间:".date("Y-m-d h:i:sa")."\n";
	}
	
	if(!file_exists($files_path)){
		fopen($files_path,"w");
	}	

	file_put_contents($files_path,$content,FILE_APPEND);
		

	header("location:root.php");	
?>