<style>
	#tinnoibat { width:485px ;overflow:hidden;}
	
	#tinnoibat #top1 p{ margin:auto;}
	
	#tinnoibat #top1 a{ color:#006699; font-size:18px; text-decoration:none}
	#tinnoibat #top1 { text-align:justify; color:#000033;}
	#tinnoibat #top3 { margin-top:10px;clear:both;} 
	#tinnoibat #top3 div {  float:left; width:32%; text-align:center; border:dotted 1px #CCFF00; height:150px; overflow:hidden; padding-top:5px; margin-left:3px; background-color:#CCC}
	#tinnoibat #top3 a{ text-decoration:none; color:#006699;}
	#tinnoibat img { margin-right:5px; }

</style>
<?php
	$lang='vi';
	$lang_arr=array("vi","en");
	if(isset($_COOKIE['lang']))
	$lang=$_COOKIE['lang'];
	if (in_array($lang, $lang_arr)==false) $lang='vi';
	require_once "classtin.php";
	if(isset($t)==false)
	$t=new tin;
	$tinnoibat=$t->TinNoiBat($lang,4);
	$row_tnb=mysql_fetch_assoc($tinnoibat);
	
?>
<div id="tinnoibat">
 <div id="top1">
   <img width=150 height=120 align=left src="<?=$row_tnb['urlHinh'] ?>"/>
   <p><a href="news/<?php echo $row_tnb['TieuDe_KhongDau']?>.html"><?=$row_tnb['TieuDe'] ?></a> </p>
   <!--<p class="tomtat">--><span><?=$row_tnb['TomTat'] ?></span><!--</p>-->
   
 </div>    
 <div id="top3">
	<?php while($row_tnb=mysql_fetch_assoc($tinnoibat)) {?>
   <div> 
     <img src="<?=$row_tnb['urlHinh']?>" width="140" height="90" /><br>
      <a href="news/<?php echo $row_tnb['TieuDe_KhongDau']?>.html"><?php echo $row_tnb['TieuDe']?></a> 
   </div>
  	<?php }?>
 </div>
</div>
