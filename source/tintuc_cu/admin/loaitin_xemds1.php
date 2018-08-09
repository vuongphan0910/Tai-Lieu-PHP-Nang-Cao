<?php 
	session_start();
	
	require_once "classquantri.php";
	$qt = new quantritin;
	$qt->CheckLogin();
	$idTL=-1;

	$pageSize=8;
	$pageNum=$_GET['pageNum'];
	settype ($pageNum,'int');
	if($pageNum<=0) $pageNum=1;
	$totalRow=0;
	
	
	$loaitin=$qt->ListLoaitTin($idTL,$totalRow,$pageNum,$pageSize);
	
	
	

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<link href="../css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" >
$(document).ready(function(e) {
    $("#dsloaitin tr").mouseover(function(){ $(this).addClass("hightlight");  });
$("#dsloaitin tr").mouseout(function(){  $(this).removeClass("hightlight"); });

});
</script>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>

</head>

<body>
<form action="" method="post">
<table width="828" border="1" align="center" cellpadding="4" cellspacing="0" id="dsloaitin">

<tr>
    <th colspan="9"  >Danh Sách Loại Tin</th>
    </tr>

  <tr>
    <th scope="col"  >idLT</th>
    <th scope="col">Tên Loại Tin</th>
    <th scope="col">Ẩn Hiện</th>
    <th scope="col">Thứ Tự</th>
    <th scope="col">Thể Loại</th>
    <th scope="col">Lang</th>
     <th scope="col">Số Tin</th>
      <th scope="col">Chỉnh</th>
    <th scope="col">Xóa</th>
    
  </tr>
 
  <?php while ($row_loaitin= mysql_fetch_assoc($loaitin)) { ob_start();?>
  
  <tr>
    <td height="36" align="center">{idLT}</td>
    <td align="center" >{Ten}</td>
    <td align="center">{AnHien}</td>
    <td align="center">{ThuTu}</td>
    <td align="center">{TenTL}</td>
    <td align="center">{Lang}</td>
    <td align="center">{SoTin}</td>
    <td align="center"><a href="main.php?p=loaitin_sua&idLT={idLT}"><img src="img/edit.png"  />  </td>
     <td align="center"><a href="loaitin_xoa.php?idLT={idLT}"> <img src="img/delete.png" /> </a></td>
    
    
 
   
  </tr>
  <?php $str = ob_get_clean(); 
		$str = str_replace("{idLT}",$row_loaitin['idLT'],$str);
		$str = str_replace("{Ten}",$row_loaitin['Ten'],$str);
		$str = str_replace("{TenTL}",$row_loaitin['TenTL'],$str);
		$str = str_replace("{ThuTu}",$row_loaitin['ThuTu'],$str);
		
		$str = str_replace("{AnHien}",($row_loaitin['AnHien']==1)? "Đang hiện": "Đang ẩn",$str);
		$str = str_replace("{Lang}",($row_loaitin['lang']=="vi")?"Tiếng Việt":"EngLish",$str);
		$str = str_replace("{SoTin}",$qt->DemTinTrongLoaiTin($row_loaitin['idLT']),$str);
		echo $str; ?>	

  <?php } ?>
 
 
   <tr>
    <th colspan="9" align="center" >
    <p id="thanhphantrang">
    <?php echo $qt->pagesList("main.php?p=loaitin_xemds",$totalRow,$pageNum,$pageSize,3)?>
    </p>
    
    </th>
    </tr>

</table>




</form>
</body>
</html>