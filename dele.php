<?php
	session_start();
	header("Content-type:text/html; charset=utf-8;");
	$id = $_GET["wl"];
	echo $id;
	$file_path = "wx.txt";
	if(file_exists($file_path)){
	$str = file_get_contents($file_path);
	$str = str_replace("\r\n","",$str);
	$stra=explode(",",str_replace('"','',$str)); 
	$stt = "";
	$zt =$stra[$id];
		if(count($stra)>0)
			{
				for($i=0;$i<count($stra);$i++){
					unset($stra[$id]);
					//echo $stra[$i]."++";					
				}		
				//数组转换成字符串			
				$stt = implode(',',$stra);
				//var_dump($stt);
				$st1 = '"'.str_replace(",",'","',$stt).'"';
					if(!file_exists($file_path)){
						fopen("$file_path","w");
					}
					file_put_contents($file_path,$st1);
					header("location:root.php");
					//echo $st1;
				//修改后的日志
				date_default_timezone_set("Asia/Shanghai");
					$logo = "logo.txt";

					if(isset($_SESSION["passwordss"])){

						$content = "\n\n管理员：".$_SESSION["usernamess"]."剩余微信".date("Y-m-d h:i:sa")."\n";
						$contents = "\n\n管理员：".$_SESSION["usernamess"]."删除的微信".date("Y-m-d h:i:sa")."\n";

					}else{
						$content = "\n\n剩余微信".date("Y-m-d h:i:sa")."\n";
						$contents = "\n\n删除的微信".date("Y-m-d h:i:sa")."\n";
					}

					
						if(!file_exists($logo)){
							fopen("$logo","w");
						}
					file_put_contents($logo,$contents,FILE_APPEND);	
					file_put_contents($logo,$zt,FILE_APPEND);
					
					file_put_contents($logo,$content,FILE_APPEND);	
					file_put_contents($logo,$st1,FILE_APPEND);
					
				//删除后将数据存在wx.txt							

			}			

	}


?>