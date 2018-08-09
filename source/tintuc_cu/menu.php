<script type="text/javascript" src="apycom.com-8-deep-sky-blue/menu.js"></script>
<link rel="stylesheet" type="text/css" href="apycom.com-8-deep-sky-blue/menu.css"/>
<?php 
require_once"classtin.php";
if(isset($t)==false)
$t= new tin;
//$lang='vi';
$theloai=$t->TheLoai($lang)
?>

<div id="menu">
    <ul class="menu">
    <li><a href="/tintuc/" ><span>{Homepage}</span></a></li>
    <?php while($row_theloai=mysql_fetch_assoc($theloai)) {?>
          <li><a href="#" class="parent"><span><?=$row_theloai['TenTL'] ?></span></a>
               <div><?php $loaitin=$t->LoaiTinTrongTheLoai($row_theloai['idTL']); ?>
               		<ul><?php while ($row_loaitin=mysql_fetch_assoc($loaitin)){?>
                  <li><a href="cat/<?=$row_loaitin['Ten_KhongDau'];?>.html" class="parent"><span><?=$row_loaitin['Ten']; ?></span></a>
                    <?php }?> 
                 </li>
             </ul></div>
         </li>
          <!--<li class="last"><a href="#"><span>level 1</span></a></li>-->
          <?php }?>
     </ul>
   </div>
	