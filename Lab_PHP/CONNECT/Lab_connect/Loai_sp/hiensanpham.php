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
    	<?php $idCL=0 ;
		while($query=mysql_fetch_array($kq)) {
			if($idCL==0) $idCL=$query['idCL'];
			?>
	  <option value="<?=$query['idCL']?>" <?php if(isset($_GET['slt_chungloai'])&& $query['idCL']==$_GET['slt_chungloai']) echo "selected=selected";  ?>><?=$query['TenCL']?></option>
      <?php }?>
    </select>
    
    <?php if(isset($_GET['slt_chungloai'])) $idCL=$_GET['slt_chungloai'];
		$sql_2="select idLoai ,TenLoai from webtm_loaisp where idCL=$idCL";
		$kq_2=mysql_query($sql_2);
		
	?>
    <select name="slt_loaisp" onchange="form1.submit()">
    	<?php $idLoai=0 ; while($query_2=mysql_fetch_array($kq_2)) { if($idLoai==0) $idLoai=$query['idLoai'];?>
	  <option value="<?=$query_2['idLoai']?>" <?php 
	  if(isset($_GET['slt_loaisp'])&& $query_2['idLoai']==$_GET['slt_loaisp']) echo "selected=selected";  ?> ><?=$query_2['TenLoai']?></option>
      <?php }?>
    </select>
    
    	
 
    
</form>
  <?php if(isset($_GET['slt_loaisp'])){ 
	$idLoai=$_GET['slt_loaisp'];
	$sql_3="select * from webtm_sanpham where idLoai=$idLoai";
	$kq_3=mysql_query($sql_3);
		$idLoai=0;
		while($query_3=mysql_fetch_array($kq_3)){
			
	
	 ?>
<table border="1" width="80%">
	<tr>
    	<th>IDSP</th>
        <th>Ten SP</th>
        <th>Gia</th>
        <th>Hinh</th>
        
    </tr>
  
    
    <tr>
    	<td><?=$query_3['idSP']?></td>
        <td><?=$query_3['TenSP']?></td>
        <td><?=$query_3['Gia']?></td>
        <td><img src="<?=$query_3['UrlHinh']?>" /></td>
    </tr>
   
</table>
 <?php }}?>
</body>
</html>