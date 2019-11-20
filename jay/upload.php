<?php

	session_start();
	header("Content-type:text/html;charset=utf-8");
	// print_r($_FILES);
	
	if ((($_FILES["fileList"]["type"] == "image/jpg")||($_FILES["fileList"]["type"] == "image/jpeg"))&&($_FILES["fileList"]["size"] <= 3145728))
		 	{
		 		//创建指定文件夹
		 		$name ="../images";
		 		//$name = $_SESSION["username"];
		 		if(!is_dir($name)){
		 			mkdir($name);
		 		}


			  $wfile = $_FILES['fileList']['tmp_name'];


			 // $dfile = 'upload/'.$_FILES['fileList']['name'];
			  $dfile = $name.'/'.$_FILES['fileList']['name'];
			 
			  move_uploaded_file($wfile, $dfile);
		  		echo "<p style='background:yellow;'>上传图片成功</p>";
				
				
			$url='http://'.$_SERVER['SERVER_NAME'].$_SERVER["REQUEST_URI"]; 
			$urls =  dirname($url);
			echo "图片路径:";
			echo $urls."/".$name."/".$_FILES["fileList"]["name"];
			//echo $urls."/".$_FILES["fileList"]["name"];
			echo "<br/>";
		 	echo "<a href =".$urls."/".$name."/".$_FILES["fileList"]["name"].">图片查看</a>";
			//echo "<a href =".$urls."/".$_FILES["fileList"]["name"].">图片查看</a>";


		  	$file_paths = "img_modify.txt";
		  	$this_php_file_charset = 'utf-8';

		  	$file_path=iconv($this_php_file_charset,"utf-8",$file_paths);

		  	if(!file_exists($file_path)){
		  		fopen($file_path, "w");
		  	}

		  	date_default_timezone_set("Asia/Shanghai");

		  	$content = "\n\n上传时间是:".date("Y-m-d h:i:sa")."\n";
		  	$name = $_SESSION["username"]."\n";
		  	$imgname = $_FILES['fileList']['name'];
		  	$str = $content."更换图片账号::".$name."更换图片名::".$imgname;

		  	file_put_contents($file_path,$str,FILE_APPEND);


			}  	
		  	else{
		  		echo "<h2>上传文件失败，文件格式要求为jpg<h2>";
				die;
		  	}



		  //file_put_contents($file_path,$str,FILE_APPEND);
		  	//file_put_contents($logo,$contents,FILE_APPEND);	
		  	
?>

