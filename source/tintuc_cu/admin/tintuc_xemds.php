<?php 
require_once "classquantri.php";
$q = new quantritin;
$q->CheckLogin();
$idTL=-1;
if (isset($_GET['idTL'])==true) $idTL=$_GET['idTL'];
settype($idTL,"int");
$idLT=-1;
if (isset($_GET['idLT'])==true) $idLT=$_GET['idLT'];
settype($idLT,"int");
$lang='';
if (isset($_GET['lang'])==true) $lang=$_GET['lang'];
if(get_magic_quotes_gpc()==false) $lang = mysql_real_escape_string($lang);
$pageSize=5;
	$pageNum=$_GET['pageNum'];
	settype ($pageNum,'int');
	if($pageNum<=0) $pageNum=1;
	$totalRow=0;
$tin = $q->ListTin($idTL,$idLT,$lang,$totalRow,$pageNum,$pageSize);


?>
<script type="text/javascript" >
$(document).ready(function(e) {
    $("#dstin tr").mouseover(function(){ $(this).addClass("hightlight");  });
$("#dstin tr").mouseout(function(){  $(this).removeClass("hightlight"); });

	

});
$(document).ready(function(e) {
		$("#idTL").change(function(){
			var idTL=$(this).val();
			$("#idLT").load("tintuc_layloaitin.php?idTL="+ idTL);
		});
		
		
    $("img.anhien").click(function() {
        idTin = $(this).attr("idTin");
		obj = this;
		$.ajax({
			url:'tintuc_anhien.php',
			data:'idTin='+ idTin,
			cache: false,
			success: function(data){
					obj.src=data;
					
					if(data.trim().toString()=="img/AnHien_1.jpg") 
					{
						
						obj.title="Nhap Vao De An Tin";
					}
					else obj.title="Nhap Vao De Hien Tin";
				}
		});
    });
	
	 $("img.noibat").click(function() {
        idTin = $(this).attr("idTin");
		obj = this;
		$.ajax({
			url:'tintuc_noibat.php',
			data:'idTin='+ idTin,
			cache: false,
			success: function(data){
					obj.src=data;
					
					if(data.trim().toString()=="img/NoiBat_1.jpg") 
					{
						
						obj.title="Nhap Vao De Hien Tin Binh Thuong";
					}
					else obj.title="Nhap Vao De Hien Tin Noi Bat";
				}
		});
    });
	
	
});
</script>
<form method="get"> <!--action="main.php?p=tintuc_loc"-->
<h2>Danh Sách Tin Tức</h2> 
<table id="rounded-corner" >
    <thead>
    <tr><th colspan="6" align="center" class="rounded-q4" scope="col"><input name="p" type="hidden" id="p" value="tintuc_xemds" /><label for="idTL"></label>
        <select name="idTL" id="idTL">
          <?php $theloai=$qt->TheLoai('',-1);?>
          <option value="-1">Chọn Thể Loại</option>
          <?php while ($row_theloai=mysql_fetch_assoc($theloai)){?>
          <option value="<?=$row_theloai['idTL']; ?>" <?php if($row_theloai['idTL']==$idTL) echo 'selected="selected"'?> >
            <?=$row_theloai['TenTL'] ?>
            </option>
          <?php }?>
        </select>
        <select name="idLT" id="idLT">
        
        <?php  $loaitin=$q->LoaiTinTrongTheLoai($idTL,1);?>
        <option value="-1">Chọn Tất Cả Loại Tin</option>
        <?php while($row_loaitin=mysql_fetch_assoc($loaitin)){?>
        <option value="<?=$row_loaitin['idLT'] ?>" <?php if($row_loaitin['idLT']==$idLT) echo 'selected="selected"'?>><?=$row_loaitin['Ten']?></option>
        <?php }?>
      </select>
        
      
        
        <select name="lang" id="lang">
          <option value=''>Chọn Ngôn Ngữ/Language</option>
        <option value='vi'>Tiếng Việt</option>
        <option value='en'>EngLish</option>
      </select>
        <input type="submit" name="button" id="button" value="Tìm" />
        </th>
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
        <?=$q->pagesList("main.php?p=tintuc_xemds&idTL=$idTL&idLT=$idLT&lang=$lang",$totalRow,$pageNum,$pageSize,3) ?>
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