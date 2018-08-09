<?php 
	
	require_once "classquantri.php";
	$qt = new quantritin;
	$idTL=-1;
	$pageSize=7;
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
<script type="text/javascript" >
$(document).ready(function(e) {
    $("#dsloaitin tr").mouseover(function(){ $(this).addClass("hightlight");  });
$("#dsloaitin tr").mouseout(function(){  $(this).removeClass("hightlight"); });

});
</script>
</head>

<body>
<form action="" method="post">
<table width="824" height="217" border="1" align="center" cellpadding="4" cellspacing="0" id="dsloaitin">
<tr>
    <th colspan="9"  >Danh Sách The Loại Tin</th>
    </tr>

  <tr>
    <th scope="col" >idTL</th>
    <th scope="col">Tên Thể Loại Tin</th>
    <th scope="col">Ẩn Hiện</th>
    <th scope="col">Thứ Tự</th>
    
    <th scope="col">Lang</th>
   <th scope="col">So LT</th>
    <th scope="col">Chỉnh</th>
    <th scope="col">Xóa</th>
  </tr>
 
  <?php while ($row_theloaitin= mysql_fetch_assoc($theloaitin)) { ob_start();?>
  
  <tr>
    <td height="40" align="center">{idTL}</td>
    <td align="center">{TenTL}</td>
    <td align="center">{AnHien}</td>
    <td align="center">{ThuTu}</td>
    
    <td align="center">{Lang}</td>
    <td align="center">{SoLT}</td>
    <td align="center"><a href="main.php?p=theloaitin_sua&idTL={idTL}"><img src="img/edit.png" /> </a> </td>
  	<td align="center"><a href="theloaitin_xoa.php?idTL={idTL}"> <img src="img/delete.png" /> </a></td>

 	
   
  </tr>
  <?php $str = ob_get_clean(); 
		$str = str_replace("{idTL}",$row_theloaitin['idTL'],$str);
		
		$str = str_replace("{TenTL}",$row_theloaitin['TenTL'],$str);
		$str = str_replace("{ThuTu}",$row_theloaitin['ThuTu'],$str);
		$str = str_replace("{SoLT}",$qt->DemLoaiTinTrongTheLoai($row_theloaitin['idTL']) , $str);
		$str = str_replace("{AnHien}",($row_theloaitin['AnHien']==1)? "Đang hiện": "Đang ẩn",$str);
		$str = str_replace("{Lang}",($row_theloaitin['lang']=="vi")?"Tiếng Việt":"EngLish",$str);
		echo $str; ?>	

  <?php } ?>
 
 
   <tr >
    <th colspan="8" align="center"  >
    <p id="thanhphantrang">
    <?php echo $qt->pagesList("main.php?p=theloaitin_xemds",$totalRow,$pageNum,$pageSize,3)?>
    </p>
    
    </th>
    </tr>

</table>




</form>
</body>
</html>