<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Phan trang</title>
</head>

<body>
<table width="560" border="1">
  <tr>
    <th width="63" scope="col">STT</th>
    <th width="181" scope="col">Ten SP</th>
    <th width="121" scope="col">Gia</th>
    <th width="167" scope="col">Hinh</th>
  </tr>
  <?php
  include("connect.php");
  //so sp tren 1 page:
  $sd=5;
  //Tinh tong so san pham:
  
  $kq=mysql_query("select * from webtm_sanpham");
  $tsp=mysql_num_rows($kq);
  
  //Tinh tong so trang:
  $tst=ceil($tsp/$sd);
  
  //Tinh trang hien tai:
  if(isset($_GET['page'])) $page=$_GET['page']; else $page=1;
  
  //Tinh vi tri:
  $vitri=($page-1)*$sd;  
  
  
  //Lay du lieu:
  $sl="select * from webtm_sanpham limit $vitri,$sd";
  $kqsp=mysql_query($sl);
  
  //Rot du lieu ra bang: 	  
  while($dsp=mysql_fetch_array($kqsp)){
  ?>
  <tr>
    <td>&nbsp;</td>
    <td><?php echo $dsp['TenSP'];?></td>
    <td><?php echo $dsp['Gia'];?></td>
    <td><img src="<?php echo $dsp['UrlHinh'];?>" width="150" height="196" /></td>
  </tr>
  <?php }?>
</table>
<p>Trang <?php 
for($i=1;$i<=$tst;$i++){
	if($i==$page)
	echo "<span style='font-size:26px; color:red; font-weight:bold'>$i</span> &nbsp;";
	else{
	?><a href="phantrang.php?page=<?php echo $i;?>"><?php echo $i;?></a> &nbsp;<?php 
	} //ket thuc else
} // ket thuc for
	
	?></p>

</body>
</html>