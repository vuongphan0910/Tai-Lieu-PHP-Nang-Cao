<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
include("connect.php");
$sl="select * from lienket order by ThuTu";
$kq=mysql_query($sl);
?>
<table width="200" border="1">
  <tr>
    <th scope="col">Cac lien ket</th>
  </tr>
  <?php
  while($d=mysql_fetch_array($kq))
  {
  ?>
  <tr>
    <td><a href="<?php echo $d['Url'];?>" target="_blank"><?php echo $d['Ten'];?></a></td>
  </tr>
  <?php }?>
</table>
</body>
</html>