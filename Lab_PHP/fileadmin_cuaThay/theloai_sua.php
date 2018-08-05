<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
if(isset($_GET['idTL']))
{
	$idTL=$_GET['idTL'];
	include("../connect.php");
	$sl="select * from theloai where idTL=$idTL";
	$kq=mysql_query($sl);
	$d=mysql_fetch_array($kq);

?>
<form id="form1" name="form1" method="post" action="process.php">
  <p>
    <label for="lang">Ngon ngu:</label>
    <select name="lang" id="lang">
      <option value="vi">Viet</option>
      <option value="en" <?php if($d['lang']=='en') echo "selected='selected'";?>>English</option>
    </select>
  </p>
  <p>
    <label for="TenTL">Ten TL:</label>
    <input type="text" name="TenTL" id="TenTL" value="<?php echo $d['TenTL'];?>" />
  </p>
  <p>
    <label for="TenTL_KhongDau">Ten KD:</label>
    <input type="text" name="TenTL_KhongDau" id="TenTL_KhongDau" value="<?php echo $d['TenTL_KhongDau'];?>"  />
  </p>
  <p>
    <label for="ThuTu">Thu tu:</label>
    <input name="ThuTu" type="text" id="ThuTu" size="10" value="<?php echo $d['ThuTu'];?>"  />
  </p>
  <p>
    <label for="AnHien">Trang Thai:</label>
    <select name="AnHien" id="AnHien">
      <option value="0">An</option>
      <option value="1" <?php if($d['AnHien']) echo "selected='selected'";?>>Hien</option>
    </select>
  </p>
  <p>
  <input type="hidden" name="idTL" value="<?php echo $d['idTL'];?>"/>
    <input type="submit" name="suatl" id="suatl" value="Cap nhat" />
  </p>
</form>
<?php }?>
</body>
</html>