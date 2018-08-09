<?php 
	
	require_once "classquantri.php";
	$qt = new quantritin;
	$idTL=-1;
	$pageSize=5;
	$pageNum=$_GET['pageNum'];
	settype ($pageNum,'int');
	if($pageNum<=0) $pageNum=1;
	$totalRow=0;
	
	
	$theloaitin=$qt->ListTheLoaiTin($idTL,$totalRow,$pageNum,$pageSize);

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
<table width="800" border="1" align="center" cellpadding="4" cellspacing="0" id="dsloaitin">
<tr>
    <th colspan="7"  >Danh Sách The Loại Tin</th>
    </tr>

  <tr>
    <th scope="col" >idTL</th>
    <th scope="col">Tên Thể Loại Tin</th>
    <th scope="col">Ẩn Hiện</th>
    <th scope="col">Thứ Tự</th>
    
    <th scope="col">Lang</th>
    <th scope="col">Action</th>
  </tr>
 
  <?php while ($row_theloaitin= mysql_fetch_assoc($theloaitin)) { ob_start();?>
  
  <tr>
    <td height="39" align="center">{idTL}</td>
    <td align="center">{TenTL}</td>
    <td align="center">{AnHien}</td>
    <td align="center">{ThuTu}</td>
    
    <td align="center">{Lang}</td>
    <td align="center"><a href="theloaitin_sua.php?p&idTL={idTL}">Chỉnh </a> |<a href="theloaitin_xoa.php?idTL=<?php echo $row_theloaitin['idTL']?>"> Xóa </a> </td>
    
 
   
  </tr>
  <?php $str = ob_get_clean(); 
		$str = str_replace("{idTL}",$row_theloaitin['idTL'],$str);
		
		$str = str_replace("{TenTL}",$row_theloaitin['TenTL'],$str);
		$str = str_replace("{ThuTu}",$row_theloaitin['ThuTu'],$str);
		$str = str_replace("{AnHien}",($row_theloaitin['AnHien']==1)? "Đang hiện": "Đang ẩn",$str);
		$str = str_replace("{Lang}",($row_theloaitin['lang']=="vi")?"Tiếng Việt":"EngLish",$str);
		echo $str; ?>	

  <?php } ?>
 
 
   <tr >
    <th colspan="7" align="center"  >
    <p id="thanhphantrang">
    <?php echo $qt->pagesLink("theloaitin_xemds.php?",$totalRow,$pageNum,$pageSize)?>
    </p>
    
    </th>
    </tr>

</table>




</form>
</body>
</html>