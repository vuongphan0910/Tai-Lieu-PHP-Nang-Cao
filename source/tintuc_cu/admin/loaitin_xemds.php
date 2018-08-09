<?php 
	session_start();
	require_once "classquantri.php";
	$qt = new quantritin;
	$qt->CheckLogin();
	$idTL = -1;
	$pageSize =5;
	settype ($pageNum,'int');
	$pageNum = $_GET['pageNum'];
	if ($pageNum<=0)
	$pageNum=1;
	$totalRow=0;
	$loaitin= $qt->ListLoaitTin($idTL,$totalRow,$pageNum,$pageSize)

?>
<form method="get">
<h2>Danh Sách Loại Tin</h2>
<table width="400" id="rounded-corner" >
      <thead>
        <tr>
          <th width="54" class="rounded-q1" scope="col">IDLT</th>
          <th width="82" class="rounded" scope="col">Tên LT</th>
          <th width="87" class="rounded" scope="col">Ẩn Hiện</th>
          <th width="54" class="rounded" scope="col">Thứ Tự</th>
          <th width="75" class="rounded" scope="col">Thể Loại</th>
          <th width="50" class="rounded" scope="col">Lang</th>
          <th width="60" class="rounded" scope="col">Số Tin</th>
          <th width="36" class="rounded" scope="col">Edit</th>
          <th width="45" class="rounded-q4" scope="col">Delete</th>
        </tr>
      </thead>
      <tfoot>
        <tr>
          <td colspan="8" class="rounded-foot-left">
          	<div class="pagination">
        <?=$qt->pagesList("main.php?p=loaitin_xemds",$totalRow,$pageNum,$pageSize,3) ?>
        </div> 
          </td>
          <td width="13" class="rounded-foot-right">&nbsp;</td>
        </tr>
      </tfoot>
      <tbody>
      <?php while ($row_loaitin=mysql_fetch_assoc($loaitin)) { 	ob_start();?>
        <tr>
          <td>{idLT}</td>
          <td>{TenLT}</td>
          <td>{AnHien}</td>
          <td>{ThuTu}</td>
          <td>{TenTL}</td>
          <td>{lang}</td>
          <td><a href="main.php?p=tintuc_xemds&idLT={idLT}">[XEM]</a><br/>{SoTin}</td>
          <td><a href="main.php?p=loaitin_sua&idLT={idLT}"><img src="images/user_edit.png" alt="" title="" border="0" /></a></td>
          <td><a href="loaitin_xoa.php?idLT={idLT}" class="ask"><img src="images/trash.png" alt="" title="" border="0" /></a></td>
        </tr>
        <?php 
			$str = ob_get_clean();
			$str=str_replace("{idLT}",$row_loaitin['idLT'],$str);
			$str=str_replace("{TenLT}",$row_loaitin['Ten'],$str);
			$str=str_replace("{TenTL}",$row_loaitin['TenTL'],$str);
			$str=str_replace("{AnHien}",($row_loaitin['AnHien']==0)?"Đang Ẩn":"Đang Hiện", $str);
			$str=str_replace("{ThuTu}",$row_loaitin['ThuTu'],$str);
			$str=str_replace("{lang}",($row_loaitin['lang']=='vi')?"Tiếng Việt":"EngLish" , $str);
			$str=str_replace("{SoTin}",$qt->DemTinTrongLoaiTin($row_loaitin['idLT']),$str);
				echo $str;			
					
		?>
        
        
        <?php } ?>
        <tr>
          
      </tbody>
      <tbody>
      </tbody>
    </table>     <!-- <a href="#" class="ask"></a>--></td>
  </tr>
</tbody>
</table>

<!--<a href="#" class="bt_green"><span class="bt_green_lft"></span><strong>Add new item</strong><span class="bt_green_r"></span></a>
     <a href="#" class="bt_blue"><span class="bt_blue_lft"></span><strong>View all items from category</strong><span class="bt_blue_r"></span></a>
     <a href="#" class="bt_red"><span class="bt_red_lft"></span><strong>Delete items</strong><span class="bt_red_r"></span></a> -->
     
     
        
     
<h2>&nbsp;</h2>
</form>