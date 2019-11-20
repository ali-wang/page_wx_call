<?php
  session_start();
  //检测是否登录
  	
  $dat = isset($_SESSION['yanzheng']);

  $numdate = "numdate.txt";
	if(!file_exists($numdate)){
	 header("location:login.php");
	}
	$date_w  =file_get_contents($numdate);
	if($date_w == $_SESSION['yanzheng']){
		$flag=true;
	}else{
		$flag=false;
	}
//var_dump($flag);

  if($dat!=1 || !$flag)
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
header("refresh:1800;url=clearsession.php"); 
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no, minimal-ui">
	<title>微信更改</title>
	<link rel="stylesheet" type="text/css" href="js/bs/css/bootstrap.min.css">
 	   
	<style>
		.mt20{ margin-top: 20px; }
		.gu{ resize: none; }
		.ml200{ margin-left: 196px; }	
	</style>
</head>
<body>
	<div class="container">
		<div class="page-header">
  			<h1 class="text-center">微信更改系统后台</h1>
		</div>
	
			<div class="panel panel-default mt20">
  				<div class="panel-heading row" style="margin:0px;"> 

  				<h3 class="col-xs-6">更改后的微信号</h3>
  				<h3 class="col-xs-6 text-right"><a href="jay/index.php" class="btn btn-primary">添加二维码图片</a></h3>
  				</div>
 				 	<div class="panel-body">
   					 	<div class="bs-example" data-example-id="hoverable-table">
						    <table class="table table-hover">
						      <thead>
							        <tr>
							          <th class="text-center">编号</th>
							          <th class="text-center">微信号码</th>
							          <th class="text-center">操作</th>
							        </tr>
						      </thead>

						      <tbody>

						        <?php
									$file_path = "wx.txt";
									if(file_exists($file_path)){
									$str = file_get_contents($file_path);
									$str = str_replace("\r\n","",$str);
									$stra=explode(",",str_replace('"','',$str)); 
										if(count($stra)>0)
											{
												for($i=0;$i<count($stra);$i++){
													
													$fil ="wx.txt";
									        		$fils ="";
									        		$date_1=file_get_contents($fil);
							        		
									        		if($date_1=='""'){
									        			file_put_contents($fil,$fils);
									        		}

							        			

												echo '<tr>
							          <th scope="row" class="text-center">'.($i+1).'</th>
							          <td class="text-center">'.$stra[$i].'</td>
							         	<th class="text-center"><a href=javascript:if(confirm("确认清除'.$stra[$i].'微信号？"))location.href="dele.php?wl='.$i.'">删除微信</a></th>
							        </tr>';		
								
												}	
											}			

									}
									
									
									?>
							        
							         
						      </tbody>
						    </table>
						</div>
  					</div>
			</div>

	<!--修改微信号-->
	<h3 class="">请输入要推广的微信号</h3>
		<div class="bs-example" data-example-id="textarea-form-control">
		    <form action="admin.php" id="form" enctype="multipart/form-data" method="post">
	     		 <textarea name="wx" id="wx" class="form-control gu" rows="10" cols="15" onkeyup="value=value.replace(/[\u4E00-\u9FA5]/g,'') " onbeforepaste="clipboardData.setData('text',clipboardData.getData('text').replace(/[^\d]/g,''))" >
						<?php
						    $file_path = "weixin.txt";
						    if(file_exists($file_path)){
						    	$str =file_get_contents($file_path);
						    	//echo $str;
						    }
						?>
	     		 </textarea>

				<!-- <div class="mt20 ml200">
			       <button type="submit" id="btns" class="btn btn-primary" onclick="myfun()">添加微信</button>
					<button type="reset" class="btn btn-danger ml200">清除微信</button>
				</div> -->	
				<div class="row mt20">

					  <button type="submit" id="btns" class="btn btn-primary col-xs-3 col-sm-3 col-md-3 col-xs-offset-1 col-sm-offset-1 col-md-offset-1" onclick="myfun()">添加微信</button>

					 <!-- <a href="wexclear.php" type="reset" class="btn btn-danger col-xs-3 col-sm-3 col-md-3 col-xs-offset-3 col-sm-offset-3 col-md-offset-3">清除微信</a> -->
					 <a href="javascript:if(confirm('是否确认清除所有微信号？')) location.href='wexclear.php'" class="btn btn-danger col-xs-3 col-sm-3 col-md-3 col-xs-offset-3 col-sm-offset-3 col-md-offset-3" >全部删除微信</a>
					  
				</div>
	
		    </form>

		  </div>

<div class="alert alert-success mt20" role="alert">
      <strong>Well done!</strong> When the world says “Give up”, hope whispers, “Try it one more time.”
    </div>

<!--更换跳转链接-->

			<div class="panel panel-default mt20">
			  <div class="panel-heading"><h3>更换跳转链接</h3><small>超链接模式（跳转二维码）和点击复制的切换。点击复制的地址（lj/index.html）</small></div>
			  <div class="panel-body">
			   
					<form class="form-inline row" action="hrefs.php" id ="hrefs" method="post">
						<div class="alert alert-danger" role="alert">
      							<strong>您正在使用的跳转链接：</strong>
      							<kbd>
      							<?php
								    	$file_zt ="href.txt";
								    	$file = "href.txt";
										if(!file_exists($file)) {
											fopen($file,"w");
										}
								    	$file_content = file_get_contents($file_zt);
								    	echo $file_content;
								    	//echo "aaaaaaaaaa";
								    ?>
								</kbd>
    						</div>
					  <div class="form-group col-xs-9 col-sm-9 col-md-9 ">
					    <label class="sr-only" for="InputAmount">Amount (in dollars)</label>
					    <div class="input-group col-xs-11 col-sm-11 col-md-11 ">
					      <div class="input-group-addon">跳转连接</div>
					      <input type="text" class="form-control" id="InputAmount" name="hrefs" placeholder="请填写相关链接" value=<?php
					    	$file_zt ="href.txt";
					    	$file_content = file_get_contents($file_zt);
							echo $file_content;



					    	
					    	?>>


					      <!-- <div class="input-group-addon"></div> -->
					    </div>
					  </div>
					  <button type="submit" class="btn btn-primary col-xs-2 col-sm-2 col-md-2" onclick="zt()">确定</button>
					</form>


			  </div>
			   <div class="panel-footer text-right">made Mr wang</div>

			</div>
				
				

			<div class="alert alert-success mt20" role="alert">
		      <h3 class="text-center">更多操作敬请期待，万汇网络技术部</h3><div class="text-right">安主管</div>
		    </div>

		
	</div>
	

	<script>
	//获取焦点时，清除数据
	var wx = document.getElementById("wx");
	wx.onfocus=function(){
		wx.value="";
			}
			//alert(wx);
	</script>
<script>

	function myfun(){
			var con = document.getElementById("wx").value;
				//alert(con);
				if(con==""){ 
					var zt = document.getElementById("form");
					var zts = zt.setAttribute("action","#");
					//alert(zts);
					alert("修改数据失败，请添加修改数据！");
					window.location.href='root.php';
					setTimeout(function() {
    				 window.location.href='root.php'
 　						　}, 600);	
				}

				//con=con.replace(/[\u4E00-\u9FA5]|[\uFE30-\uFFA0]/g,'');

			}



function hz(obj){ 
		var con = document.getElementById("wx").value;
		if(!con.match(/^\w{2,10000}$/)){
			con = con.replace();
		}
   
}



function yz2(){
	
	//var btns = document.getElementById("btns");
     var val = document.getElementById("wx").value;
 		btns.click=function(){
 			alert("aa");
 		}
     if(val == ""){
     alert("请输入微信号");
	 return false;
     }	
      alert("修改成功");
	 setTimeout(function() {
     window.location.href='root1.php';
 　　}, 600);

	 function wl(){
	//获取焦点时，清除数据
	var wx = document.getElementById("wx");
	wx.onfocus=function(){
		wx.value="";
			}
	 }
}

function zt(){
			var con = document.getElementById("InputAmount").value;
				//alert(con);
				if(con==""){ 
					var zt = document.getElementById("hrefs");
					var zts = zt.setAttribute("action","#");
					//alert(zts);
					alert("修改数据失败，请添加修改数据！");
					window.location.href='root.php';
					
				}
			}



function wxclear(){
	var r=confirm("确定要删除所有微信号？");
    if (r==true){
        //window.location.href="http://www.baidu.com";
        window.location.href="wexclear.php";
        alert(11);
    }
}			
	



//ajax
function ajax(){
	var xmlhttp;	
				if (window.XMLHttpRequest)
				  {// code for IE7+, Firefox, Chrome, Opera, Safari
				  xmlhttp=new XMLHttpRequest();
				  }
				else
				  {// code for IE6, IE5
				  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
				  }

				xmlhttp.open("post","indexaa.php",true);
				xmlhttp.send();
				xmlhttp.onreadystatechange=function()
				  {
				  if (xmlhttp.readyState==4 && xmlhttp.status==200)
				    {
				    	//document.getElementById("myDiv").innerHTML=xmlhttp.responseText;
				    	r = xmlhttp.responseText;
				    	if(r==0){ 
				    		alert("邮箱错误");
				    	}
				    	if(r==1){ 
				    		alert("发送成功");
				    	}
				    	if(r==2){ 
				    		alert("发送失败");
				    	}
				    }
				  }

}

</script>


</body>
</html>