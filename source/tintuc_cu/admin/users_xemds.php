
<?php
	require_once"classquantri.php";
	$qt= new quantritin;
	

?>
<form>
<h2>Danh Sách Thể Loại Tin</h2> 
                    
                    
<table id="rounded-corner" >
    <thead>
    	 <tr>
          <th width="54" class="rounded-q1" scope="col">ID Thể Loại</th>
          <th width="82" class="rounded" scope="col">Tên TL</th>
          <th width="79" class="rounded" scope="col">Ẩn Hiện</th>
          <th width="62" class="rounded" scope="col">Thứ Tự</th>
          
          <th width="59" align="center" class="rounded" scope="col">Lang</th>
          <th width="78" class="rounded" scope="col">Số Loại Tin</th>
          <th width="27" class="rounded" scope="col">Edit</th>
          <th width="45" class="rounded-q4" scope="col">Delete</th>
        </tr>
    </thead>
        <tfoot>
    	<tr>
        	<td colspan="7" class="rounded-foot-left">  <div class="pagination"><?=$qt->pagesList("main.php?p=theloaitin_xemds",$totalRow,$pageNum,$pageSize,3) ?>
        
        </div> </td>
        	<td class="rounded-foot-right">&nbsp;</td>

        </tr>
    </tfoot>
    <tbody>
    <?php while ($row_theloai=mysql_fetch_assoc($theloai)) { ob_start();?>
    	<tr>
           <td align="center">{idTL}</td>
          <td align="center">{TenTL}</td>
          <td align="center">{AnHien}</td>
          <td align="center">{ThuTu}</td>
          
          <td align="center">{lang}</td>
          <td align="center"><p><a href="main.php?p=tintuc_xemds&idTL={idTL}">XEM</a></p>
          <p>{SoLoaiTin}</p></td>
          <td align="center"><a href="main.php?p=theloaitin_sua&idTL={idTL}"><img src="images/user_edit.png" alt="" title="" border="0" /></a></td>
          <td align="center"><a href="theloaitin_xoa.php?idTL={idTL}" class="ask"><img src="images/trash.png" alt="" title="" border="0" /></a></td>
        	</tr>
            <?php 
				$str = ob_get_clean();
				$str= str_replace("{idTL}",$row_theloai['idTL'],$str);
				$str= str_replace("{TenTL}",$row_theloai['TenTL'],$str);
				$str= str_replace("{AnHien}",($row_theloai['AnHien']==0)?"Đang Ẩn":"Đang Hiện",$str);
				$str= str_replace("{ThuTu}",$row_theloai['ThuTu'],$str);
				$str= str_replace("{lang}",($row_theloai['lang']=='vi')?"Tiếng Việt":"EngLish",$str);
				$str= str_replace("{SoLoaiTin}",$qt->DemLoaiTinTrongTheLoai($row_theloai['idTL']),$str);
				echo $str;
			
			?>  
        <?php } ?>
    </tbody>
</table>

	 
     </form>
     
      
     
     <h2>&nbsp;</h2>