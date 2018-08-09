<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
	session_start();
	
	require_once "classquantri.php";
	$idLT=$_GET['idLT'];
	settype($idLT,"int");
	if($idLT<=0) die("Không Tìm Thấy Loại Tin");
	$qt= new quantritin;
	
	if($qt->DemTinTrongLoaiTin($idLT)>0)
	{
		$_SESSION['thongbao']="Loại Tin Này Chứa Nhiều Tin,Không Xóa Được";
		header("location:thongbao.php");
		exit();
		
	}
	
	
	$qt->XoaLoaiTin($idLT);
	header("location:main.php?p=loaitin_xemds");
	



?>