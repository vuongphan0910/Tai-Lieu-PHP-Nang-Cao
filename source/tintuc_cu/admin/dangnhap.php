<?php  session_start();
require_once "classquantri.php";
$qt = new quantritin;
if (isset($_POST['btnLog'])==true) $qt ->DangNhap();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css">
#formlogin1  { border:solid 3px #036; color:#036; font-weight:bold;
		width:500px; margin:auto; text-align:center }
#formlogin1  span { width: 100px; float:left}
#formlogin1  #u, #formlogin1 #p {background-color:#036; color:#6FF; 
	padding:3px;	border:solid 1px #990; width:280px;}
#formlogin1 #btnLog{ background-color:#036; color:#6FF; width:120px; 
		  padding:3px; border:solid 1px #6FF}



</style>
</head>

<body>

<?php 
echo '<form id="formlogin1" name="formlogin1" method="post" action="">';

if(($_SESSION['error'])==true)
{	echo'<div id="error">', $_SESSION['error'],'</div>
	h4>ÐĂNG NHẬP</h4>
<p><span>Username</span><input type=text name="u" id="u"></span></p>
<p><span>Username</span><input type=password name="p" id="p" ></span></p>
<p><span> </span><input type="checkbox" name="nho" id="nho">Ghi nhớ</span></p>
<p><input type="submit" name="btnLog" id="btnLog" value="Đăng nhập"/></p>
</form>'

;
	
	}
	else
	echo'h4>ÐĂNG NHẬP</h4>
<p><span>Username</span><input type=text name="u" id="u"></span></p>
<p><span>Username</span><input type=password name="p" id="p" ></span></p>
<p><span> </span><input type="checkbox" name="nho" id="nho">Ghi nhớ</span></p>
<p><input type="submit" name="btnLog" id="btnLog" value="Đăng nhập"/></p>
</form>'
	?>

<

</body>
</html>