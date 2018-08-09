<?php 
	session_start();
	require_once"classquantri.php";
	$qt= new quantritin;
	$kq = $qt->ListDownLoad();

?>
	<table id=dsloaitin border=1 cellpadding=4 cellspacing=0 width=800 align=center>
    <tr> <th colspan="4" align="right"><a href="download_them.php">Thêm</a></th> </tr>
    <tr> <th>idDL</th> <th>Tên file/Mô tả</th> <th>Ngày/Down</th> <th>Action</th> </tr>
    <!-- Bắt đầu lặp -->
    <?php while ($row = mysql_fetch_assoc($kq) ) { ?>
    <?php ob_start(); ?>
    <tr>
      <td>{idDL}</td>
      <td><b>Tên file</b>:{TenFile}. <b>Url</b>: <i>{url}</i><br> {MoTa}<br> </td>
      <td>{Ngay} <br />Down: {SoLanDown}<br></td>
      <td width="100">{AnHien}<br /> | <a href="#">Chỉnh</a> | 
      <a href="download_xoa.php?idDL={idDL}">Xóa</a>|   
      </td>
    </tr>
    	<?php 	
			$str = ob_get_clean(); 
			$str = str_replace("{idDL}" , $row['idDL'] , $str); 
			$str = str_replace("{TenFile}" , $row['TenFile'] , $str);
			$str = str_replace("{MoTa}" , substr($row['MoTa'] ,0,300), $str);
			$str = str_replace("{url}" , $row['url'] , $str);
			$str = str_replace("{AnHien}" , ($row['AnHien']==1)?"Đang hiện":"Đang ẩn" , $str);
			$str = str_replace("{Ngay}", date('d/m/Y',strtotime($row['Ngay'])) , $str);
			$str = str_replace("{SoLanDown}" , $row['SoLanDown'] , $str);
			echo $str; 
			?>

    	<?php } //while ?>
    <!-- kết thúc lặp -->
    </table>
