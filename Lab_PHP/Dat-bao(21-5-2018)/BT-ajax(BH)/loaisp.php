<script src="bhajax/jquery-1.4.2.js"></script>
<script  type="text/javascript" charset="utf-8" async defer>
		$(document).ready(function(){
				phantrang($("#loaisp").val(),1);
				$("#loaisp").change(function(){
					phantrang($("#loaisp").val(),1);

				});
			

		})	
			function phantrang(a,b){
					$.ajax({

						type:"get",
						url:"list_sp.php",
						data:"loaisp="+a+"&page="+b,
						success :function(html){
							$("#kq_sp").html(html);
						}
					});

				}
	</script>
<?php 
if (isset ($_GET['idCL'])) {
	include "connect.php";
	$sql="select * from webtm_loaisp where idCL={$_GET['idCL']}";
	$query=mysqli_query($link,$sql);

 ?>
	<form action="loaisp_submit" method="get" accept-charset="utf-8">
		<select name="loaisp" id="loaisp">
		<?php while($kq=mysqli_fetch_array($query)){?>	<option value="<?=$kq['idLoai']?>"><?=$kq['TenLoai']?></option>
		<?php }?>
		</select>
	</form>
	<div id="kq_sp"></div>
	<?php }?>