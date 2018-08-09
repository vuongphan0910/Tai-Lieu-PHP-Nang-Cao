<?php
session_start();
require_once"classquantri.php";
$qt=new quantritin;

if (isset($_POST['btnOK'])==true) {
	$qt->ThemLoaiTin($loi);
	header("location:main.php?p=loaitin_xemds");
	
	
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="../css/style.css" rel="stylesheet" type="text/css" />
<script>
$(document).ready(function(e) {
    $("#Ten").blur(function(){
		var ten=$("#Ten").val();
		
	});
});
</script>
</head>

<body>


<form action="" method="post" id="loaitinthem">
	<table width="392" height="418" border="0" align="center" >
  
  <tr>
    <td colspan="2" align="center" class="btn"><p>Thêm Loại Tin</td>
    </tr>
<!--<tr><?php //if ($loi!=null) echo $loi;?></tr>-->
 
  <tr>
    <td width="146">Thêm Loại Tin :</td>
    <td width="289"><label for="T"></label>
      <input type="text" name="Ten" id="Ten" class="txtadmin"/></td>
  </tr>
  <tr>
    <td>Thứ Tự :</td>
    <td><label for="ThuTu"></label>
      <input type="text" name="ThuTu" id="txtthutu" class="txtadmin" /></td>
  </tr>
  <tr>
    <td>Lang :</td>
    <td><label for="lang"></label>
      <select name="lang" id="lang" class="txtadmin">
        <option value="vi">Tiếng Việt</option>
        <option value="en">Tiếng Anh</option>
      </select></td>
  </tr>
  <tr>
    <td>Ẩn Hiện :</td>
    <td><label> 
          <input type="radio" name="AnHien" value="0" id="AnHien_0" />Ẩn</label>
        <label>
          <input type="radio" name="AnHien" value="1" id="AnHien_1" />
          Hiện</label>
  </tr>
  <tr>
    <td>Thể Loại :</td>
    <td><label for="slTheLoai" ></label>
      <select name="idTL" id="idTL" class="txtadmin"> <?php $theloai = $qt->TheLoai('',-1);	?>
      <option value="0">Chọn Thể Loại</option>
		<?php while($r = mysql_fetch_assoc($theloai)){	?>
        <option value="<?=$r['idTL'];?>"> <?=$r['TenTL'];?> </option>
        <?php } ?>
        
        
      </select></td>
  </tr>
  <tr>
    <td colspan="2" align="center" class="btn"><input type="submit" name="btnOK" id="btnOK" value="OK" /></td>
    </tr>
</table>
</form>
</body>
</html>