<?php
	
	$file_href = "href.txt";

		if(file_exists($file_href)){
			$strs = file_get_contents($file_href);
		}

		//echo 'alert("修改成功");';

	echo 'window.onload=function(){
			var whwl = document.getElementById("whwl");
	     	var href = whwl.getAttribute("href");
	      	var hrefs = whwl.setAttribute("href", "'.$strs.'");}
	      ';



		
		echo " 	var weixinid=document.getElementsByClassName(\"go\");\n";
		echo " 	 for(var i=0; i<=weixinid.length;i++){\n";
		echo "	 	weixinid[i].onclick=function(){\n";
	
		echo 'window.location.href="'.$strs.'";';
		echo " 	 	}\n";
		echo " 	 }\n";
		
     

?>