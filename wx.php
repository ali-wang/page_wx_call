<?php 
header("Content-Type:text/html;charset=utf-8");
//修改微信号码
$file_path = "wx.txt";
if(file_exists($file_path))
	{
		$str = file_get_contents($file_path);
		if(strstr($str,',""')){
			$str = str_replace(',""',"",$str);
			
			file_put_contents($file_path,$str);
		}
		

		$str = str_replace("\r\n","<br />",$str);
	}


//修改跳转链接

	
$str = trim($str,'"');
$wx_array = explode('","', $str);
$wx=rand(0,count($wx_array)-1);


	
echo 'arr_wx = ["'.$wx_array[$wx].'"];
      var wx_index = Math.floor(Math.random()*arr_wx.length);
      var stxlwx = arr_wx[wx_index];
	  ';
	  
$url='http://'.$_SERVER['SERVER_NAME'].$_SERVER["REQUEST_URI"]; 
$urls =  dirname($url);

echo "var wx_img = \"<img style='width:100%;display:block;' src='".$urls."/images/\"+ stxlwx +\".jpg'>\";\n"; 




	  ?>
	  