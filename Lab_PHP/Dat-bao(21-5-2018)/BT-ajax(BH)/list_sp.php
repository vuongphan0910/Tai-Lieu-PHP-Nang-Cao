<?php
	include "connect.php";
	$idLoai=$_GET['loaisp'];
	$sql="select * from webtm_sanpham where idLoai=$idLoai";
	$query=mysqli_query($link,$sql);
	$tongsp=mysqli_num_rows($query);
	$limit = 5;
	$sotrang =ceil($tongsp/$limit);
	if(isset($_GET['page']))
	$p=$_GET['page'];
	else $p =1;
	$vitri =($p-1)*$limit;
	$sl="select * from webtm_sanpham where idLoai={$idLoai} limit $vitri,$limit";
	$query_2=mysqli_query($link,$sl);

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?php ?>
	<table border="1" width="250px">
		<tr>
			<th>STT</th>
			<th>Tên Sản Phẩm</th>
			<th>Mô Tả</th>
			<th>Giá</th>
			<th>Hình</th>
			<th>sửa | xóa</th>
		</tr>
		<?php while ($kq=mysqli_fetch_array($query_2)) {
				
			 ?>
		<tr>
			

			<td><?=$kq['idSP']?></td>
			<td><?=$kq['TenSP']?></td>
			<td><?=$kq['MoTa']?></td>
			<td></td>
			<td></td>
			<td></td>
			
		</tr><?php }?>
	<tr>
		<td colspan="6">
			<?php for ($i=1;$i<$sotrang;$i++){
				?>
				<a href="javascript:phantrang(<?=$idLoai?>,<?=$i?>)"><?=$i?></a>
		<?php 	} ?>
		</td>
	</tr>
	</table>
</body>
</html>