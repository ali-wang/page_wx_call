<?php
session_start();
//在此之前需要打开php.ini,将里面的 sockets和openssl打开，邮箱才能发送成功。
header("Content-Type:text/html;charset=utf-8");
require_once("function.class.php");

  	//判断是否是正确的邮箱格式;
  	 function isEmail($email){
   		$mode = "/^[a-zA-Z0-9_-]+@([a-zA-Z0-9]+\.)+(com|cn|net|org)$/";
   		if(preg_match($mode,$email)){
  			return true;
 		 }
  		else{
 			  return false;
		  }
 	  }

    function getrandstr(){ 
        //$str='ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890'; 
		  $str='1234567890';
        $randStr = str_shuffle($str);//打乱字符串 
        $rands= substr($randStr,0,6);//substr(string,start,length);返回字符串的一部分 
        return $rands; 
      }

$email = $_GET["emile"];
$mail = isEmail($email);



if(!$mail){
  echo 0;
  die;
}

$logo = "logo.txt";
  $content = "\n\n获取验证码时间".date("Y-m-d h:i:sa")."\n";
  file_put_contents($logo, $content,FILE_APPEND);
  file_put_contents($logo, $email,FILE_APPEND);



$num = getrandstr();

$numdate = "numdate.txt";
if(!file_exists($numdate)){
  fopen($numdate);
}
file_put_contents($numdate, $num);

//echo $num;
//die;

$name = posturl();

if($name['code'] =="400" ){
   echo 2;die;
}
$file = $_SERVER["PHP_SELF"];
$file1 = str_replace('/indexaa.php','',$file);

// $flag = sendMail($name,$email,$name['Customer'],'<span style="color:skyblue;">'.$name['Customer'].'验证码是：</span><p>'.$num.'</p><br/>');
$flag = sendMail($name,$email,$name['Customer'],'<span style="color:#000; font-size:16px;"><span style=" background:#fff; color:#000;">账户名称：'.$file1.'</span><hr/>'.$name['Customer'].'验证码是：</span><span>'.$num.'</span>');


if($flag){
    echo 1;
}else{
    echo 2;
}


?>