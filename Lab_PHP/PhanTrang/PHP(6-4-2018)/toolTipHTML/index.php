<script language="javascript" src="boxover.js"></script>
<link rel="stylesheet" href="lightbox.css" type="text/css"/>
<p style="margin-bottom:60pt;" >abc</p>
<?php include "../connect.php";
		$sql="select * from tin limit 0,5";
		$kq=mysql_query($sql);
		while($resuit=mysql_fetch_array($kq)) { 	
 ?>
<p><a href="noidungtin.php?idTin=<?=$resuit['idTin']?>" 
	title="header=[
		<?=$resuit['TieuDe']?>
	] 
	body=[
	      <div align='justify'>
		<img width='100' align='left' src='
			<?=$resuit['urlHinh']?>
		'>
		<?=$resuit['Ngay']?> 
 		<?=$resuit['TomTat']?>
	</div>]
	"
>
	<?=$resuit['TieuDe']?>
</a>
</p>
<?php }?>