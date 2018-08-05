<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
 include("../connect.php");
 if(isset($_GET['lang'])) $lang=$_GET['lang'];
 else $lang='vi';
?>
<form id="form1" name="form1" method="get" action="">
  <p>
    <label for="lang">Ngon ngu:</label>
    <select name="lang" id="lang" onchange="form1.submit()">
      <option value="vi">Viet</option>
      <option value="en" <?php if($lang=='en') echo "selected='selected'";?>>English</option>
    </select>
  </p>
  <p>
    <label for="idTL">The loai:</label>
    <select name="idTL" id="idTL" onchange="form1.submit()">
  <?php 
 $sl="select * from theloai where lang='$lang' order by ThuTu";
 $kq=mysql_query($sl);
 $idTL=0;
 while($d=mysql_fetch_array($kq)){
	 if($idTL==0) $idTL=$d['idTL'];
 ?>
      <option value="<?php echo $d['idTL'];?>" <?php if(isset($_GET['idTL'])&&$_GET['idTL']==$d['idTL']){echo "selected='selected'";$idTL=$_GET['idTL'];}?>><?php echo $d['TenTL'];?></option>
 <?php }?>
    </select>
  </p>
  <p>
    <label for="idLT">Loai tin:</label>
    <select name="idLT" id="idLT"  onchange="form1.submit()">
     <?php 
 $sl="select * from loaitin where idTL=$idTL order by ThuTu";
 $kq=mysql_query($sl);
 $idLT=0;
 while($d=mysql_fetch_array($kq)){
	 if($idLT==0)$idLT=$d['idLT'];
	  ?>
      <option value="<?php echo $d['idLT'];?>" <?php if(isset($_GET['idLT'])&&$_GET['idLT']==$d['idLT']){ echo "selected='selected'"; $idLT=$_GET['idLT'];}?>><?php echo $d['Ten'];?></option>
 <?php }?>
    </select>
  </p>
</form>
<table width="1000" border="1">
  <tr>
    <td width="40">STT</td>
    <td width="215">Tieu de</td>
    <td width="264">Tom Tat</td>
     <td width="150">Hinh Mo Ta</td>
      <td width="125">Ngay</td>
    <td width="87">Trang Thai</td>
    <td width="73"><a href="tin_them.php">Them</a></td>
  </tr>
<?php 
$sl="select * from tin where idLT=$idLT order by idTin DESC";
$kq=mysql_query($sl);
while($d=mysql_fetch_array($kq)){
?>
  <tr>
    <td>1</td>
    <td><?php echo $d['TieuDe'];?></td>
    <td><?php echo $d['TomTat'];?></td>
    <td><img src="<?php echo $d['urlHinh'];?>" width="150" height="100"/></td>
    <td><?php echo date("d-m-Y h:i:s",strtotime($d['Ngay']));?></td>
    <td><?php if($d['AnHien']) echo "Hien"; else echo "An";?></td>
    <td><a href="#">Xoa </a>/ <a href="#">Sua</a></td>
  </tr>
<?php }?>
</table>
<p>Trang: <a href="#">1</a> &nbsp;</p>
</body>
</html>