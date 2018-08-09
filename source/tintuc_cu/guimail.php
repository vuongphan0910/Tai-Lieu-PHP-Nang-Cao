<?php 
		require_once"classtin.php";
		$t = new tin;
		if (isset($_POST['btnOK'])==true){ 
		$tennguoigui = "Tèo";
		$to_email = $_POST['emailnhan'];
		$body = $_POST['noidung'];
		$tieude = "Thư liên hệ";
		
		$error= "";
		
		$from_email = 'vuongphan0910@gmail.com'; //vd: ti@yahoo.com
		$username = 'vuongphan0910@gmail.com';// Tài khoản gmail dùng để gửi thư
		$password = 'PhanQuocVuong'; // mật khẩu của tài khoản gửi mail
	   	$t->smtpmailer($to_email, $from_email, $tennguoigui, $tieude, $body,$username, $password);
		if (!empty($error)) echo $error;
		else header('location:guixong.php');
} 



?>

<style>
		#divguithu{width:500px; border: solid 5px #C60; background-color:#FFFF99;}
		#divguithu #form1{margin:0}
		#divguithu .caption { background-color:#6699FF;  font-weight:bold; font-size:18px; 
					text-align:center; padding:5px; margin:0px}
		#divguithu span{ width:130px; float:left; clear:left; text-align:left;  } 
		#divguithu p { margin-top:8px; margin-bottom:8px}
		#divguithu .txt{ width:340px; background-color:#036; border: solid 1px #066;
					 padding:3px; color:#CFC; } 
		#divguithu #btnOK{ background-color:#036; color:#CCC; font-weight:bold; 
					   width:110px; padding:3px}


</style>





<div id="divguithu">
<form name="form1" method="post" action="" id="form1">
<p class="caption">GỬI MAIL</p>
<p> <span>Email người nhận</span><input name="emailnhan" type="text" class="txt" /></p>
<p> <span>Nội dung thư</span><textarea name="noidung" class="txt" rows=5></textarea></p>
<p> <span>&nbsp;</span> <input id="btnOK" name="btnOK" type="submit" value="GỬI"/></p>
</form>

</div 