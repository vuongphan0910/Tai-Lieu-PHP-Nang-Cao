<?php require_once "classtin.php"; if (isset($t)==false) $t = new tin;
$lang='vi'; $theloai = $t ->TheLoai($lang);
?>

  <div id="topbar">
    <div id="topnav">
      <ul>
        <li class="active"><a href="home.php">Trang chủ</a></li>
        <?php while ($row_theloai = mysql_fetch_assoc($theloai) ) {?>
        <li><a class=parent href=#><span> <?=$row_theloai['TenTL'];?> </span></a>
        <?php $loaitin = $t->LoaiTinTrongTheLoai($row_theloai['idTL']); ?>
            <ul><?php while ($row_loaitin = mysql_fetch_assoc($loaitin)) {?>
                   <li><a href="#"><span> <?=$row_loaitin['Ten'];?> </span></a></li>
                <?php }?>
            </ul>
        </li>
    <?php } ?>      
      </ul>
    </div>
    <br class="clear" />
  </div>
