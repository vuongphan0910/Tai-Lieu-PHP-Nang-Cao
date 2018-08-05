<?php 
	session_start();
	ob_start();
	include "connect.php";
	if(isset($_POST['btndat']))
	{
		
		$k=count($_SESSION['giohang']);
		$flag=0;
		for($i=0;$i<$k;$i++)
		{
			if($_POST['loaibao']==$_SESSION['giohang'][$i]['mabao'])
			{
				$_SESSION['giohang'][$i]['sl']+=$_POST['sl'];
				$flag=1;
				header("location:datbao.php");
			}
		}
		if($flag==0){
			if($_POST['sl']==0)
			$_POST['sl']=1;
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
	if(isset($_POST['update_gh']))
	{
		$k=count($_SESSION['giohang']);
		for($i=0;$i<$k;$i++)
		{
			if ($_POST['sl_'.$i]==0)
			{
				unset($_SESSION['giohang'][$i]);
				header("location:datbao.php");
			}
			else if(($_SESSION['giohang'][$i]['sl']!=$_POST['sl_'.$i])||
				($_SESSION['giohang'][$i]['sl']=$_POST['sl_'.$i]))
			{
				unset($_SESSION['giohang'][$i]['sl']);
				$_SESSION['giohang'][$i]['sl']=$_POST['sl_'.$i];
				header("location:datbao.php");
			}
			 
		}
	}

	/**********Xoa Bao**************************/
	if(isset($_GET['mabao']))
	{
		
		for($i=$_GET['mabao'];$i<count($_SESSION['giohang'])-1;$i++)
		{	
			$j=$i+1;
			$_SESSION['giohang'][$i]=$_SESSION['giohang'][$j];
			
			
		}
		//$k=count($_SESSION['giohang'])-1;
		unset($_SESSION['giohang'][$k]); 
		
		header("location:datbao.php");
	}
	/*--------------------------------------------------*/
	if(isset($_POST['sm_dh'])){
		$hoten=$_POST['hoten'];
		$ngay=date('d-m-y');
		$dc=$_POST['dc'];
		$sdt=$_POST['sdt'];
		$email=$_POST['email'];
		$sql="insert into datbao value(NULL,'$ngay','$hoten','$dc',$sdt,'$email')";
		$query=mysqli_query($link,$sql);
		$madatbao=mysqli_insert_id($link);
		for($i=0;$i<count($_SESSION['giohang']);$i++){
			$mabao=$_SESSION['giohang'][$i]['mabao'];
			$soluong=$_SESSION['giohang'][$i]['sl'];
			$gia=$_SESSION['giohang'][$i]['gia'];
			$sql_2="insert into ct_datbao value($madatbao,'$mabao',$soluong,$gia)";
			$query_2=mysqli_query($link,$sql_2);
		}
		unset($_SESSION['giohang']);
		header("location:datbao.php");
	}
		
?>