<?php
	
	require_once"classquantri.php";
	$qt= new quantritin;
	$p= $_GET['p'];
	$qt->CheckLogin();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>


<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>

<link href="../css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../js/jquery.js"></script>
<script>
	$(document).ready(function(e) {
        	var h1=$("#left").height();
		var h2 = $("#right").height();
		if (h1>h2)
		$("#right").height(h1);
		else $("#left").height(h2);
    });

</script>

</head>

<body bgcolor="#CECECE">
<div id="wrapper">
<div id="header">
	<div id="header_left">Quan tri Website</div>
    <div id="header_right">Chào <?php echo $_SESSION['hoten']; ?>
    	<p><a href="thoat.php">Thoát</a></p>    
    </div>


</div>
<div id="left">
<?php include "menu.php"; ?>
</div>
<div id="right">
<?php 

if($p=='loaitin_xemds') include "loaitin_xemds.php";
elseif ($p=="loaitin_them") include "loaitin_them.php";
elseif($p=="loaitin_sua") include "loaitin_sua.php";
elseif($p=="theloaitin_xemds") include "theloaitin_xemds.php";
elseif($p=="theloaitin_them") include "theloaitin_them.php";
elseif($p=="theloaitin_sua") include "theloaitin_sua.php";
elseif($p=="tintuc_xemds") include "tintuc_xemds.php";
elseif($p=="tintuc_them") include "tintuc_them.php";
elseif($p=="tintuc_chinh") include "tintuc_chinh.php";
elseif($p=="") include "tintuc_xemds.php";
//elseif($p=="trangchu") include "trangchu.php";
?>


</div>	

</div>
</body>
</html>