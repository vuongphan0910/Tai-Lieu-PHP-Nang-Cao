<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
	session_start();
	
	require_once "classquantri.php";
	$idTin=$_GET['idTin'];
	settype($idTin,"int");
	if($idTin<=0) die("Không Tìm Thấy Tin");
	$qt= new quantritin;
	
	
	
	$qt->XoaTin($idTin);
	header("location:main.php?p=tintuc_xemds");
	



?>