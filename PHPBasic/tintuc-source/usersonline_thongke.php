<? require_once "classTin.php";
	$d= new tin;
	$theloai=$d->TheLoai();
	 
?>
<style>
	#divthongke{width:194px;border:#6600CC dotted}
	#divthongke h3{color:#000066}
	#divthongke h3 span{color:#00CC66;font-size:12px; font-style:italic}
	#divthongke p{color:#CC6600;margin-left:20px}
	#divthongke p span{color:#CC9999;font-size:12px;font-style:italic}
</style>
<script>
$('#divthongke').corner();
</script>
<div id="divthongke">
		<? while ($row_theloai=mysql_fetch_assoc($theloai)){?>
        	<h3> <?=$row_theloai['TenTL'];?>  

            </h3>
            <? $loaitin=$d->LoaiTinTrongTheLoai($row_theloai['idTL']); ?>
            <div class="loaitin">
            	<? while ($row_loaitin=mysql_fetch_assoc($loaitin)) {?>
                	<p> <?=$row_loaitin['Ten'];?> 

                    </p>
                <? }?>
            </div>   
       <? } ?>
       
      <a href="#" id="back" onclick="dongform_tongketuser()"> Quay Lại</a>
</div>