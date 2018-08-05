<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
include("connect.php");
$sl="select * from lienket order by ThuTu";
$kq=mysql_query($sl);
?>

<form id="form1" name="form1" method="post" action="">
  <label for="lienket"></label>
  <select name="lienket" id="lienket" onchange="location.href=this.value">
    <option value="#">---Chon lien ket</option>
    <?php
	while($d=mysql_fetch_array($kq))
	{
	?>
    <option value="<?php echo $d['Url'];?>"><?php echo $d['Ten'];?></option>
    <?php }?>
  </select>
</form>
</body>
</html>