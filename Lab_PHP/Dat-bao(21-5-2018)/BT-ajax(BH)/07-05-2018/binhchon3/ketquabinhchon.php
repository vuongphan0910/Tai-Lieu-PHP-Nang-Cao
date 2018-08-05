<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<table width="600" border="1">
  <tr>
    <td colspan="3">Cau hoi: <?php 
include("connect.php");
$sl="select * from binhchon where AnHien=1";
$kq=mysql_query($sl);
$d=mysql_fetch_array($kq);
echo $d['MoTa'];

//Tinh tong so lan chon:
$kqtsbc=mysql_query("select sum(SoLanChon) as tongso from phuongan where idBC=".$d['idBC']);
$dtsbc=mysql_fetch_array($kqtsbc);

?></td>
  </tr>
 <?php 
 $slpa="select * from phuongan where idBC=".$d['idBC'];
 $kqpa=mysql_query($slpa);
 while($dpa=mysql_fetch_array($kqpa))
 { 
 	
 ?>
  <tr>
    <td><?php echo $dpa['MoTa'];?></td>
    <td width="210"><table width="200" border="0">
      <tr>
        <td bgcolor="#FF0000" width="<?php echo round($dpa['SoLanChon']*200/$dtsbc['tongso'],0)?>">&nbsp;</td>
        <td> <?php echo round($dpa['SoLanChon']*100/$dtsbc['tongso'],2)?>%</td>
      </tr>
    </table></td>
    <td>So lan:<?php echo $dpa['SoLanChon'];?></td>
  </tr>
  
 <?php }?> 
  <tr>
    <td colspan="3" align="right">Tong so lan chon:<?php echo $dtsbc['tongso'];?></td>
  </tr>
</table>
</body>
</html>