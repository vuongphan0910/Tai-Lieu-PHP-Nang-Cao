<style>
	#tinnoibat { overflow:hidden;}
	
	#tinnoibat #top1 p{ margin:auto;}
	
	#tinnoibat #top1 a{ color:#006699; font-size:18px; text-decoration:none}
	#tinnoibat #top1 { text-align:justify; color:#000033;}
	#tinnoibat #top3 { margin-top:10px;clear:both;} 
	#tinnoibat #top3 div {  float:left; width:32%; text-align:center; border:dotted 1px #CCFF00; height:150px; overflow:hidden; padding-top:5px; margin-left:3px; background-color:#CCC}
	#tinnoibat #top3 a{ text-decoration:none; color:#006699;}
	#tinnoibat img { margin-right:5px; }
/******************************************************************/
						#featured{ 
					width:400px; 
					padding-right:250px; 
					position:relative; 
					border:5px solid #ccc; 
					height:250px; 
					background:#fff;
				}
				#featured ul.ui-tabs-nav{ 
					position:absolute; 
					top:0; left:400px; 
					list-style:none; 
					padding:0; margin:0; 
					width:250px; 
				}
				#featured ul.ui-tabs-nav li{ 
					padding:1px 0; padding-left:13px;  
					font-size:12px; 
					color:#666; 
				}
				#featured ul.ui-tabs-nav li img{ 
					float:left; margin:2px 5px; 
					background:#fff; 
					padding:2px; 
					border:1px solid #eee;
				}
				#featured ul.ui-tabs-nav li span{ 
					font-size:11px; font-family:Verdana; 
					line-height:18px; 
				}
				#featured li.ui-tabs-nav-item a{ 
					display:block; 
					height:60px; 
					color:#333;  background:#fff; 
					line-height:20px;
				}
				#featured li.ui-tabs-nav-item a:hover{ 
					background:#f2f2f2; 
				}
				#featured li.ui-tabs-selected{ 
					background:url('images/selected-item.gif') top left no-repeat;  
				}
				#featured ul.ui-tabs-nav li.ui-tabs-selected a{ 
					background:#ccc; 
				}
				#featured .ui-tabs-panel{ 
					width:400px; height:250px; 
					background:#999; position:relative;
				}
				#featured .ui-tabs-panel .info{ 
					position:absolute; 
					top:180px; left:0; 
					height:70px; 
					background: url('images/transparent-bg.png'); 
				}
				#featured .info h2{ 
					font-size:18px; font-family:Georgia, serif; 
					color:#fff; padding:5px; margin:0;
					overflow:hidden; 
				}
				#featured .info p{ 
					margin:0 5px; 
					font-family:Verdana; font-size:11px; 
					line-height:15px; color:#f0f0f0;
				}
				#featured .info a{ 
					text-decoration:none; 
					color:#fff; 
				}
				#featured .info a:hover{ 
					text-decoration:underline; 
				}
				#featured .ui-tabs-hide{ 
					display:none; 
				}
</style>

<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery-ui.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$("#featured > ul").tabs({fx:{opacity: "toggle"}}).tabs("rotate", 3000, true);
	});
</script>
<?php
	$lang='vi';
	$lang_arr=array("vi","en");
	if(isset($_COOKIE['lang']))
	$lang=$_COOKIE['lang'];
	if (in_array($lang, $lang_arr)==false) $lang='vi';
	require_once "classtin.php";
	if(isset($t)==false)
	$t=new tin;
	$tinnoibattrongloai=$t->TinNoiBatTrongLoai($lang,5,$idLT);
	$row_tnb=mysql_fetch_assoc($tinnoibattrongloai);
	
?>






		
		
		<div id="featured" >
		  <ul class="ui-tabs-nav">
          <?php 
		   	
		  while($row_tnb=mysql_fetch_assoc($tinnoibattrongloai)) {?>
	        <li class="ui-tabs-nav-item ui-tabs-selected" id="nav-fragment-1">
            	<a href="#fragment-1">
                	<img src="<?=$row_tnb['urlHinh']?>" alt="" width="100px" height="50px" />
                	<span><?php echo $row_tnb['TieuDe']?></span>
                 </a>
            </li>
            <?php }?>
	       
	      </ul>

	    <!-- First Content -->
	    <div id="fragment-1" class="ui-tabs-panel" style="">
        
				<img src="dataupload/images/5.jpg" alt="" />
			 <div class="info" >
				<h2><a href="#" ><?php echo $row_tnb['TieuDe']?></a></h2>
				<p><?php echo $row_tnb['TomTat']?><a href="#" >{chitiet}</a></p>
			 </div>
            
	    </div>

	    <!-- Second Content -->
	   

	    <!-- Third Content -->
	   

	    <!-- Fourth Content -->
	   

		</div>
	</div>





		
		
		


