<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<table width="600" border="1">
<?php
include("connect.php");
$kq=mysql_query("select * from images");
while($d=mysql_fetch_array($kq)){
?>
  <tr>
  
    <td><img src="<?php echo $d['urlHinh'];?>" width="200" height="150" title="<?php echo $d['MoTa'];?>" alt=""/>
    <p>Url: <?php echo $d['urlHinh'];?></p></td>
    
    <?php $d=mysql_fetch_array($kq);?>
    <td><img src="<?php echo $d['urlHinh'];?>" width="200" height="150" title="<?php echo $d['MoTa'];?>" alt=""/><p>Url: <?php echo $d['urlHinh'];?></p></td>
    
    
    <?php $d=mysql_fetch_array($kq);?>
    <td><img src="<?php echo $d['urlHinh'];?>" width="200" height="150" title="<?php echo $d['MoTa'];?>" alt=""/><p>Url: <?php echo $d['urlHinh'];?></p></td>
    
    
  </tr>
<?php }?>
</table>
</body>
</html>