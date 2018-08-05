<?php
include("../connect.php");
//Xu ly login:
if(isset($_POST['login']))
{
	$user=$_POST['username'];
	$pass=md5($_POST['password']);
	$sl="select * from users where Username='$user' and Password='$pass'";
	$kq=mysql_query($sl);
	if(mysql_num_rows($kq)>0)
	{

		header("location:index.php");		
	}
	else echo $sl; //chi de test khi code
}

//Xu ly them the loai moi:
if(isset($_POST['themtl']))
{
	$sl="insert into theloai values(NULL, '{$_POST['lang']}', '{$_POST['TenTL']}', '{$_POST['TenTL_KhongDau']}', {$_POST['ThuTu']}, {$_POST['AnHien']})";
	if(mysql_query($sl)) header("location:theloai.php?lang=".$_POST['lang']);
	else echo $sl;
}

//Xu ly cap nhat the loai:
if(isset($_POST['suatl']))
{
	$sl="update theloai set lang='{$_POST['lang']}', TenTL='{$_POST['TenTL']}', TenTL_KhongDau='{$_POST['TenTL_KhongDau']}', ThuTu={$_POST['ThuTu']}, AnHien={$_POST['AnHien']} where idTL={$_POST['idTL']}";
	if(mysql_query($sl)) header("location:theloai.php?lang=".$_POST['lang']);
	else echo $sl;
}

//Xu ly xoa the loai:
if(isset($_GET['xoatl']))
{
	$sl="delete from theloai where idTL=".$_GET['xoatl'];
	if(mysql_query($sl)) header("location:theloai.php?lang=".$_GET['lang']);
	else echo $sl;
}


//Xu ly them loai tin moi:
if(isset($_POST['themloai']))
{
	$sl="insert into loaitin values(NULL, '{$_POST['lang']}', '{$_POST['Ten']}', '{$_POST['Ten_KhongDau']}', {$_POST['ThuTu']}, {$_POST['AnHien']}, {$_POST['idTL']})";
	if(mysql_query($sl)) header("location:loaitin.php?lang=".$_POST['lang']."&idTL=".$_POST['idTL']);
	else echo $sl;
}


//Xu ly cap nhat loai tin:
if(isset($_POST['sualoai']))
{
	$sl="update loaitin set lang='{$_POST['lang']}', Ten='{$_POST['Ten']}', Ten_KhongDau='{$_POST['Ten_KhongDau']}', ThuTu={$_POST['ThuTu']}, AnHien={$_POST['AnHien']} , idTL={$_POST['idTL']} where idLT={$_POST['idLT']}";
	
	if(mysql_query($sl)) header("location:loaitin.php?lang=".$_POST['lang']."&idTL=".$_POST['idTL']);
	else echo $sl;
}
?>