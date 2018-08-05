<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php 
	include "connect.php";
	if (isset($_GET['idLoai'])){
	$idLoai=$_GET['idLoai'];
	$sql="select * from webtm_sanpham where idLoai=$idLoai";
	$kq=mysql_query($sql);
	$tongsd=mysql_num_rows($kq);
	$limit=5;
	$tongst=ceil($tongsd/$limit);
	if(isset($_GET['p']))
	$p=$_GET['p'];
	else
	$p=1;
	$vitri=($p-1)*$limit;
	$sql_2="select * from webtm_sanpham where idLoai=$idLoai limit $vitri,$limit";
	$kq_2=mysql_query($sql_2);
?>
<table border="1" width="80%" align="center">
	<tr>
	<th>IDSP</th>
    <th>Ten Sp</th>
    <th>Gia</th>
    <th>Hinh</th>
    </tr>
	<?php while($query=mysql_fetch_array($kq_2)){?>
    <tr >
    	<td><?=$query['idSP']?></td>
        <td><?=$query['TenSP']?></td>
        <td><?=$query['Gia']?></td>
        <td><img src="<?=$query['UrlHinh']?>"  height="150px" /></td>
    </tr>
    
	<?php }?>
    <tr><td colpan="4">
    	<?php for($i=1;$i<=$tongst;$i++){ ?>
        	<a href="phatrang_loaisp.php?p=<?=$i?>&idLoai=<?=$idLoai?>"><?=$i?></a>
        <?php }?>
    </td></tr>
</table>
<?php }?>
</body>
</html>