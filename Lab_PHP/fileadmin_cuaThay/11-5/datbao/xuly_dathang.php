<?php 
	session_start();
	ob_start();
	include "connect.php";
	if(isset($_POST['btndat']))
	{
		$flag=0;
		$k=count($_SESSION['giohang']);
		for($i=0;$i<$k;$i++)
		{
			if($_POST['loaibao']==$_SESSION['giohang'][$k]['mabao'])
			{
				$_SESSION['giohang'][$k]['mabao']+=$_POST['sl'];
				$flag=1;
				break;
			}
		}
		if($flag==0){
		//echo $_POST['loaibao'];
		$sql="select * from loaibao where mabao='{$_POST['loaibao']}'";
		$query=mysqli_query($link,$sql);
		$kq=mysqli_fetch_array($query);
		$_SESSION['giohang'][$k]['mabao']=$kq['mabao'];
		$_SESSION['giohang'][$k]['sl']=$_POST['sl'];
		$_SESSION['giohang'][$k]['tenbao']=$kq['tenbao'];
		$_SESSION['giohang'][$k]['gia']=$kq['gia'];
		header("location:datbao.php");
		}
		
	}
		
?>