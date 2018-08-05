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
	while($dcl=mysql_fetch_array($kqcl)){
	?>
      <option value="<?php echo $dcl['idCL'];?>" <?php if(isset($_POST['chungloai'])&&$_POST['chungloai']==$dcl['idCL']) echo "selected='selected'";?>><?php echo $dcl['TenCL'];?></option>
      <?php }?>
    </select>
  </p>
  <?php
  if(isset($_POST['chungloai']))
  {
	  $idCL=$_POST['chungloai'];
	  $sllsp="select * from webtm_loaisp where idCL=$idCL";
	  $kqlsp=mysql_query($sllsp);
  ?>
  <p>
    <label for="loaisp">Loai sp:</label>
    <select name="loaisp" id="loaisp">
    <?php 
	while($dlsp=mysql_fetch_array($kqlsp)){
	?>
      <option value="<?php echo $dlsp['idLoai'];?>"><?php echo $dlsp['TenLoai'];?></option>
     <?php }?>
    </select>
  </p>
  <?php }?>
</form>
</body>
</html>