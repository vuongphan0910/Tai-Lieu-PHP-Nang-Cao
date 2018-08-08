<? require_once"classTin.php";
	if(isset($t)==false) $t=new tin;
	$sql="SELECT 	sum( if( username <>'' , 1 , 0 ) ) As SoThanhVien, 
					sum( if( username ='' , 1 , 0 ) ) As SoKhach , 
					count(*) As TongSoNguoi 
		  FROM sessions ";
	$t->getdata($sql);
	$row=$t->fetchRow();
	
?>
<script type="text/javascript">
$('#tongket').corner();
</script>
<div id=tongket>
<p class="caption">Thống Kê</p>
<div> 
Hiện có <?=$row['TongSoNguoi']; ?>người đang vào website. <br />
Trong Đó có <?=$row['SoThanhVien'];?> thành Viên và <?=$row['SoKhach'];?> khách
</div>
<a href="#" id="linkthongke"> Chi Tiết</a>
</div>