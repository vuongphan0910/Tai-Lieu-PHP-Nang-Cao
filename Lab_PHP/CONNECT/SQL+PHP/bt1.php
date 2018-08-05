<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
include("connect.php");
$sl="select idUser, HoTen, Username, Email from user where idUser >= all(select idUser from user)";
$kq=mysql_query($sl);
?>
<table width="600" border="1">
  <tr>
    <th width="60" scope="col">idUser</th>
    <th width="216" scope="col">Ho ten</th>
    <th width="112" scope="col">Username </th>
    <th width="184" scope="col">Email</th>
  </tr>
 <?php
 while($d=mysql_fetch_array($kq))
 {
 ?>
  <tr>
    <td><?php echo $d['idUser'];?></td>
    <td><?php echo $d['HoTen'];?></td>
    <td><?php echo $d['Username'];?></td>
    <td><?php echo $d['Email'];?></td>
  </tr>
 <?php }?>
</table>
</body>
</html>