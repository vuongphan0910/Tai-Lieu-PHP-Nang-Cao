<?php 
	require_once"classquantri.php";
	$qt= new quantritin;
	
	$idTin =$_GET['idTin'];
	echo $qt->AnHienTin($idTin);


?>

