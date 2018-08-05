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
<form id="form1" name="form1" method="get" action="">
  <p>
    <label for="lang">Ngon ngu:</label>
    <select name="lang" id="lang" onchange="form1.submit()">
      <option value="vi">Viet</option>
      <option value="en" <?php if($lang=='en') echo "selected='selected'";?>>English</option>
    </select>
  </p>
  </form>
  
 <form id="form2" name="form2" method="post" action="process.php"> 
  <p>
    <label for="idTL">The loai:</label>
    <select name="idTL" id="idTL">
    <?php
  include("../connect.php");
  $sl="select * from theloai where lang='$lang' order by ThuTu";
  $kq=mysql_query($sl);
 
  while($d=mysql_fetch_array($kq))
  {
	  
  ?>
      <option value="<?php echo $d['idTL'];?>" <?php if(isset($_GET['idTL'])&&$_GET['idTL']==$d['idTL']) echo "selected='selected'";?>><?php echo $d['TenTL'];?></option>
   <?php }?>
    </select>
  </p>
  <p>
    <label for="Ten">Ten loai:</label>
    <input type="text" name="Ten" id="Ten" />
  </p>
  <p>
    <label for="Ten_KhongDau">Ten KD:</label>
    <input type="text" name="Ten_KhongDau" id="Ten_KhongDau" />
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
  <input type="hidden" name="lang" value="<?php echo $lang;?>"/>
    <input type="submit" name="themloai" id="themloai" value="Them" />
  </p>
</form>
</body>
</html>