<?php 
session_start();
$xm = $_POST['wx'];
//echo "aa";
//var_dump($xm);
if(ctype_space($xm))
{
	echo "aa";
	header("location:root.php");
	//echo '';
	die;
}



$xm2='"'.str_replace("\r\n",'","',$xm).'"';
$xm3=str_replace(',""','',$xm2);

$xm6=preg_replace('# #','',$xm3);
//$xm6=str_replace('"",',"",$xm3);

$xm5=str_replace('"",','',$xm6);
$xm4=str_replace(' ','',$xm5);
// echo $xm."xm<hr/>";
// echo $xm4."4<hr/>";
// echo $xm2."2<hr/>";
// echo $xm3."3<hr/>";
// echo $xm6."6<hr/>";
// echo $xm5."5<hr/>";


$fil ="wx.txt";
if(!file_exists($fil)){
	fopen($fil);
}

$fils ="weixin.txt";
if(!file_exists($fils)){
	fopen($fils);
}
$dates =file_get_contents($fil);
if($dates==""){
	file_put_contents('weixin.txt', str_replace(' ','',$xm));
	file_put_contents('wx.txt', $xm4,FILE_APPEND);
}
//$xm5=str_replace(' ','',$xm4);
// echo $xm5;
	else{
			if($xm4!==''){
				$xm5 = ','.str_replace(' ','',$xm4);
				}
				else{
					$xm5=str_replace(' ','',$xm4);
				}
				echo $xm5;

			file_put_contents('weixin.txt', str_replace(' ','',$xm));
			file_put_contents('wx.txt', $xm5,FILE_APPEND);
		}
//创建日志
date_default_timezone_set("Asia/Shanghai");

	$logo = "logo.txt";
	if(isset($_SESSION["passwordss"])){
		$content = "\n\n管理员：".$_SESSION["usernamess"]."添加时间是".date("Y-m-d h:i:sa")."\n";
		$contents = "\n\n管理员：".$_SESSION["usernamess"]."修改后的微信".date("Y-m-d h:i:sa")."\n";
	}else{
		$content = "\n\n添加时间是".date("Y-m-d h:i:sa")."\n";
		$contents = "\n\n修改后的微信".date("Y-m-d h:i:sa")."\n";
	}
	
	
	$file_path = "wx.txt";
		if(file_exists($file_path))
			{
				$str = file_get_contents($file_path);
				$str = str_replace("\r\n","<br />",$str);
				
			}

		if(!file_exists($logo)){
			fopen("$logo","w");
		}
	file_put_contents($logo,$content,FILE_APPEND);
	file_put_contents($logo,$xm5,FILE_APPEND);
	
	file_put_contents($logo,$contents,FILE_APPEND);	
	file_put_contents($logo,$str,FILE_APPEND);
	


header("location:root.php");




