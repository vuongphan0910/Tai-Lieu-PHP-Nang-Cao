<?php
session_start();
require_once"classquantri.php";
$qt=new quantritin;
$idLT=$_GET['idLT'];
settype($idLT,"int");
$loaitin=$qt->chitietloaitin($idLT);
$row_loaitin=mysql_fetch_assoc($loaitin);

if (isset($_POST['btnOK'])==true) {
	$qt->CapNhatLoaiTin($idLT);
	header("location:main.php?p=loaitin_xemds");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="../css/style.css" rel="stylesheet" type="text/css" />
</head>

<body>


<form action="" method="post">
	<table width="491" height="445"  align="center" cellspacing="0" id="tblsualoaitin">
  
  <tr>
    <td colspan="2" align="center" class="btn">Sửa Loại Tin</td>
    </tr>
  <tr>
    <td width="135" align="center">Tên Loại Tin</td>
    <td width="298"><label for="Ten"></label>
      <input type="text" name="Ten" id="themlt" value="<?=$row_loaitin['Ten']; ?>"/></td>
  </tr>
  <tr>
    <td align="center">Thứ Tự</td>
    <td><label for="ThuTu"></label>
      <input type="text" name="ThuTu" id="txtthutu" value="<?=$row_loaitin['ThuTu']; ?>" /></td>
  </tr>
  <tr >
    <td align="center" >Lang</td>
    <td><label for="lang"></label>
      <select name="lang" id="lang">
        <option value="vi"  <?php if($row_loaitin['lang']=='vi') echo "selected";?> >Tiếng Việt</option>
        <option value="en" <?php if($row_loaitin['lang']=='en') echo "selected";?>>Tiếng Anh</option>
      </select></td>
  </tr>
  <tr>
    <td align="center">Ẩn Hiện </td>
    <td><label> 
          <input type="radio" name="AnHien" value="0" id="AnHien_0" <?php echo ($row_loaitin['AnHien']==0)? "checked=checked":""; ?> />Ẩn</label>
        <label>
          <input type="radio" name="AnHien" value="1" id="AnHien_1" <?php echo ($row_loaitin['AnHien']==1)? "checked=checked":""; ?> />
          Hiện</label>
    </tr>
  <tr>
    <td align="center">Thể Loại</td>
    <td><label for="slTheLoai"></label>
      <select name="idTL" id="idTL"> <?php $theloai = $qt->TheLoai('',-1);	?>
      <option value="0">Chọn Thể Loại</option>
		<?php while($r = mysql_fetch_assoc($theloai)){	?>
        <option value="<?php echo $r['idTL'];?>" <?php if($r['idTL']==$row_loaitin['idTL']) echo "selected=selected";?>> <?=$r['TenTL'];?> </option>
        <?php } ?>
        
        
      </select></td>
  </tr>
  <tr>
    <td height="68" colspan="2" align="center" class="btn"><input type="submit" name="btnOK" id="btnOK" value="Sửa Loại Tin" /></td>
    </tr>
</table>




</form>
</body>
</html>