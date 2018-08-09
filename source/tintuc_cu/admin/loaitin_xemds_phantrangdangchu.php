<?php 
	
	require_once "classquantri.php";
	$qt = new quantritin;
	$idTL=-1;
	$pageSize=5;
	$pageNum=$_GET['pageNum'];
	settype ($pageNum,'int');
	if($pageNum<=0) $pageNum=1;
	$totalRow=0;
	
	
	$loaitin=$qt->ListLoaitTin($idTL,$totalRow,$pageNum,$pageSize);

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
    <th colspan="7"  >Danh Sách Loại Tin</th>
    </tr>

  <tr>
    <th scope="col"  >idLT</th>
    <th scope="col">Tên Loại Tin</th>
    <th scope="col">Ẩn Hiện</th>
    <th scope="col">Thứ Tự</th>
    <th scope="col">Thể Loại</th>
    <th scope="col">Lang</th>
    <th scope="col">Action</th>
  </tr>
 
  <?php while ($row_loaitin= mysql_fetch_assoc($loaitin)) { ob_start();?>
  
  <tr>
    <td height="39" align="center">{idLT}</td>
    <td align="center">{Ten}</td>
    <td align="center">{AnHien}</td>
    <td align="center">{ThuTu}</td>
    <td align="center">{TenTL}</td>
    <td align="center">{Lang}</td>
    <td align="center"><a href="loaitin_sua.php?idLT=<?php echo $row_loaitin['idLT']?>">Chỉnh </a> |<a href="loaitin_xoa.php?idLT=<?php echo $row_loaitin['idLT']?>"> Xóa </a> </td>
    
 
   
  </tr>
  <?php $str = ob_get_clean(); 
		$str = str_replace("{idLT}",$row_loaitin['idLT'],$str);
		$str = str_replace("{Ten}",$row_loaitin['Ten'],$str);
		$str = str_replace("{TenTL}",$row_loaitin['TenTL'],$str);
		$str = str_replace("{ThuTu}",$row_loaitin['ThuTu'],$str);
		$str = str_replace("{AnHien}",($row_loaitin['AnHien']==1)? "Đang hiện": "Đang ẩn",$str);
		$str = str_replace("{Lang}",($row_loaitin['lang']=="vi")?"Tiếng Việt":"EngLish",$str);
		echo $str; ?>	

  <?php } ?>
 
 
   <tr>
    <th colspan="7" align="center" >
    <p id="thanhphantrang">
    <?php echo $qt->pagesLink("main.php?p=loaitin_xemds",$totalRow,$pageNum,$pageSize)?>
    </p>
    
    </th>
    </tr>

</table>




</form>
</body>
</html>