<?php
	
	$hrefs = $_POST["hrefs"];
	//var_dump($hrefs);

	$file = "href.txt";
	if(!file_exists($file)) {
		fopen($file,"w");
	}

	file_put_contents($file, $hrefs);
 		

 	$file_href ="href_modify.txt";	
	//date_default_timezone_set("Asia/Shanghai");
	$content = "\n\n修改时间:".date("Y-m-d h:i:sa")."\n";
	
	if(!file_exists($file_href)){
		fopen($file_href,"w");
	}	

		file_put_contents($file_href,$content,FILE_APPEND);
		file_put_contents($file_href,$hrefs,FILE_APPEND);	

	header("location:root.php");

?>