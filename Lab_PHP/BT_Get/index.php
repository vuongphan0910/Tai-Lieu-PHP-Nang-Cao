<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>

<link href="css/styles.css" rel="stylesheet" type="text/css" />
</head>

<body>
	<div id="container">
    	<?php include("header.php");
		include("left.php");
		if(isset($_GET['p']))
		{
			switch($_GET['p'])
			{
				case "tintuc" : include ("tintuc.php");break;
				case "sukien" : include ("sukien.php");break;
				
			}
		}else include("right.php");
		
		include ("bottom.php");
			
		?>
       
       
    	
    </div>

<?php ?>
</body>
</html>