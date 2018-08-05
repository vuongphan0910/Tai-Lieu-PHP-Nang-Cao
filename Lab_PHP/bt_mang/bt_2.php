<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
	<?php 
		$mang=array(array(4),array(4),array(4));
		for($i=0;$i<3;$i++)
		{
			for($j=0;$j<4;$j++)
			{
				$mang[$i][$j]=rand(0,9);
				echo $mang[$i][$j]." ";
				
			}echo  "<br/>";
			
		}
		echo "Bai for each<br/>";
		foreach($mang as $d){
		{
			foreach($d as $c)
			echo $c." ";
		}
			echo  "<br/>";
		}
	?>
</body>
</html>