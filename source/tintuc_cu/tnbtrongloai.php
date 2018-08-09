  <?php
	$lang='vi';
	$lang_arr=array("vi","en");
	if(isset($_COOKIE['lang']))
	$lang=$_COOKIE['lang'];
	if (in_array($lang, $lang_arr)==false) $lang='vi';
	require_once "classtin.php";
	if(isset($t)==false)
	$t=new tin;
	$tinnoibattrongloai=$t->TinNoiBatTrongLoai($lang,2,$idLT);
	$row_tnb=mysql_fetch_assoc($tinnoibattrongloai);
	
?>
  			
				
             
             <div id="fragment-1" class="ui-tabs-panel" style="">
        <?php while($row_tnb=mysql_fetch_assoc($tinnoibattrongloai)) {?>
				<img src="<?=$row_tnb['urlHinh']?>" alt="" />
			 <div class="info" >
				<h2><a href="#" ><?php echo $row_tnb['TieuDe']?></a></h2>
				<p><?php echo $row_tnb['TomTat']?><a href="#" >{chitiet}</a></p><?php }?>
			 </div>
            
	    </div>
           