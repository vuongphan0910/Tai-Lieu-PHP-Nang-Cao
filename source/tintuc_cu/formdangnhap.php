<script>
	$(document).ready(function(e) {
        $("#btndangnhap").click(function(){
			$.ajax({
				url:'xulydangnhap.php',
				cache:false, type:'post',
				data:$('#formdn').serialize(),
				success:function(d){$('#userinfo').html(d);}	
				});
		});

		$("#formdn").keypress(function(e){
				if (e.which==13) $("#btndangnhap").click();				
			});
    });
</script>

<form id="formdn" name="formdn" method="post" action="">
<table width="100%" border="1" cellpadding=4 cellspacing="0"  id="tbldangnhap">
 <caption>ĐĂNG NHẬP</caption>
 	<tr><th>Tên đăng nhập</th></tr>
       <tr><td><input type="text" name="username" class="txt" /></td></tr>
 	<tr><th>Mật khẩu</th></tr>
  	<tr><td><input type="password" name="password" class="txt" /></td></tr>
  	<tr><td><input type="checkbox" value="1" />Ghi nhớ</td></tr>
  	<tr><td>
    <input type="button" name="btndangnhap" id="btndangnhap" value="Đăng nhập">
    <a href="guipassmoi.php"><br />Quên password</a> 
    <a href="dangkythanhvien.php">Đăng ký</a>
    </td></tr>
</table>
</form>
