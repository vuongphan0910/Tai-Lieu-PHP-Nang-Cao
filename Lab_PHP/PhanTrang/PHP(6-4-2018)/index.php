<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr">
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Featured Content Slider Using jQuery - Web Developer Plus  Demos</title>
<link rel="stylesheet" type="text/css" href="style.css" />
<script type="text/javascript" src="jquery.min.js" ></script>
<script type="text/javascript" src="jquery-ui.min.js" ></script>
<script type="text/javascript">
	$(document).ready(function(){
		$("#featured > ul").tabs({fx:{opacity: "toggle"}}).tabs("rotate", 3000, true);
	});
</script>
</head>
<body>
<?php include "connect.php"; ?>


		<h3>&raquo; Featured Content Slider Using jQuery</h3>
		
		<div id="featured" >
        
		  <ul class="ui-tabs-nav">
	    	<?php $sql="select * from slider";
					$resuit=mysql_query($sql);
					while($kq=mysql_fetch_array($resuit)){
			?>
            <li class="ui-tabs-nav-item ui-tabs-selected" id="nav-fragment-<?php echo $kq['id']?>">
            	<a href="#fragment-<?php echo $kq['id']?>">
                	<img src="images/<?=$kq['hinhnho']?>" alt="" />
                	<span><?=$kq['tieude']?></span>
                 </a>
            </li>
         
	        <?php }?>
	      </ul>
	<?php
					$sql_2="select * from slider";
					$resuit_2=mysql_query($sql_2);
	 while($kq_2=mysql_fetch_array($resuit_2)){?>
	    <!-- First Content -->
	    <div id="fragment-<?=$kq_2['id']?>" class="ui-tabs-panel ui-tabs-hide" style="">
			<img src="images/<?=$kq_2['hinhlon']?>" alt="" />
			 <div class="info" >
				<h2><a href="#" ><?=$kq_2['tieude'];?></a></h2>
				<p><?=$kq_2['mota']?><a href="#" >read more</a></p>
			 </div>
	    </div>

   <?php }?>
		</div>



</body>
</html>