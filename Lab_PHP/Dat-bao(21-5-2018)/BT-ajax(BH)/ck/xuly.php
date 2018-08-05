<?php
if(isset($_GET['mack']))
{
	include("connect.php");
	$sl="select * from ck where mack='{$_GET['mack']}'";
	$kq=mysqli_query($link,$sl);
	if(mysqli_num_rows($kq)>0)
	{
		$d=mysqli_fetch_array($kq);
		echo "Gia cua ma {$_GET['mack']} la:".$d['gia'];
	}
	else
	echo "Khong tim thay ma {$_GET['mack']} nay!";
}
?>