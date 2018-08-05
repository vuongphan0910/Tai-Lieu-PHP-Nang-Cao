<?php
session_start();
$chuoi="QWERTYUIOPASDFGHJKLZXCVBNM0123456789";
$dodai=6;
$capt="";
for($i=1;$i<=$dodai;$i++)
{
	$vt=rand(0,35);
	$capt.=substr($chuoi,$vt,1);
}
$_SESSION['mxn']=$capt;
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style>
.abc{font-size:40px; color:#F00; font-weight:bold; font-style:italic;}

</style>
</head>

<body>
<form id="form1" name="form1" method="post" action="process.php">
  <p>
    <label for="maxn">Nhap ma xac nhan:</label>
    <input type="text" name="maxn" id="maxn" /> <span class="abc"><?php echo $capt;?></span>
  </p>
  <p>
    <input type="submit" name="thuchien" id="thuchien" value="Submit" />
  </p>
</form>
</body>
</html>