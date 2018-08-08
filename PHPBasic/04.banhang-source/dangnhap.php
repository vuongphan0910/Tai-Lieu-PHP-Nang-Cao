<?php 
	session_start(); 
	if (isset($_POST['btnLog'])==true){	
	//code xử lý đặt ở đây
	require_once "classDB.php";
	$u = new db;
	$email = $_POST['email'];
	$password = md5($_POST['password']);
	if (get_magic_quotes_gpc()== false) {
		$email = trim(mysql_real_escape_string($email));
		$password = trim(mysql_real_escape_string($password));
	}
	$sql = sprintf("SELECT * FROM users WHERE email='%s' AND password ='%s'",$email, $password);
	$user = mysql_query($sql);	
	if (mysql_num_rows($user)==1) {//Thành công		  
	  $row_user = mysql_fetch_assoc($user);
	  $_SESSION['login_id'] = $row_user['idUser'];
	  $_SESSION['login_email'] = $row_user['Email'];
	  $_SESSION['login_level'] = $row_user['idGroup'];
	  $_SESSION['HoTen'] = $row_user['HoTen'];
	  if (isset($_POST['nho'])== true){
			 	 setcookie("email", $_POST['email'], time() + 60*60*24*7 );
				 setcookie("pw", $_POST['password'], time() + 60*60*24*7 );
			} else {
				 setcookie("email", $_POST['email'], -1);
				 setcookie("pw", $_POST['password'], -1);
	  }
   	  if (strlen($_SESSION['back'])>0){
		$back = $_SESSION['back']; unset($_SESSION['back']);header("location: $back");
	  } else header("location: index_bh.php");
	} else { //Thất bại
    header("location: dangnhap.php");
  }
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login</title>
<style>
#divhuongdan  { 
margin-left:150px; margin-top:80px; width:700px; background-color:#CCCCCC; height:280px;
border:solid 2px #444444 }
#divhuongdan .caption { background-color:#006699; color:#CCCCCC; padding-top:5px; padding-bottom:5px; padding-left:10px; margin:0px}
#divhuongdan ul { margin-top:10px; list-style:circle }
#divdangnhap    { border:solid 2px #069; width:500px;margin-top:20px; height:150px; background-color:#66CCCC; margin-left:100px; }
#divdangnhap  span { color:#996600; width:100px; float:left;  }
#divdangnhap  p { margin-top:5px; margin-bottom:5px; margin-left:50px; float:left}
#divhuongdan  a{ color:#CC0066; text-decoration:none}
#divhuongdan a:hover { color:#003366}
#divdangnhap #email, #divdangnhap #password{ 	
		background-color:#069; color:#6FF; padding:3px;
		border:solid 1px #990; width:280px;}
#btnLog{ background-color:#036; color:#6FF; width:120px; 
		  padding:3px; border:solid 1px #6FF}

</style>
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript" src="jquery.corner.js"></script>

<script type="text/javascript">
$(document).ready(function() {
	$("#divhuongdan").corner();
	$("#divhuongdan .caption").corner("top");
	$("#divdangnhap").corner();
	
});
</script>

</head>

<body>
<div id="divhuongdan">
<p class="caption">ĐĂNG NHẬP</p>
<ul>
  <li>Nếu bạn là khách hàng cũ của chúng tôi, vui lòng đăng nhập trong form bên dưới.</li>
  <li>Nếu bạn quên mật khẩu, hãy dùng chức năng <a href="quenpass.php">quên mật khẩu</a> để chúng tôi cấp lại mật khẩu cho bạn. </li>
  <li>Nếu bạn là khách hàng mới, bạn vui lòng <a href="dangky.php">đăng ký</a> một tài khoản trước khi giao dịch.</li>
</ul>
<div id="divdangnhap">
<form id="formdangnhap" name="formdangnhap" method="post" action="">
<p><span>Email</span><input type="text" name="email" id="email"  /></p>
<p><span>Password</span><input type="password" name="password" id="password" /></p>
<p><span>&nbsp;</span>
	<input type="submit" name="btnLog" id="btnLog" value="Đăng nhập"/>&nbsp;
	<input type="checkbox" name="nho" id="nho" /> Ghi nhớ   
</p>
<p><span>&nbsp;</span> 	<a href="quenpass.php">Quên mật khẩu </a>&nbsp;&nbsp;
						<a href="dangky.php">Đăng ký tài khoản </a>
</p>
</form>
</div>
</div>
</body>
</html>
