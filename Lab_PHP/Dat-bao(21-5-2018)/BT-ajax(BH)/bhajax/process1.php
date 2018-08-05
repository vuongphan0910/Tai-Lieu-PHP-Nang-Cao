<?php
require_once("dbcon.php");
$idLoai=$_GET["q"];
$p=$_GET["p"];
?>
<table width="100%" border="1" cellspacing="2" cellpadding="2" style="text-align:center">
  <?php
  $sodong=3*3;
 
  $qr_sanpham = "SELECT * FROM webtm_sanpham WHERE idLoai =$idLoai";
  $sanpham = mysql_query($qr_sanpham);
  $tongsotrang=ceil(mysql_num_rows( $sanpham)/$sodong);
  
  $x=($p-1)*$sodong;  
  $qr_sanpham = "SELECT * FROM webtm_sanpham WHERE idLoai =$idLoai limit $x,$sodong";
  $sanpham = mysql_query($qr_sanpham);
  while($sp = mysql_fetch_array($sanpham))
  {
	  $SP = $sp['idSP'];
  ?>
    
  <tr>
   <td style="text-align:center"><img src="images/<?php echo $sp['UrlHinh']?>" width="100" height="100" /><br />
    <?php echo $sp['TenSP'] ?><br /><?php echo $sp['Gia'] ?>USD<br /><a href="<?php echo $sp['idSP']?>">Chi tiết</a></td>
     <?php 
  for($i=1;$i<=2;$i++)
  	{if($sp = mysql_fetch_array($sanpham))
	{
  ?>

  <td style="text-align:center"><img src="images/<?php echo $sp['UrlHinh']?>" width="100" height="100" /><br />
    <?php echo $sp['TenSP'] ?><br /><?php echo $sp['Gia'] ?>USD<br /><a href="<?php echo $sp['idSP']?>">Chi tiết</a></td>
    <?php }}?>
  </tr>
  <?php }?>
</table>
<p align="center">
  <?php
 
  
  for($i=1;$i<=$tongsotrang;$i++)
  { if ($i==$p)
  	{ echo $i."&nbsp;"; }
	else
	{
  ?>
  <a href="javascript:phantrang(<?php echo $idLoai; ?>,<?php echo $i; ?>)"><?php echo $i; ?></a>&nbsp;
  <?php
	}
  }
	?>
</p>