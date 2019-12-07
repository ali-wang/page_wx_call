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


if(isset($_COOKIE["mywh"])){
		$data = json_decode($_COOKIE["mywh"],256);
	// var_dump($data);
		if($wx_array[$data['id']]==$data['data']){
			$wx = $data['id'];
		}else{
			setcookie("mywh", "", time()-3600);
			$mywhdata = [
				'id' =>$wx,
				'data'=>$wx_array[$wx]
			];
			setcookie("mywh", json_encode($mywhdata), time()+600);
		}
	}else{

		$mywhdata = [
			'id' =>$wx,
			'data'=>$wx_array[$wx]
		];

		setcookie("mywh", json_encode($mywhdata), time()+600);
}






// echo $_COOKIE["mywh"];

echo 'arr_wx = ["'.$wx_array[$wx].'"];
      var wx_index = Math.floor(Math.random()*arr_wx.length);
      var stxlwx = arr_wx[wx_index];
	  ';


//echo "var wx_img = \"<img style='width:100%;display:block;' src='img/\"+ stxlwx +\".jpg'>\";\n"; 


	

	  ?>
	  