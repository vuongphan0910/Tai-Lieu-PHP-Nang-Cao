<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php

if(isset($_GET['idLT']))
{
  include("../connect.php");
  $idLT=$_GET['idLT'];
  $kqlt=mysql_query("select * from loaitin where idLT=$idLT");
  $dlt=mysql_fetch_array($kqlt);
  
  if(isset($_GET['lang'])) $lang=$_GET['lang'];
  else $lang=$dlt['lang'];
?>
<form id="form1" name="form1" method="get" action="">
  <p>
    <label for="lang">Ngon ngu:</label>
    <select name="lang" id="lang" onchange="form1.submit()">
      <option value="vi">Viet</option>
      <option value="en" <?php if($lang=='en') echo "selected='selected'";?>>English</option>
    </select>
  </p>
  <input type="hidden" name="idLT" value="<?php echo $idLT;?>"/>
  </form>
  
 <form id="form2" name="form2" method="post" action="process.php"> 
  <p>
    <label for="idTL">The loai:</label>
    <select name="idTL" id="idTL">
    <?php

  $sl="select * from theloai where lang='$lang' order by ThuTu";
  $kq=mysql_query($sl);
 
  while($d=mysql_fetch_array($kq))
  {
	  
  ?>
      <option value="<?php echo $d['idTL'];?>" <?php if($dlt['idTL']==$d['idTL']) echo "selected='selected'";?>><?php echo $d['TenTL'];?></option>
   <?php }?>
    </select>
  </p>
  <p>
    <label for="Ten">Ten loai:</label>
    <input type="text" name="Ten" id="Ten" value="<?php echo $dlt['Ten'];?>" />
  </p>
  <p>
    <label for="Ten_KhongDau">Ten KD:</label>
    <input type="text" name="Ten_KhongDau" id="Ten_KhongDau" value="<?php echo $dlt['Ten_KhongDau'];?>" />
  </p>
  <p>
    <label for="ThuTu">Thu tu:</label>
    <input name="ThuTu" type="text" id="ThuTu" size="10" value="<?php echo $dlt['ThuTu'];?>" />
  </p>
  <p>
    <label for="AnHien">Trang Thai:</label>
    <select name="AnHien" id="AnHien">
      <option value="0">An</option>
      <option value="1" <?php if($dlt['AnHien']) echo "selected='selected'";?>>Hien</option>
    </select>
  </p>
  <p>
  <input type="hidden" name="lang" value="<?php echo $lang;?>"/>
  <input type="hidden" name="idLT" value="<?php echo $idLT;?>" />
    <input type="submit" name="sualoai" id="sualoai" value="Cap nhat" />
  </p>
</form>

<?php } //isset GET['idLT']?>
</body>
</html>