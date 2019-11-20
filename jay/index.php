<?php
	session_start();
  header("Content-Type:text/html; charset=utf-8");
  $dat = isset($_SESSION['yanzheng']);
  if($dat!=1)
  {
   // echo "登录失败";
   echo '<script language="javascript"> 
    var con;
    con=confirm("请登录账号");  
    if(con==true) location.href="../login.php";
      else location.href="../login.php";
    </script>';
   die; 
  }
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>万汇网络</title>
		<!-- 引用控制层插件样式 -->
		<link rel="stylesheet" href="control/css/zyUpload.css" type="text/css">
		
		<script type="text/javascript" src="jquery-1.7.2.js"></script>
		<!-- 引用核心层插件 -->
		<script type="text/javascript" src="core/zyFile.js"></script>
		<!-- 引用控制层插件 -->
		<script type="text/javascript" src="control/js/zyUpload.js"></script>
		<!-- 引用初始化JS -->
		<script type="text/javascript" src="demo.js"></script>

		<style type="text/css" >
			ul{ margin: 0px; padding: 0px; border: 1px solid #000; }
			ul li{ text-decoration: none; list-style: none; border-bottom: 1px solid #000;}	
			.cl{ clear: both; }
			.rule{ text-align: center; width: 20%; float: left;}	
			.pica{  float: right; font-size: 20px; font-weight: bolder; }
			.url{ float: left; }
			
		</style>
	</head>
	
	<body>
		<h2 style="text-align:center;">万汇网络微信二维码</h2>
	    <div id="demo" class="demo"></div>   
		<div style="text-align:center;margin:50px 0; font:normal 14px/24px 'MicroSoft YaHei';">
		<div style="width: 820px; margin: 0 auto; font-size: 20px; display: block;" id="picss">
		<?php

			//$name = $_SESSION["username"];
			$name ="../images";
			if(!is_dir($name)){
				mkdir($name);
			}


		function getDirFiles($folder){
			$filesArr = array();
			if(is_dir($folder)){
				$hander = opendir($folder);
				while($file = readdir($hander)){
					//print_r($file);
					if($file=='.'||$file=='..'){
						continue;
					}elseif(is_file($folder.'/'.$file)){
						$filesArr[] = $file;
					}elseif(is_dir($folder.'/'.$file)){
						$filesArr[$file] = getDirFiles($folder.'/'.$file);
					}
				}
			}
			return $filesArr;
		}
 
		$foler = $name;
		$filesArr = getDirFiles($foler);
		$count = count($filesArr);
		
		echo "<ul>";
		for($i=0;$i<$count;$i++){
			$url='http://'.$_SERVER['SERVER_NAME'].$_SERVER["REQUEST_URI"]; 
			$urls =  dirname($url);
			echo "<li>";
			echo "<span class='rule'>图片名称:</span>";
			echo "<span class='url'>".$filesArr[$i]."</span>";
			//echo $urls."/".$_FILES["fileList"]["name"];
			//echo "<br/>";
		 	echo "<a class='pica' href =".$urls."/".$name."/".$filesArr[$i]."> 图片查看</a><br/>";
		 	echo "<div class='cl'></div>";
		 	echo "</li>";
	 	}
	 	echo "</ul>";	
		?>
		</div>
</div>

<script type="text/javascript">
	$(function(){
		$(".upload_btn").click(function(){
			$("#picss").css("display","none");
		})

	})
</script>
</body>
</html>







