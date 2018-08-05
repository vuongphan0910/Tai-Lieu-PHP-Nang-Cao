<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
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
      <option value="en" <?php if($lang=='en') echo "selected='selected'";?>>Anh</option>
    </select>
 </p>
 <p>
    <label for="idTL">The loai:</label>
    <select name="idTL" id="idTL" onchange="form1.submit();">
      <?php
  $kq=mysql_query("select * from theloai where lang='$lang' order by ThuTu");
  $idTL=0;
  while($d=mysql_fetch_array($kq)){
	  if($idTL==0) $idTL=$d['idTL'];
  ?>
      <option value="<?php echo $d['idTL'];?>" <?php if(isset($_GET['idTL'])&&$d['idTL']==$_GET['idTL']){ echo "selected='selected'"; $idTL=$_GET['idTL'];}?>><?php echo $d['TenTL'];?></option>
      <?php }?>
    </select>
 </p>
 
</form>
<form action="process.php" method="post" enctype="multipart/form-data" name="form2" id="form2">
 <p>
    <label for="idLT">Loai tin:</label>
    <select name="idLT" id="idLT" >
    <?php
	$kqlt=mysql_query("select * from loaitin where idTL=$idTL order by ThuTu");
	
	while($dlt=mysql_fetch_array($kqlt)){
		?>  
      <option value="<?php echo $dlt['idLT'];?>"><?php echo $dlt['Ten'];?></option>
<?php }?>
    </select>
  </p>
  <p>
    <label for="TieuDe">Tieu de:</label>
    <input type="text" name="TieuDe" id="TieuDe" />
  </p>
  <p>
    <label for="TieuDe_KhongDau">Tieu de KD:</label>
    <input type="text" name="TieuDe_KhongDau" id="TieuDe_KhongDau" />
  </p>
  <p>
    <label for="TomTat">Tom tat:</label><br/>
    <textarea name="TomTat" id="TomTat" cols="45" rows="5"></textarea>
  </p>
  <p>
    <label for="ufile">Chon hinh:</label>
    <input type="file" name="ufile" id="ufile" />
  </p>
  <p>
    <label for="idSK">Su kien:</label>
    <select name="idSK" id="idSK">
    <?php
	$kqsk=mysql_query("select * from sukien where lang='$lang' order by ThuTu");
	while($dsk=mysql_fetch_array($kqsk)){
	?>
      <option value="<?php echo $dsk['idSK'];?>"><?php echo $dsk['MoTa'];?></option>
      <?php }?>
    </select>
  </p>
  <p>
    <label for="Content">Noi dung:</label>
    <textarea name="Content" id="Content" cols="45" rows="5" class="ckeditor"></textarea>
  </p>
  <p>
    <input type="checkbox" name="TinNoiBat" id="TinNoiBat" />
    <label for="TinNoiBat">Noi bat</label>
  </p>
  <p><label>Trang thai:</label>
    <select name="AnHien">
    <option value="0">An</option>
    <option value="1">Hien</option>
    </select>
  </p>
  <p>
  <input type="hidden" name="lang" value="<?php echo $lang;?>"/>
  <input type="hidden" name="idTL" value="<?php echo $idTL;?>"/>
  <input type="submit" name="themtin" id="themtin" value="Them tin" />
    <br />
  </p>
</form>
</body>
</html>