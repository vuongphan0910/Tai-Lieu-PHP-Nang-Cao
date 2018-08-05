<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<script src="bhajax/jquery-1.4.2.js"></script>


</head>
<body>
	<script  type="text/javascript" charset="utf-8" async defer>
		$(document).ready(function(){
			getloai();
			
			$("#sltl").change(function(){
				getloai();
			});


		})	
		function getloai(){
				$.ajax({
					type: "GET",
					url:"loaisp.php",
					data:"idCL="+$("#sltl").val(),
					success :function(html){
						$("#kq_loaisp").html(html);
					}
				});
			}
	</script>

	<?php include "connect.php";
	$sql="select * from webtm_chungloaisp ";
	$query=mysqli_query($link,$sql);

	?>
	<form action="" name="tl" id="tl" method="get">
		<select name="sltl" id="sltl">
			<?php while ($kq=mysqli_fetch_array($query)) {
				?>
				<option value="<?=$kq['idCL']?>"><?=$kq['TenCL']?></option>
				<?php } ?>

			</select>

		</form>
		<div id="kq_loaisp"></div>

	</body>
	</html>