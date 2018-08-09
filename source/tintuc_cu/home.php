<?php 
	session_start();
	require_once "classtin.php";
	$t = new tin;
	//$lang= 'vi';
	$view=$_GET['view'];
	
	


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<base href="http://<?=$_SERVER['SERVER_NAME'];?>/tintuc/"  />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="js/jquery.js"></script>
<script>
	
			function chuyenngonngu(lang){
		$.cookie("lang",lang, {exprire:7,path:'/tintuc/'}) ;
		document.location='/tintuc/';
	   //window.location.reload();
}
	$(document).ready(function(e) {
				$.ajax({
			url:'userinfo.php', cache:false,
			success:function(d){ $("#userinfo").html(d); }
		})
				

    });

  

</script>
<script type="text/javascript" src="js/jquery.cookie.js">
	
</script>	
<title><?=$t->getTitle($view) ?></title>

<style>
body {
		
		background:url(css/images/pattern.gif) ;
	
		
	}
	#container
	{
		width:990px;	
		margin:auto;	
	}
	#header
	{
		
		height:180px;
		background-color:#0CF;
		
	}
	#menu
	{height:37px;
	background-color:#990;

	margin-top:3px;
	
	}
	#content1{
		
		height:340px;
		width:485px;
		background-color:#FFF;
		float:left;
		margin-top:3px;
		margin-right:3px;
		border:solid 1px #CCCCCC;
		
		
		
		}	
		#content2
		{
			width:300px;
			height:310px;		
			float:left;
			background-color:#0C6;
			margin-top:3px;
			
		}
		#content3
		{
			width:197px;
			min-height:800px;
			float:right;
			background-color:#60F;
			margin-top:3px;
			margin-left:3px;
		}
		#info
		{
			height:30px;
			background-color:#F00;
			width:500px;
			float:left;
			margin-top:3px;
			
		}
		#quangcao
		{
			width:790px;
			height:87px;
			float:left;
			background-color:#F00;
			margin-top:3px;
		}
		#content4
		{
			width:790px;
			min-height:397px;
			background-color:#FFF;
			float:left;
			margin-top:3px;
			margin-bottom:3px;
			
		}
		#footer
		{height:150px;
		background-color:#000;
		clear:both;
		
		
		
	}

	#info_1{
		
			width:300px;
			height:30px;
			line-height:30px;
			background-color:#FFF;
			float:left;	
			text-align:center;
		
		}
		#info_2{
			width:80px;
			height:30px;
			float:left;
			text-align:center;
			background-color:#3F0;
		
		}
		#info_2 img{margin-top:5px;}
		#info_3{
			height:30px;
			background-color:#0CF;
			text-align:center;
		
		}
		#info_3 img{
			margin-top:5px;
		}
	.pagination_news {
					width:100%;
					clear:both;
					padding:10px 0 10px 0;
					margin:0px;
					text-align:right;
					float:left;
					clear:both;
					font-size:11px;
					
					}
					
					.pagination_news a {
					padding: 5px 10px 5px 10px;
					margin:5px;
					border: 1px solid #52bfea;
					text-decoration: none; 
					color: #000;
					box-shadow:3px 3px 3px #000;
					}
					.pagination_news span
					{
						padding: 5px 10px 5px 10px;
					background-color:#CCC;
						color:#000;
						border-radius:3px;
						box-shadow:3px 3px 3px #000;
						
						margin:0 5px 0 5px;
						text-decoration:none;
						border:solid 1px  #52bfea;}
					.pagination_news a:hover, .pagination_news a:active {
					border:1px solid #52bfea;
					color: #fff;
					background-color: #52bfea;
					}
					.pagination_news span.current {
					padding: 2px 5px 2px 5px;
					margin-right: 2px;
					border: 1px solid #52bfea;
					font-weight: bold;
					background-color: #52bfea;
					color: #FFF;
					}
					.pagination_news span.disabled {
					padding: 2px 5px 2px 5px;
					margin-right: 2px;
					border: 1px solid #f3f3f3;
					color: #ccc;
					}

</style>
</head>

<body>
<div id="container">
	<div id="header"><img src="hinh/banner2.jpg" width="990" height="180" /></div>
    <div id="menu"><?php include"menu.php";?>
    </div>
    	<?php if ($view=="") {?>
    <div id="content1"><?php include"tinnoibat_tinxemnhieu.php"?></div>
    <div id="info">
   	  <div id="info_1">{Homnay}<script type="text/javascript" src="{HomNay_JS}"></script></div>
        <div id="info_2"><img src="hinh/co/vi.jpg" width="21" height="18" onclick="chuyenngonngu('vi')" 
        title="Tiếng Việt" />
        <img src="hinh/co/en.jpg" width="21" height="18" onclick="chuyenngonngu('en')" title="English" />
        </div>
        <div id="info_3">
   	    <img src="hinh/icons/c1.jpg" width="10" height="10" />
        <img src="hinh/icons/c2.jpg" width="10" height="10" />
        <img src="hinh/icons/c3.jpg" width="10" height="10" />
         </div>
    
    </div>
    <div id="content2"><?php include "formtim.php"; 
							include "video_show.php";
	?></div>
    <?php } ?>
    <div id ="content3"><?php include "formbinhchon.php";?>
    	<div id="userinfo"><?php include "fuserinfo.php";?></div>
    </div>
    <?php if ($view=="") {?>
    <div id="quangcao"><img src="hinh/quangcao/qc3.gif" width="580" height="87" />
    <img src="hinh/quangcao/qc5.gif" width="205" height="87" /> </div>
    <?php } ?>
    <div id="content4">
     <?php	if ($view=="news") include "chitiettin.php";
	 			else if($view=="cat") include "tintrongloai.php";
				else if($view=="search") include "ketquatimkiem.php";
				else if($view=="search2") include "ketquatimkiemnangcao.php";
						else include "tinmoi.php";?>

      
    </div>
    <div id="footer">footer</div>


</div>

</body>
</html>
