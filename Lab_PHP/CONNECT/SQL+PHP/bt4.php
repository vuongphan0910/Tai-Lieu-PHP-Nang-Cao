<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
include("connect.php");
$sl="select idCS, HoTenCS from webnhac_casi";
$kqcs=mysql_query($sl);
?>
<ul>
<?php
while($dcs=mysql_fetch_array($kqcs))
{
?>
  <li><?php echo $dcs['HoTenCS']?>
  <ul>
  <?php
  $sl="select TenBH from webnhac_baihat where idCS=".$dcs['idCS'];
  $kqbh=mysql_query($sl);
  while($dbh=mysql_fetch_array($kqbh))
  {
  ?>
    <li><?php echo $dbh['TenBH'];?></li>
   <?php }?>
  </ul>
  </li>
<?php }?>
</ul>
</body>
</html>