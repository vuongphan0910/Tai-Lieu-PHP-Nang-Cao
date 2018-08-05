<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Loai tin</title>
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
    <select name="lang" id="lang" onchange="form1.submit();">
      <option value="vi">Viet</option>
      <option value="en" <?php if($lang=='en') echo "selected='selected'";?>>English</option>
    </select>
  </p>
  <p>
    <label for="idTL">The loai:</label>
    <select name="idTL" id="idTL" onchange="form1.submit();">
    <?php
  $sl="select * from theloai where lang='$lang' order by ThuTu";
  $kq=mysql_query($sl);
  $idTL=0;
  while($d=mysql_fetch_array($kq))
  {
	  if($idTL==0)$idTL=$d['idTL'];
  ?>
      <option value="<?php echo $d['idTL'];?>" <?php if(isset($_GET['idTL'])&&$_GET['idTL']==$d['idTL']){ echo "selected='selected'";$idTL=$_GET['idTL'];}?>><?php echo $d['TenTL'];?></option>
   <?php }?>
    </select>
  </p>
</form>
<br />
<table width="700" border="1" cellspacing="0" cellpadding="0">
  <tr>
    <th width="51" scope="col">STT</th>
    <th width="207" scope="col">Ten Loai</th>
    <th width="220" scope="col">Ten Khong Dau</th>
    <th width="112" scope="col">Trang Thai</th>
    <th width="100" scope="col"><a href="#">Them</a></th>
  </tr>

<?php
$sl_loai="select * from loaitin where idTL=$idTL";
$kq_loai=mysql_query($sl_loai);
while($d_loai=mysql_fetch_array($kq_loai)){
?>  
  <tr>
    <td><?php echo $d_loai['ThuTu'];?></td>
    <td><?php echo $d_loai['Ten'];?></td>
    <td><?php echo $d_loai['Ten_KhongDau'];?></td>
    <td><?php if($d_loai['AnHien']) echo "Hien";else echo "An";?></td>
    <td> <a href="#" onclick="return confirm('Ban chac chan xoa khong?');">Xoa</a> / <a href="#">Sua</a></td>
  </tr>
<?php }?> 
</table>
</body>
</html>