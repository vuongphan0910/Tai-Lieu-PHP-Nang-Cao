<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<table width="150" border="1">
<?php
include("connect.php");
$kq=mysql_query("select * from webtm_loaisp");
while($d=mysql_fetch_array($kq)){
?>
  <tr>
    <td><a href="pt_loaisp.php?idLoai=<?php echo $d['idLoai'];?>"><?php echo $d['TenLoai'];?></a></td>
  </tr>
<?php }?>
</table>
</body>
</html>