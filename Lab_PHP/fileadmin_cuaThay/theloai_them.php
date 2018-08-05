<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
if(isset($_GET['lang'])) $lang=$_GET['lang'];
else $lang='vi';
?>
<form id="form1" name="form1" method="post" action="process.php">
  <p>
    <label for="lang">Ngon ngu:</label>
    <select name="lang" id="lang">
      <option value="vi">Viet</option>
      <option value="en" <?php if($lang=='en') echo "selected='selected'";?>>English</option>
    </select>
  </p>
  <p>
    <label for="TenTL">Ten TL:</label>
    <input type="text" name="TenTL" id="TenTL" />
  </p>
  <p>
    <label for="TenTL_KhongDau">Ten KD:</label>
    <input type="text" name="TenTL_KhongDau" id="TenTL_KhongDau" />
  </p>
  <p>
    <label for="ThuTu">Thu tu:</label>
    <input name="ThuTu" type="text" id="ThuTu" size="10" />
  </p>
  <p>
    <label for="AnHien">Trang Thai:</label>
    <select name="AnHien" id="AnHien">
      <option value="0">An</option>
      <option value="1">Hien</option>
    </select>
  </p>
  <p>
    <input type="submit" name="themtl" id="themtl" value="Them" />
  </p>
</form>
</body>
</html>