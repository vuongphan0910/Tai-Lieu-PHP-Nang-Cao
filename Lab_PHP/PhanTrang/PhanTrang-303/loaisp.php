<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
	include "connect.php";
	$sql="select * from webtm_loaisp ";
	$kq=mysql_query($sql);
 ?>

<table>
<?php while($query=mysql_fetch_array($kq))  {?>
	<tr><td><a href="phatrang_loaisp.php?idLoai=<?=$query['idLoai']?>"><?=$query['TenLoai']?></a></td></tr>
    <?php }?>
</table>
</body>
</html>
