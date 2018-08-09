<style type="text/css">

#tinmoi {width: 790px;}
a{color:#000;}
/*#tinmoi .rows { width:385px; float:left; margin-bottom:5px; 
			margin-left:5px; margin-top:5px; }*/

#tinmoi  #tinmoinhat {
	width:330px;
	float:left;
	color:#000;
	min-height: 175px;
	margin-left:8px;
	
}

#tinmoi  #tinmoitieptheo {
	float:left;
	width:230px;
	min-height: 160px;
	overflow: hidden;
	/*white-space: nowrap;*/
	border-left: solid 1px #CCC;
	border-right: solid 1px #CCC;
	/*margin-bottom:5px;
	padding:0 10px;*/
}
#tinmoi  #theloai {
	font-size:18px; color:#000;
	padding-top:5px; padding-bottom:5px; clear:left;
	border-top:solid 1px #0033FF;
	border-bottom:dotted 1px  #0033FF;
	margin-bottom:5px;
	
}
#tinmoi  #theloai a {
	color:#000; text-decoration:none; margin-left:10px; font-size:16px;}
	#tinmoi  #theloai a:first-child {
	color:#03F;}
#tinmoi #theloai a:hover{ color:#6CC; text-decoration:none; }

#tinmoi  #tinmoinhat a {
	text-decoration:none; color:#003366; 
	font-size:16px; font-weight:bold;
}
#tinmoi #tinmoinhat a:hover{ text-decoration:none; color:#06F}
#tinmoi  #tinmoinhat img {	margin-right: 5px; }
#tinmoinhat p{text-align:justify;margin-right:5px;}
#tinmoi  #tinmoitieptheo a {
	font-size:14px;
	text-decoration:none;
	color:#003333;
	font-weight:bold;
	/*margin-bottom:5px;*/
}
#tinmoi #tinmoitieptheo a:hover{/*text-decoration:underline;*/ color:#06F}
#tinmoi  #tinmoitieptheo p {
	margin-top:5px; margin-bottom:5px; padding:0 5px;
}
#tinphu{
		float: left;
    	margin:10px  0 0 45px;
   		 width: 15%;
	
	}
	#tinphu a {
			text-decoration:none;
			
			
			
		}
	#tinphu img {margin-bottom:0px;}
	#tinphu a:hover{color:#09F }
	#tinphu h4{margin-top:5px; text-align:center;}
	#tinmoinhat p{margin-top:5px; font-size:15px;}
</style>
<script>
$(document).ready(function(e) {
    var sotheloai= $(".rows").length;	
	if (sotheloai%2==1) $('.rows:last').css('width','790px');
	$('#tinmoi').corner("5px"); $('.rows #theloai').corner('5px top');
	$('.rows #tinmoitieptheo').corner('5px bottom');
});
	



</script>
	


<?php 
         require_once "classtin.php";  
         if (isset($t)==false)
		  $t = new tin;
            $theloai= $t -> TheLoai($lang, 1);
			?>
<div id="tinmoi">
	<?php while($row_theloai=mysql_fetch_assoc($theloai)) { ?>
	<div class=rows>
  <div id="theloai"> <a href="#"><?php echo $row_theloai['TenTL'];?></a><?php $loaitin= $t->LoaiTinTrongTheLoai($row_theloai['idTL']); while ($row_loaitin= mysql_fetch_assoc($loaitin)) {?><a href="cat/<?=$row_loaitin['Ten_KhongDau'];?>/"><?=$row_loaitin['Ten']?></a><?php } ?>
      </div>
  <!-- div theloai -->
  <div id="tinmoinhat">
  	<?php 
	   			$idTL=$row_theloai['idTL'];	
	   			$tinmoi=$t->TinMoiTrongTheLoai($idTL,0,1);
	   			$row_tinmoi=mysql_fetch_assoc($tinmoi);
				
	   
	   ?>
    <a href="news/<?php echo $row_tinmoi['TieuDe_KhongDau']?>.html"  > <?=$row_tinmoi['TieuDe']?></a>
    <p> <img src="<?=$row_tinmoi['urlHinh']; ?>" width="210" height="110" align="left" />
         <?=$row_tinmoi['TomTat']?> 
    </p>
  </div> <!-- tinmoinhat -->
  <div id="tinmoitieptheo">
   <?php $tinmoitieptheo=$t->TinMoiTrongTheLoai($idTL,1,5);//6,1 ?>
        <?php while($row_tinmoitieptheo=mysql_fetch_assoc($tinmoitieptheo)){?>
        	<p><!--<img src="hinh/icons/arrow1.gif" />-->- <a href="news/<?php echo $row_tinmoitieptheo['TieuDe_KhongDau']?>.html"><?=$row_tinmoitieptheo['TieuDe']; ?></a></p>
        <?php }?>
    
  </div> 
   <!-- div id=tinmoitieptheo -->
   <div id="tinphu">
   		 <?php $tinmoitieptheo=$t->TinMoiTrongTheLoai($idTL,6,1);//6,1 ?>
        <?php while($row_tinphu=mysql_fetch_assoc($tinmoitieptheo)){?>
        	<img src="<?=$row_tinphu['urlHinh'] ?>" width="140" height="110" align="center" />
            <h4><a href="news/<?php echo $row_tinphu['TieuDe_KhongDau']?>.html"  ><?=$row_tinphu['TieuDe']; ?></a></h4>
        <?php }?>
   
   </div>

 

 </div> 
<?php }?>
</div><!-- tinmoi -->