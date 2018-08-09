<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
	session_start();
	
	require_once "classquantri.php";
	$idTL=$_GET['idTL'];
	settype($idTL,"int");
	if($idTL<=0) die("Không Tìm Thấy Loại Tin");
	$qt= new quantritin;
	
	if($qt->DemLoaiTinTrongTheLoai($idTL)>0)
	{
		$_SESSION['thongbao']="The Loai Tin Này Chứa Nhiều Loai Tin,Không Xóa Được";
		header("location:thongbao.php");
		exit();
		
	}
	
	
	$qt->XoaTheLoaiTin($idTL);
	header("location:main.php?p=theloaitin_xemds");
	



?>