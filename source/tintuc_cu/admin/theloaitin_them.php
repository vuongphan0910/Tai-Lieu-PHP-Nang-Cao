<?php
session_start();
require_once"classquantri.php";
$qt=new quantritin;

if (isset($_POST['btnOK'])==true) {
	$qt->ThemTheLoaiTin();
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


<form action="" method="post" id="loaitinthem">
	<table width="390" height="418" border="0" align="center"  >
  
  <tr>
    <td height="68" colspan="2" align="center" class="btn">Thêm Thể Loại Tin</td>
    </tr>
  <tr>
    <td width="138">Tên Thể Loại Tin :</td>
    <td width="240"><label for="T"></label>
      <input type="text" name="TenTL" id="themlt" class="txtadmin" /></td>
  </tr>
  <tr>
    <td>Thứ Tự :</td>
    <td><label for="ThuTu"></label>
      <input type="text" name="ThuTu" id="txtthutu" class="txtadmin"/></td>
  </tr>
  <tr>
    <td>Lang :</td>
    <td><label for="lang"></label>
      <select name="lang" id="lang" class="txtadmin" >
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
    <td colspan="2" align="center" class="btn"><input type="submit" name="btnOK" id="btnOK" value="OK" /></td>
  </tr>
</table>




</form>
</body>
</html>