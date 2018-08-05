<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Binh chon</title>
</head>

<body>

<form id="form1" name="form1" method="post" action="xuly.php">
  <p><?php 
include("connect.php");
$sl="select * from binhchon where AnHien=1";
$kq=mysql_query($sl);
$d=mysql_fetch_array($kq);
echo "Cau hoi: ".$d['MoTa']."<br>";
$slpa="select * from phuongan where idBC=".$d['idBC'];
$kqpa=mysql_query($slpa);
$i=0;
while($dpa=mysql_fetch_array($kqpa))
{
?>
  
    <label>
      <input type="radio" name="binhchon" value="<?php echo $dpa['idPA'];?>" id="binhchon_<?php echo $dpa['idPA'];?>" <?php if($i==0) echo "checked='checked'";$i++;?> />
      <?php echo $dpa['MoTa'];?></label>
    <br />
 <?php }?>
  </p>
  <p>
    <input type="submit" name="thuchien" id="thuchien" value="Binh chon" />
  </p>
</form>
</body>
</html>