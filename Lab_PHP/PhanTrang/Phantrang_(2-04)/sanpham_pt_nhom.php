<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style >
	#container_sp{width:960px;}
	.sp{ width:230px; float:left;border:solid 1px #000000; margin:5px;
	}
	.sp img{width:150px; height:100px}
	#phantrang{clear:both;float:left;margin:auto;width:250px}
</style>
</head>

<body>
<?php
	include ("connect.php");
	$sql="select * from webtm_sanpham";
	$kq=mysql_query($sql);
	$tongsd=mysql_num_rows($kq);
	$limit=20;
	$limit_trang=5;
	$tongst=ceil($tongsd/$limit);
	$tsnhom=ceil($tongst/$limit_trang);
	
	
	if(isset($_GET['p'])){
	$p=$_GET['p'];
	$nhom=ceil($p/$limit_trang);
	}
	else{
	$p=1;
	$nhom=1;
	}
	$vitri=($p-1)*$limit;
	$dau=($nhom-1)*$limit_trang+1;
	$cuoi=$nhom*$limit_trang;
	$sql_2="select * from webtm_sanpham limit $vitri,$limit";
	$kq_2=mysql_query($sql_2);
	
	
	
?>
<div id="contain_sp">
	<?php while($query=mysql_fetch_array($kq_2)){?>
	<div class="sp">
    	<img src="<?=$query['UrlHinh']?>" />
        <p>Ten San Pham : <?=$query['TenSP']?></p>
        <p>Gia :<?=$query['Gia']?></p>
    </div>
       <?php }?>
   
</div>
    <div id="phantrang">
    <?php for($i=1;$i<=$tongst;$i++){ //chua xong?>
        	<a href="phantrang_sp_cot.php?p=<?=$i?>"><?=$i?></a>
        <?php }?>
        </div>


</body>
</html>