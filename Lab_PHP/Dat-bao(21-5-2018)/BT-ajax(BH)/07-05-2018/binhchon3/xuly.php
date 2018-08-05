<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
	include("connect.php");
	if(isset($_GET['idPA']) && $_GET['idPA']!='')
	{	
		$idPA=$_GET['idPA'];
		$qr="update phuongan set SoLanChon = SoLanChon+1 where idPA=$idPA";
		
		if(mysql_query($qr))
		{
		echo "<script language='javascript'>";
		echo "x=window.open('','','status=yes,menubar=no');";
		echo "x.location='ketquabinhchon.php';";
		echo "x.resizeTo(650,300);";
		echo "location.href='".$_SERVER['HTTP_REFERER']."';";
    	echo "</script>";
		}
	}
	else
		{
			echo "<script language='javascript'>";
			echo "alert('Bạn chưa chọn phương án');";
			echo "location.href='".$_SERVER['HTTP_REFERER']."';";
    		echo "</script>";
		}
	
	?>
