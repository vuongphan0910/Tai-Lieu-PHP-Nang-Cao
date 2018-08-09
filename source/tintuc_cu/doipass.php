<?php
			/**/
      session_start();
		if (isset($_SESSION['login_id'])==false) {
			$_SESSION['back'] = $_SERVER['REQUEST_URI'];
			header('location:/tintuc/');   
		}
		require_once "classuser.php";
		$u = new User;
		$loi =array();
		if (isset($_POST['btnCapNhat'])==true){
			$thanhcong = $u->DoiPass($loi);
			if ($thanhcong ==true) header('location:doipassthanhcong.php');
		}
?>



<form action="" method="post" name="formdoipass" id="formdoipass">
	<div align="center" id="loi">
	<?php foreach($loi as $v) echo $v,"<br>";?>
    </div>

<table align="center" width="400" cellpadding="4" cellspacing="0" border="1" id="tbldoipass">
<tr> <th colspan="2" align="center"> ĐỔI MẬT KHẨU</th> </tr>
<tr> <td>Username</td> 	<td><?=$_SESSION['login_user'];?>&nbsp;</td> </tr>

<tr> <td>Mật khẩu cũ</td>
	<td><input type="password" name="pass_old" id="pass_old" /> </td>
</tr>
<tr> <td>Mật khẩu mới</td>
	<td><input type="password" name="pass_new1" id="pass_new1" /> </td>
</tr>
<tr> <td>Gõ lại mật khẩu mới</td>
	<td><input type="password" name="pass_new2" id="pass_new2" /> </td>
</tr>
<tr> <td colspan="2" align="center">
     <input type=submit name="btnCapNhat" id=btnCapNhat value="Cập nhật">
     </td>
</tr>
<tr> <td colspan=2 align=center><a href="thoat.php">Thoát</a></td>
</tr>
</table></form>  
