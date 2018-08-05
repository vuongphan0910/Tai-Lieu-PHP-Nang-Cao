<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script src="jquery-1.4.2.js"></script>
 <script type="text/javascript">
  $(document).ready(function(){
	get_loai();					
	$("#chungloaisp").change(function(){
   		get_loai();
   });					
								  
   
})
	   
	   
function get_loai()
{
	 $.ajax({
     type:"GET",
     url:"process.php", 
     data:"q="+$("#chungloaisp").val(),
     success:function(html){
      $("#loai_sp").html(html);
     }
    });
}
 </script>
</head>

<body>
<?php
require_once("dbcon.php");
?>
<form id="form1" name="form1" method="post">
  <p>
    <select name="chungloaisp" id="chungloaisp">
    <?php
	$s1="select * from webtm_chungloaisp";
	$kq1=mysql_query($s1,$link);
	while($d1=mysql_fetch_array($kq1))
	{ 
	?>
    <option value="<?php echo $d1["idCL"]; ?>" ><?php echo $d1["TenCL"]; ?></option>
    <?php
	}
	?>
    </select>
</p>

<div id="loai_sp"></div>
<div id="sp"></div>
</form>
</body>
</html>