<style>
	#tinxemnhieu { width:500px} 
#tinxemnhieu p{ margin-top:0px; margin-bottom:10px; background-image:url(hinh/icons/foward.gif); background-repeat:no-repeat; padding-left:20px; background-position: 2px 3px;}
#tinxemnhieu a{ color:#000; text-decoration:none}
#tinxemnhieu a:hover{ color:#003399; }
#tinxemnhieu span{ font-style:italic; color:#99CC00; font-size:12px}


</style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
	require_once"classtin.php";
	if(isset($t)==false)
	$t = new tin;
	$lang='vi';
	$lang_arr=array("vi","en");
	if(isset($_COOKIE['lang']))
	$lang=$_COOKIE['lang'];
	if (in_array($lang, $lang_arr)==false) $lang='vi';
	
	$tinxemnhieu= $t->TinXemNhieu($lang,10);
	
?>
<div id="tinxemnhieu">
<?php while($row_txn=mysql_fetch_assoc($tinxemnhieu)){?>
		<p><a href="news/<?php echo $row_txn['TieuDe_KhongDau']?>.html"><?=$row_txn['TieuDe'] ?></a>
        <span>(Xem <?=$row_txn['SoLanXem'] ?>-<?=date('d/m/Y',strtotime($row_txn['Ngay'])); ?>)</span></p>
    <?php }?>
</div>
