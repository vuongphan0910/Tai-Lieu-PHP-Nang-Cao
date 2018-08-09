<?php
	require_once "classquantri.php";
	$qt = new quantritin;
	$idTL=$_GET['idTL'];
	settype($idTL,"int");
	$idLT=$_GET['idLT'];
	settype($idLT,"int");
	$lang=$_GET['lang'];
	if(get_magic_quotes_gpc()==false) $lang = mysql_real_escape_string($lang);
	$pageSize=5;
	$pageNum=$_GET['pageNum'];
	settype ($pageNum,'int');
	if($pageNum<=0) $pageNum=1;
	$totalRow=0;
	$tin=$qt->ListTin($idTL,$idLT,$lang,$totalRow,$pageNum,$pageSize);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" type="text/css" href="../css/style.css"/>

</head>

<body>
<form id="form1" name="form1" method="get" action="">
<h2>Danh Sách Tin Tức</h2> 
<table id="rounded-corner" >
    <thead>
    <tr><th colspan="6" align="center" class="rounded-q4" scope="col"><label for="idTL"></label>
        <select name="idTL" id="idTL">
        
        <?php $theloai=$qt->TheLoai('',-1);?><option value="-1">Chọn Thể Loại</option>
	<?php while ($row_theloai=mysql_fetch_assoc($theloai)){?>
    <option value="<?=$row_theloai['idTL']; ?>"><?=$row_theloai['TenTL'] ?></option>
    <?php }?>
        
        </select>
        <select name="idLT" id="idLT">
        <?php $loaitin=$qt->LoaiTin('',-1);?>
        <option value="-1">Chọn Loại Tin</option>
        <?php while($row_loaitin=mysql_fetch_assoc($loaitin)){?>
        <option value="<?=$row_loaitin['idLT'] ?>"><?=$row_loaitin['Ten']?></option>
        <?php }?>
        </select>
        
      
        
        <select name="lang" id="lang">
          <option value=''>Chọn Ngôn Ngữ/Language</option>
        <option value='vi'>Tiếng Việt</option>
        <option value='en'>EngLish</option>
      </select>
        <input type="submit" name="button" id="button" value="Tìm" /></th>
      </tr>
   	  <tr>
        	
            <th width="164" class="rounded" scope="col">ID Tin,Ngày,Số Lan Xemt</th>
          <th width="202" class="rounded" scope="col">Tiêu Đề,Tóm Tắt</th>
          <th width="36" class="rounded" scope="col">Ẩn Hiện</th>
            <th width="36" class="rounded" scope="col">Nổi Bật</th>
            <th width="27" class="rounded" scope="col">Edit</th>
            <th width="45" class="rounded" scope="col">Delete</th>
        </tr>
    </thead>
        <tfoot>
    	<tr>
        	<td colspan="6" class="rounded-foot-left"><div class="pagination">
        <?=$qt->pagesList("main.php?p=tintuc_loc",$totalRow,$pageNum,$pageSize,3) ?>
        </div> </td>
        	<!--<td width="45" class="rounded-foot-right">&nbsp;</td>-->

        </tr>
    </tfoot>
    <tbody>
    <?php while ($row_tin=mysql_fetch_assoc($tin)) { ob_start();?>
    	<tr>
        	
            <td><p>idTin: {idTin}</p>
            <p>Ngày:{Ngay}</p>
            <p>Số Lần Xem:{SoLanXem}</p></td>
            <td class="tin"><p>{TieuDe}<span>({TenTL}/{Ten})</span></p>
            <p>{TomTat}</p></td>
            <td  align="center"><img src="img/AnHien_{AnHien}.jpg" class="anhien" idTin="{idTin}" title="{title_anhien}" /> 	</td>
            <td  align="center"><img src="img/NoiBat_{NoiBat}.jpg" class="noibat" idTin="{idTin}" title="{title_noibat}" /></td>

            <td  align="center"><a href="main.php?p=tintuc_chinh&idTin={idTin}"><img src="images/user_edit.png" alt="" title="" border="0" /></a></td>
            <td  align="center"><a href="tintuc_xoa.php?idTin={idTin}" class="ask"><img src="images/trash.png" alt="" title="" border="0" /></a></td>
        </tr>
        
    	 <?php 
		$str = ob_get_clean();
		$str =str_replace("{idTin}",$row_tin['idTin'],$str);
		$str =str_replace("{Ngay}",date('d/m/Y',strtotime($row_tin['Ngay'])) , $str);
		$str =str_replace("{SoLanXem}",$row_tin['SoLanXem'],$str);
		$str =str_replace("{TieuDe}",$row_tin['TieuDe'],$str);
		$str =str_replace("{TenTL}",$row_tin['TenTL'],$str);
		$str =str_replace("{Ten}",$row_tin['Ten'],$str);
		$str =str_replace("{TomTat}",$row_tin['TomTat'],$str);
		$str =str_replace("{NoiBat}",$row_tin['TinNoiBat'],$str);
		$str =str_replace("{AnHien}",$row_tin['AnHien'],$str);
		$str =str_replace("{title_anhien}",($row_tin['AnHien']==0)?"Nhap Vao De Hien Tin":"Nhap Vao De An Tin",$str);
		$str =str_replace("{title_noibat}",($row_tin['TinNoiBat']==0)?"Nhap Vao De Hien Tin Noi Bat":"Nhap Vao De Tin Binh Thuong",$str);
		echo $str;
	
	?>
    
    <?php } ?>
        
    </tbody>
</table>

</form>
</body>
</html>