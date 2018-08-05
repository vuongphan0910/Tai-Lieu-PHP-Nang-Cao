<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style>
#main{width:960px; margin:auto;}
.sanpham{width:180px; float:left; height:250px; border:1px solid #00F; margin-right:5px; margin-bottom:5px;}
.hinhsp{text-align:center;}

</style>
</head>

<body>
<div id="main">

 <?php
  include("connect.php");
  //so sp tren 1 page:
  $sd=5*4; //5 cot, 4 hang
  //Tinh tong so san pham:
  
  $kq=mysql_query("select * from webtm_sanpham");
  $tsp=mysql_num_rows($kq);
  
  //Tinh tong so trang:
  $tst=ceil($tsp/$sd);
  
  //Tinh trang hien tai:
  if(isset($_GET['page'])) $page=$_GET['page']; else $page=1;
  
  //Tinh vi tri:
  $vitri=($page-1)*$sd;  
  
  
  //Lay du lieu:
  $sl="select * from webtm_sanpham limit $vitri,$sd";
  $kqsp=mysql_query($sl);
  
  //Rot du lieu ra bang: 	  
  while($dsp=mysql_fetch_array($kqsp)){
  ?>
	<div class="sanpham">
    	<div class="hinhsp"><img src="<?php echo $dsp['UrlHinh'];?>" width="150" height="200" /></div>
        <div class="tensp"><?php echo $dsp['TenSP'];?></div>
        <div class="giasp">Gia: <?php echo $dsp['Gia'];?></div>
    </div>
  <?php }?>  
    
   
    <div style="clear:left;">Trang <?php 
for($i=1;$i<=$tst;$i++){
	if($i==$page)
	echo "<span style='font-size:26px; color:red; font-weight:bold'>$i</span> &nbsp;";
	else{
	?><a href="pt_phancot.php?page=<?php echo $i;?>"><?php echo $i;?></a> &nbsp;<?php 
	} //ket thuc else
} // ket thuc for
	
	?></div>
</div>
</body>
</html>