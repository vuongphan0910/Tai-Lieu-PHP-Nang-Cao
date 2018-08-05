<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>The loai</title>
</head>

<body>
<?php
include("../connect.php");
if(isset($_GET['lang'])) $lang=$_GET['lang'];
else $lang='vi';
?>
<form id="form1" name="form1" method="get" action="">
  <label for="lang">Ngon ngu:</label>
  <select name="lang" id="lang" onchange="form1.submit();">
    <option value="vi">Viet</option>
    <option value="en" <?php if($lang=='en') echo "selected='selected'";?>>English</option>
  </select>
</form>
<br />
<table width="700" border="1" cellspacing="0" cellpadding="0">
  <tr>
    <th width="51" scope="col">STT</th>
    <th width="207" scope="col">Ten TL</th>
    <th width="220" scope="col">Ten Khong Dau</th>
    <th width="112" scope="col">Trang Thai</th>
    <th width="100" scope="col"><a href="theloai_them.php?lang=<?php echo $lang;?>">Them</a></th>
  </tr>
  <?php
  $sl="select * from theloai where lang='$lang' order by ThuTu";
  $kq=mysql_query($sl);
  while($d=mysql_fetch_array($kq))
  {
  ?>
  <tr>
    <td><?php echo $d['ThuTu'];?></td>
    <td><?php echo $d['TenTL'];?></td>
    <td><?php echo $d['TenTL_KhongDau'];?></td>
    <td><?php if($d['AnHien']) echo "Hien"; else echo "An";?></td>
    <td> Xoa / <a href="theloai_sua.php?idTL=<?php echo $d['idTL'];?>">Sua</a></td>
  </tr>
  <?php }?>
</table>
</body>
</html>