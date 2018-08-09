<?php 
require_once "classquantri.php";
$q = new quantritin;

$idTL=-1;
if (isset($_GET['idTL'])==true) $idTL=$_GET['idTL'];
settype($idTL,"int");
$idLT=-1;
if (isset($_GET['idLT'])==true) $idTL=$_GET['idLT'];
settype($idLT,"int");
$lang='';
if (isset($_GET['lang'])==true) $lang=$_GET['lang'];
if(get_magic_quotes_gpc()==false) $lang = mysql_real_escape_string($lang);
$pageSize=4;
	$pageNum=$_GET['pageNum'];
	settype ($pageNum,'int');
	if($pageNum<=0) $pageNum=1;
	$totalRow=0;
$tin = $q->ListTin($idTL,$idLT,$lang,$totalRow,$pageNum,$pageSize);


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<script type="text/javascript" >
$(document).ready(function(e) {
    $("#dstin tr").mouseover(function(){ $(this).addClass("hightlight");  });
$("#dstin tr").mouseout(function(){  $(this).removeClass("hightlight"); });

	

});
$(document).ready(function(e) {
    $("img.anhien").click(function() {
        idTin = $(this).attr("idTin");
		obj = this;
		$.ajax({
			url:'tintuc_anhien.php',
			data:'idTin='+ idTin,
			cache: false,
			success: function(data){
					obj.src=data;
					if(data=="img/AnHien_1.jpg") {
					obj.title="Nhap Vao De An Tin";}
					else obj.title="Nhap Vao De Hien Tin";
				}
		});
    });
});
</script>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>



</head>

<body>
<form action="" method="post">
<table width="817" align="center" cellpadding="4" cellspacing="0"  border="1" id="dstin" >
<tr >
    <th colspan="3"  >Danh Sách Tin</th>
    </tr>
	<tr>
    	<th width="181" align="center">IDTin,Ngày</td>
        <th width="457" align="center">Tiêu Đề,Tóm Tắt</td>
        <th width="130" align="center">AcTion</td>
    
    </tr>
<?php while ($row_tin=mysql_fetch_assoc($tin)) { ob_start();?>

<tr  >
    	<td height="83" >idTin: {idTin} <br/>
        	Ngày: {Ngay} <br/> Số Lần Xem : {SoLanXem}
        </td>
        <td class="tin"><p>{TieuDe} <span>({TenTL}/{Ten})</span></p>
                <p >{TomTat}</p></td>
        <td align="center"><a href="main.php?p=tintuc_chinh&idTin={idTin}">Chỉnh</a> | Xem | <br/>  <a onclick="return confirm('Bạn Có Muốn Xóa Tin Này');" href="tintuc_xoa.php?idTin={idTin}">Xóa</a> 
        	<br/><img src="img/AnHien_{AnHien}.jpg" class="anhien" idTin="{idTin}" />
            <img src="img/NoiBat_{TinNoiBat}.jpg" />
        </td>
    
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
		$str =str_replace("{TinNoiBat}",$row_tin['TinNoiBat'],$str);
		$str =str_replace("{AnHien}",$row_tin['AnHien'],$str);
		echo $str;
	
	?>
    
    <?php } ?>
      <th colspan="3" align="center" >
      	
      	<p id="thanhphantrang">
    <?php echo $q->pagesList("main.php?p=tintuc_xemds",$totalRow,$pageNum,$pageSize,3)?>
    </p>
      
      </th>

</table>



</form>


</body>
</html>