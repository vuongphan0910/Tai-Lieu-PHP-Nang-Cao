
	<?php include "connect.php";
		if(isset($_GET['btnsub']))
		{
			$key=$_GET['tim'];
			$sql="select * from ck where mack={$key}";
			$query=mysqli_query($link,$sql);
			$dem=mysqli_num_rows($query);
			if($dem>0){
				echo "ton tai ";
				}
				else 
				echo "khong tim thay";
				
		}
	?>

