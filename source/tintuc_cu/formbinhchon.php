<?php 
	$lang='vi';
	$lang_arr=array("vi","en");
	if(isset($_COOKIE['lang']))
	$lang=$_COOKIE['lang'];
	if (in_array($lang, $lang_arr)==false) $lang='vi';
	require "lang_$lang.php";
	ob_start();
?>
<script>
	$(document).ready(function(e) {
        $("#btnbinhchon").click(function(){		
		var idBC=$("#idBC").val();
		var idPA=-1; 
		$("[name='idPA']").each(function(){if (this.checked==true)idPA=this.value });//duyet tung phan tu ten la'idPA' neu checked thi lay gia tri cua phan tu do vao idPA 
		if (idPA==-1) { alert("Bạn chưa chọn phương án nào"); return}
		var data = "idBC=" + idBC + "&idPA=" + idPA; //alert(data);
		$("#divbinhchon").load("ketqubinhchon.tco",data).hide().slideDown();//lay du lieu tu kqbc nap vao div binhchon
});

    });
</script>
<?php 
	
	require_once "classtin.php";
	$t= new tin;
	$bc = $t->LayBinhChonNgauNhien();
	$row_bc = mysql_fetch_assoc($bc);
	$idBC=$row_bc['idBC'];
	$phuongan= $t->CacPhuongAnTrongCauHoi($idBC);

?>
<div id="divbinhchon">
	<p class="capption">{Poll_Caption}</p>
    <p><?php echo $row_bc['MoTa'];?></p>
    <?php while ($row=mysql_fetch_assoc($phuongan)) {?>
		<p><input type="radio" name="idPA" value="<?=$row['idPA'] ?>"/><?=$row['MoTa']; ?></p>
        
	<?php }?>
<input type="hidden" name="idBC" id="idBC" value="<?=$idBC;?>" />
<p align="center"> <input type="button" value="Bình chọn" id="btnbinhchon"> </p>


</div>

<?php
$str=ob_get_clean();
	$str = str_replace("{Poll_Caption}" ,Poll_Caption, $str);
	echo $str;
?>