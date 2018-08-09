<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php 
	require_once "classquantri.php";
	$qt = new quantritin;
	$idTL = $_GET['idTL'];
	
	$loatin = $qt->LoaiTinTrongTheLoai($idTL);
	

			

?>

<option value="-1">Chọn Tất Cả Loại Tin</option>

<?php while ($row_loaitin=mysql_fetch_assoc($loatin)){
		?>
<option value="<?php echo $row_loaitin['idLT'];?>">
	<?php 
		
	echo $row_loaitin['Ten']?>
</option>
<?php
}
?>