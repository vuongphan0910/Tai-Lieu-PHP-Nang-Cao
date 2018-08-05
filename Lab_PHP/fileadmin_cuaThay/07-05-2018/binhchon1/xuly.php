<?php  ob_start(); 
if(isset($_POST['binhchon']))
{
	include("connect.php");
	$sl="update phuongan set SoLanChon=SoLanChon+1 where idPA=".$_POST['binhchon'];
	if(mysql_query($sl))
	header("location:ketquabinhchon.php"); 
	else
	echo "Binh chon that bai";
}
?>