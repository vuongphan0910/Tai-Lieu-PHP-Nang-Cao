<style type="text/css">

#tinmoi {width: 660px;}

#tinmoi  .tinmoinhat {
	width:330px;
	float:left;
	color:#336699;
	height: 175px;
}

#tinmoi  .tinmoitieptheo {
	float:left;
	width:329px;
	height: 175px;
	overflow: hidden;
	white-space: nowrap;
	border-left: dotted 1px #030;
}
#tinmoi  .theloai {
	font-size:18px; background-color:#003300; color:#FFF;
	padding-top:5px; padding-bottom:5px; clear:left
}
#tinmoi  .theloai a {
	color:#9C0; text-decoration:none; margin-left:5px; font-size:16px;}
#tinmoi .theloai a:hover{ color:#6CC; text-decoration:underline; }

#tinmoi  .tinmoinhat a {
	text-decoration:none; color:#003366; 
	font-size:16px; font-weight:bold
}
#tinmoi .tinmoinhat a:hover{ text-decoration:underline; color:#C09}
#tinmoi  #tinmoinhat img {	margin-right: 5px; }

#tinmoi  .tinmoitieptheo a {
	text-decoration:none;
	color:#003333
}
#tinmoi .tinmoitieptheo a:hover{text-decoration:underline; color:#C09}
#tinmoi  .tinmoitieptheo p {
	margin-top:10px; margin-bottom:10px; padding-left:5px;
}

</style>

<div id="tinmoi">
<?php
//include("connect.php");
//$sltl="select * from theloai where AnHien=1 and lang='vi' order by ThuTu";
//$kqtl=mysql_query($sltl);
$kqtl=$tin->TheLoai($lang);
while($dtl=mysql_fetch_array($kqtl)){
?>
  <div class="theloai"> <?php echo $dtl['TenTL'];
  //$sllt="select * from loaitin where idTL={$dtl['idTL']} and AnHien=1 order by ThuTu";
  //$kqlt=mysql_query($sllt);
  $kqlt=$tin->LoaiTinTrongTheLoai($dtl['idTL']);
  while($dlt=mysql_fetch_array($kqlt)){?> <a href="loaitin.php?idLT=<?php echo $dlt['idLT'];?>"> <?php echo $dlt['Ten'];?>  </a> <?php }?>
       </div>
       <?php
	   $sltin="select * from tin where AnHien=1 and idLT in (select idLT from loaitin where idTL={$dtl['idTL']} and AnHien=1) order by idTin DESC limit 0,6";
	   $kqtin=mysql_query($sltin);
	   //Lay tin moi nhat:
	   $dtin=mysql_fetch_array($kqtin);
	   ?>
  <!-- div theloai -->
  <div class="tinmoinhat">
    <a href="index.php?key=ctt&idTin=<?php echo $dtin['idTin'];?>"> <?php echo $dtin['TieuDe'];?> </a>
    <p> <img src="<?php echo $dtin['urlHinh'];?>" width="80" height="80" align="left" />
      <?php echo $dtin['TomTat'];?>      
    </p>
  </div> <!-- tinmoinhat -->
  <div class="tinmoitieptheo">
  	<?php
	while($dtin=mysql_fetch_array($kqtin)){ 
	?>
    <p> <a href="#"> <?php echo $dtin['TieuDe'];?>  </a> </p>
    <?php }?>
  </div>  <!-- div id=tinmoitieptheo -->

<?php }?>  


</div><!-- tinmoi -->
