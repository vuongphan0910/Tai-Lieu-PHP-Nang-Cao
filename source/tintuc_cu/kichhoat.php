<?php
	require_once 'classDB.php';
	$db =new db;
	$id = -1;  $id = $_GET['id'];
    settype($id,"int");
	$rd = $_GET['rd'];	
	if (get_magic_quotes_gpc()==false) 
	$rd = mysql_real_escape_string($rd);	
	$sql = "UPDATE users set active=1 where idUser=$id and randomkey='$rd' and active=0";
	mysql_query($sql);	
	$sorecord = mysql_affected_rows();	//có bao nhieu dong ảnh hưởng
	?>
	<?php if ($sorecord>0) { ?>
	Đã kích hoạt xong<br/>Mời bạn <a href=formdangnhap.php>nhắp vào đây</a>để đăng nhập
	<?php } else { ?>
	Bạn đã kích hoạt tài khoản rồi<br />Không cần kích hoạt nữa
	<?php } 
	?>


