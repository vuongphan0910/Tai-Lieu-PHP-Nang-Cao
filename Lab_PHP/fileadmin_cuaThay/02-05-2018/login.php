<?php session_start(); ob_start();
if(isset($_COOKIE['id']))
{
	$_SESSION['hoten']=$_COOKIE['ht'];
	$_SESSION['iduser']=$_COOKIE['id'];
	
	setcookie("ht",$_SESSION['hoten'], time()+60*60*24*7);
	setcookie("id",$_SESSION['iduser'], time()+60*60*24*7);
}
if(isset($_SESSION['iduser'])) header("location:index.php"); 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="process.php">
  <p>
    <label for="username">Username:</label>
    <input type="text" name="username" id="username" />
  </p>
  <p>
    <label for="password">Password:</label>
    <input type="password" name="password" id="password" />
  </p>
  <p>
    <input type="checkbox" name="rem" id="rem" />
    <label for="rem">Remember</label>
  </p>
  <p>
    <input type="submit" name="login" id="login" value="Login" />
  </p>
</form>
</body>
</html>