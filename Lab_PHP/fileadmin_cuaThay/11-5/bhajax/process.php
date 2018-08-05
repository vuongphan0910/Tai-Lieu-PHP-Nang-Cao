<script src="jquery-1.4.2.js"></script>
 <script type="text/javascript">
  $(document).ready(function(){
						
		phantrang($("#loaisp").val(),1);				  
   $("#loaisp").change(function(){

	
		phantrang($("#loaisp").val(),1);
	
   });
   
  
  });
   function phantrang(a,b){
	   $.ajax({
     type:"GET",
     url:"process1.php", 
     data:"q="+a+"&p="+b,
     success:function(html){
      $("#sp").html(html);
     }
    });
	   }
 </script>
<?php
require_once("dbcon.php");
$idCL=$_GET["q"];
$s="select * from webtm_loaisp where idCL=$idCL";
$kq=mysql_query($s,$link);
echo "<select id='loaisp'>";
while($d=mysql_fetch_array($kq))
{
	echo "<option value='".$d["idLoai"]."'>".$d["TenLoai"]."</option>";
}
echo "</select>";
?>
