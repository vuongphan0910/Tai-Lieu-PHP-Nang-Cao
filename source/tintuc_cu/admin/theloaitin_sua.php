<?php
session_start();
require_once"classquantri.php";
$qt=new quantritin;
$idTL=$_GET['idTL'];
settype($idTL,"int");
$theloaitin=$qt->chitiettheloaitin($idTL);
$row_theloaitin=mysql_fetch_assoc($theloaitin);

if (isset($_POST['btnOK'])==true) {
	$qt->CapNhatTheLoaiTin($idTL);
	header("location:main.php?p=theloaitin_xemds");
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
	<table width="447" height="240" border="1" align="center" id="suatheloaitin" >
  
  <tr>
    <th colspan="2" align="center" >Sửa Thể Loại Tin</th>
    </tr>
  <tr>
    <td width="97">Tên Loại Tin</td>
    <td width="334"><label for="TenTL"></label>
      <input type="text" name="TenTL" id="themlt" value="<?=$row_theloaitin['TenTL']; ?>"/></td>
  </tr>
  <tr>
    <td>Thứ Tự</td>
    <td><label for="ThuTu"></label>
      <input type="text" name="ThuTu" id="txtthutu" value="<?=$row_theloaitin['ThuTu']; ?>" /></td>
  </tr>
  <tr>
    <td>Lang</td>
    <td><label for="lang"></label>
      <select name="lang" id="lang">
        <option value="vi"  <?php if($row_theloaitin['lang']=='vi') echo "selected";?> >Tiếng Việt</option>
        <option value="en" <?php if($row_theloaitin['lang']=='en') echo "selected";?>>Tiếng Anh</option>
      </select></td>
  </tr>
  <tr>
    <td>Ẩn Hiện </td>
    <td><label> 
          <input type="radio" name="AnHien" value="0" id="AnHien_0" <?php echo ($row_theloaitin['AnHien']==0)? "checked=checked":""; ?> />Ẩn</label>
        <label>
          <input type="radio" name="AnHien" value="1" id="AnHien_1" <?php echo ($row_theloaitin['AnHien']==1)? "checked=checked":""; ?> />
          Hiện</label>
  </tr>
  <tr>
    <td colspan="2" align="center" class="btn"><input type="submit" name="btnOK" id="btnOK" value="Sửa Thể Loại Tin" /></td>
  </tr>
</table>




</form>
</body>
</html>