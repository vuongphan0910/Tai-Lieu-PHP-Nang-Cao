<?php
 require_once"classDB.php";  
 $d=new db;
	$sql="select idDL,TenFile,MoTa,SoLanDown,url from download";
	$kq = mysql_query($sql) or die(mysql_error());
	$row= mysql_fetch_assoc($kq);
	?>
	<div id="download">
	<?php while ($row=mysql_fetch_assoc($kq) ){?>
		<h4><?=$row['TenFile'];?> . Số lần tải: <?=$row['SoLanDown'];?> &nbsp;
	   <?php if ($row['url']!="" && file_exists('download/'.$row['url'])==true){?>
			<a href="down1.php?idDL=<?=$row['idDL'];?>">Tải file</a>
	   <?php }?>
	   </h4>
	   <p><?=$row['MoTa'];?></p>
	<?php }?>
</div>
