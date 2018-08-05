<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form action="" method="post" name="frm1">
	So Dong : <input type="text" name="txtdong" id="txtdong" />
    <br/> So Cot : <input type="text" name="txtcot" id="txtcot" />
  <p>Mau Nen</p> 
    <select name="sltmau" size="1">
      <option value="green">xanh la</option>
      <option value="blue">Xanh DUong</option>
      <option value="red">Do</option>
    	
    </select>
    <br/><input type="submit" name="btnsubmit" id="btnsubmit" value="Tao Bang" />
</form>
<?php
	
	if (isset($_POST['btnsubmit']))
	{
		$d=$_POST['txtdong'];
	
		$c=$_POST['txtcot'];
	
		$m=$_POST['sltmau'];
		echo "<table border='1' width='80%' bgcolor='$m'>";
	for($i=0;$i<$d;$i++)
	{
		echo "<tr>";
			for($j=0;$j<$c;$j++)
			{
				echo "<td>A</td>";
			}
			echo "</tr>";
	}
	echo "</table>";
	}
	
	

?>
</body>
</html>