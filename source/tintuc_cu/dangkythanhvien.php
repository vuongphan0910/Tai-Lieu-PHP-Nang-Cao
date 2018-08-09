<script type="text/javascript" src="js/jquery.js"></script>
<script>	
	
	$(document).ready(function(e) {
        $('#username').blur(function() { 
			$.get('checkun.php', "username="+$('#username').val(),//username=teo 
				function (d){  $('#loiusername').html(d); }// trong trang dangkythanhvien.php<span class="error" id="loiusername"> $loi['username'] </span>,1 trong 4 loi o trang checkun.php do vào biến d 
							);
				}); 
				/*$('#formdk').submit(function(e) {
                    if ($("#matkhau").val() != $("#golaimatkhau").val())
					{
						alert ("Mat Khau khac nhau");
						return false;
						}
                }); */

   			 });
</script>
<?php 
	session_start();
	require_once "classUser.php";
	$u=new user;
	$loi= array();
	
	if(isset($_POST['btndangky'])==true)
	{$thanhcong = $u->DangKyThanhVien($loi);
		if ($_POST['cap']!=$_SESSION['captcha_code']){
		$loi['captcha'] = "Ban nhập sai ma so trong hinh";
	   }else 
		
		if($thanhcong==true) header("location:dangkythanhcong.php");
		}
	

?>
<form action="" method="post" name=formdk id=formdk>
<table width=520 border=1 align=center cellpadding=0 cellspacing=0 id=tbldangky>
<caption> ĐĂNG KÝ THÀNH VIÊN </caption>
<tr><th>Tên đăng nhập</th>
   <td><input name="username" type="text" class="txt" id="username" value="<?=$_POST['username']?>" />     
      <span class="error" id="loiusername"> <?=$loi['username']?> </span>
   </td>
</tr>
<tr><th>Mật khẩu</th>
	<td><input name="matkhau" type="password" class="txt" id="matkhau" />      
      <span class="error"  > <?=$loi['matkhau']?> </span>
	</td>
</tr>
<tr><th>Gõ lại mật khẩu</th>
	<td><input name=golaimatkhau type="password" class=txt id=golaimatkhau>
      <span class="error"> <?=$loi['golaimatkhau']?> </span>
	</td>
</tr>
<tr><th>Họ tên</th>
   <td><input name="hoten" type="text" class="txt" id="hoten" value="<?=$_POST['hoten'] ?>" />
        <span class="error"> <?=$loi['hoten']?> </span>
   </td>
</tr>
<tr><th>Email</th>
	<td><input name="email" type="text" class="txt" id="email" value="<?=$_POST['email'] ?>" />
        <span class="error"> <?=$loi['email']?> </span>
	</td>
</tr>
<tr><th>Giới tính</th>
	<td><input name="gioitinh" type="radio" id="gt_0" value="1" <?php if($_POST['gioitinh']==1) echo "checked"?>>Nam
       <input type="radio" name="gioitinh" value="0" id="gt_1" <?php if($_POST['gioitinh']==0) echo "checked"?>/> Nữ
	</td>
</tr>
<tr><th>Ngày sinh</th>
	<td><input name="ngaysinh" type="text" class="txt" id="ngaysinh" value="<?=$_POST['ngaysinh'] ?>"/>
      <span class="error"> <?=$loi['ngaysinh']?> </span>
	</td>
</tr>
<tr>
	<td colspan="2" align="center">
    	<p><img src="capcha.php" /> <br /> 
    	  <?php echo $loi['captcha'];?>
    	  
  	  </p>
   	  <p>
   	    <label for="capcha"></label>
   	    <input type="text" name="cap" id="cap" />
   	  </p></td>
</tr>
<tr><td colspan="2" align="center">       
     <input type="submit" name="btndangky" id="btndangky" value="Đăng ký">
	</td>
</tr>
</table>
</form>
