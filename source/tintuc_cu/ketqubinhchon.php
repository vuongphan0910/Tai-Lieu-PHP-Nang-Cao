
<?php 
	 
	$lang='vi';
	$lang_arr=array("vi","en");
	if(isset($_COOKIE['lang']))
	$lang=$_COOKIE['lang'];
	if (in_array($lang, $lang_arr)==false) $lang='vi';
	require "lang_$lang.php";
	ob_start();
	


	require_once "classtin.php";
	$t = new tin;
	$idBC=$_GET['idBC'];
	settype($idBC,"int");
	$idPA=$_GET['idPA'];
	settype($idPA,"int");
	$bc= $t->LayCauHoi($idBC);
	$t->CapNhatSoLanChonPA($idPA);
	$pa = $t->CacPhuongAnTrongCauHoi($idBC);
	$row_bc = mysql_fetch_assoc($bc);
	$MotaBC =$row_bc['MoTa'];
	$TongSoLan=$t->TongSoLanChon($idBC); //Đếm tổng số lần chọn các phương án// hiện câu hỏi,phương án,% từng phương án
?>

  <p class=caption>{Poll_Caption}</p>	
<?php echo "<p> $MotaBC </p>";
while ($row_pa = mysql_fetch_assoc($pa)) {
	$id = $row_pa['idPA']; 
	$SoLanChon = $row_pa['SoLanChon']; 
	$MoTa = $row_pa['MoTa'];
	$percent = round(($SoLanChon/$TongSoLan)*100,2);
	echo "<p> $MoTa : $SoLanChon ($percent %)</p>";
}
echo "<input id='btnkhac' onclick='napbckhac()' type=button value='Câu khác'>";
 

?>
<script>
 function napbckhac(){	
$.ajax({
		type:"GET", url:"formbinhchon.tco", cache:false,
		success: function (data){ $("#divbinhchon").html(data); }
	});	
}

</script>
<?php 
	$str=ob_get_clean();
	$str = str_replace("{Poll_Caption}" ,Poll_Caption, $str);
	echo $str;
?>