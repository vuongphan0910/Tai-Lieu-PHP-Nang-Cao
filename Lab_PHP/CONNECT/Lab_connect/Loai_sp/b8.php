<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Loc san pham</title>
</head>

<body>
<?php
include("connect.php");
$slcl="select * from webtm_chungloaisp";
$kqcl=mysql_query($slcl);
?>
<form id="form1" name="form1" method="post" action="">
  <p>
    <label for="chungloai">Chung loai sp:</label>
    <select name="chungloai" id="chungloai" onchange="form1.submit();">
    <?php
	$idCL=0;
	while($dcl=mysql_fetch_array($kqcl)){
		if($idCL==0) $idCL=$dcl['idCL']; //giu idCL cua dong du lieu dau tien lay tu database
	?>
      <option value="<?php echo $dcl['idCL'];?>" <?php if(isset($_POST['chungloai'])&&$_POST['chungloai']==$dcl['idCL']) echo "selected='selected'";?>><?php echo $dcl['TenCL'];?></option>
      <?php }?>
    </select>
  </p>
  <?php
  
  	//Neu submit form thi gan lai cho bien $idCL gia tri (idCL) ma nguoi dung da chon
  	if(isset($_POST['chungloai'])) $idCL=$_POST['chungloai'];
  
  
	  $sllsp="select * from webtm_loaisp where idCL=$idCL";
	  $kqlsp=mysql_query($sllsp);
  ?>
  <p>
    <label for="loaisp">Loai sp:</label>
    <select name="loaisp" id="loaisp" onchange="form1.submit();">
    <?php 
	
	$kt=0; //Gia su $kt=0 la submit bang chung loai; $kt=1 la submit bang loaisp.
	$idLoai=0;
	while($dlsp=mysql_fetch_array($kqlsp)){
		if($idLoai==0) $idLoai=$dlsp['idLoai'];
	?>
      <option value="<?php echo $dlsp['idLoai'];?>" <?php if(isset($_POST['loaisp'])&&$_POST['loaisp']==$dlsp['idLoai']){ echo "selected='selected'"; $kt=1; //do submit bang loaisp nen gan lai $kt=1.
	   }?>><?php echo $dlsp['TenLoai'];?></option>
     <?php }?>
    </select>
  </p>

</form>
<?php


	if($kt==1) $idLoai=$_POST['loaisp']; //neu $kt=1 tuc la submit bang loaisp nen lay idLoai thong qua POST['loaisp']; nguoc lai lay idLoai cua dong dau tien.



	$slsp="select * from webtm_sanpham where idLoai=$idLoai";
	$kqsp=mysql_query($slsp);
?>
<table width="560" border="1">
  <tr>
    <th width="63" scope="col">idSP</th>
    <th width="181" scope="col">Ten SP</th>
    <th width="121" scope="col">Gia</th>
    <th width="167" scope="col">Hinh</th>
  </tr>
  <?php
  while($dsp=mysql_fetch_array($kqsp)){
  ?>
  <tr>
    <td><?php echo $dsp['idSP'];?></td>
    <td><?php echo $dsp['TenSP'];?></td>
    <td><?php echo $dsp['Gia'];?></td>
    <td><img src="<?php echo $dsp['UrlHinh'];?>" width="150" height="196" /></td>
  </tr>
  <?php }?>
</table>

</body>
</html>