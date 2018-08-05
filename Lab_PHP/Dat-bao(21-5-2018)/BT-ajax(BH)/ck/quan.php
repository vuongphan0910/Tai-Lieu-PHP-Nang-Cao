<?php 
	include "connect.php";
	if(isset($_GET['tp']))
		$matp=$_GET['tp'];
		else 
		$matp=01;
		$sql="select * from quan where matp={$matp}";
		$query=mysqli_query($link,$sql);
	
	
?>
<select name="quan">
<?php while($kq=mysqli_fetch_array($query)){?>
  <option value="<?=$kq['maquan']?>"><?=$kq['tenquan']?></option>
<?php 	}?>
</select>