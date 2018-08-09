<?php
	require_once "classUser.php";
	$u=new user;
	$user=$_GET['username'];
	if($user == NULL)
	echo "<br> Chưa Nhập User";
	elseif(strlen($user)<3)
	echo "<br>User nhiều hơn 3 ký  tự";
	elseif($u->CheckUsername($user)==false)
	echo "<br>UserName Đã Có Người Dùng";
	else echo "<br>Bạn Có Thể Dùng Tài Khoản Này";
	
 ?>
