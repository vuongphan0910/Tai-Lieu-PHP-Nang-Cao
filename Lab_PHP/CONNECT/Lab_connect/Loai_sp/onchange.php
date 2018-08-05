<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php include ("../connect/connect.php");
	$sql="select * from webtm_chungloaisp";
	$kq=mysql_query($sql);
	
?>
<form method="get" action="" name="form1">
	<select name="slt_chungloai"  onchange="form1.submit()">//su kien 
    	<?php while($query=mysql_fetch_array($kq)) {?>
	  <option value="<?=$query['idCL']?>" <?php if(isset($_GET['slt_chungloai'])&& $query['idCL']==$_GET['slt_chungloai']) echo "selected=selected";  ?>><?=$query['TenCL']?></option>
      <?php }?>
    </select>
    
    <?php if(isset($_GET['slt_chungloai'])){
		$sql_2="select idLoai ,TenLoai from webtm_loaisp where idCL=".$_GET['slt_chungloai'];
		$kq_2=mysql_query($sql_2);
		while($query_2=mysql_fetch_array($kq_2)) {
	?>
    <select name="slt_loaisp">
    	<?php while($query_2=mysql_fetch_array($kq_2)) {?>
	  <option value="<?=$query_2['idLoai']?>"><?=$query_2['TenLoai']?></option>
      <?php }?>
    </select>
    
    	
    <?php }}?>
    
</form>

</body>
</html>