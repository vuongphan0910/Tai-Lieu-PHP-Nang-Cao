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


		
		<div id="featured" >
		  <ul class="ui-tabs-nav">
          
       <?php
	   include("connect.php");
	   $sl="select * from slider";
	   $kq=mysql_query($sl);
	   $i=0;
	   while($d=mysql_fetch_array($kq)){
	   ?>          
	        <li class="ui-tabs-nav-item<?php if($i==0) echo " ui-tabs-selected"; $i=1;?>" id="nav-fragment-<?php echo $d['id'];?>">
            	<a href="#fragment-<?php echo $d['id'];?>">
                	<img src="images/<?php echo $d['hinhnho'];?>" alt="" />
                	<span><?php echo $d['tieude'];?></span>
                 </a>
            </li>
	   <?php }?>   
	      </ul>

	  <?php
	  $kq=mysql_query($sl);
	  $i=0;
	   while($d=mysql_fetch_array($kq)){
	  ?>
	    <!-- Second Content -->
	    <div id="fragment-<?php echo $d['id'];?>" class="ui-tabs-panel<?php if($i>0) echo " ui-tabs-hide";$i=1;?>" style="">
			<img src="images/<?php echo $d['hinhlon'];?>" alt="" />
			 <div class="info" >
				<h2><a href="<?php echo $d['url'];?>" ><?php echo $d['tieude'];?></a></h2>
				<p><?php echo $d['mota'];?>....
                    <a href="<?php echo $d['url'];?>" >read more</a>
                </p>
			 </div>
	    </div>
	  <?php }?>


	</div>


</body>
</html>