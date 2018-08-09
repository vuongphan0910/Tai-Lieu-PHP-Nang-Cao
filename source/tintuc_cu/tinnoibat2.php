<?php require_once "classtin.php";
if (isset($t)==false) $t = new tin;
$tinnoibat = $t->TinNoiBat($lang,6);
$row_tinnoibat = mysql_fetch_assoc($tinnoibat);
?>
<div id="featured_slide">
        <ul id="featurednews">
        <?php while ($row_tinnoibat=mysql_fetch_assoc($tinnoibat)) {?>
          <li><img src="<?=$row_tinnoibat['urlHinh'];?>" width="600" height="280" />	
            <div class="panel-overlay">
              <h2><?=$row_tinnoibat['TieuDe'];?></h2>
              <p><?php echo $str=substr($row_tinnoibat['TomTat'],0,229);?>... 
                <a href="home2.php?view=news&idTin=<?php echo $row_tinnoibat['idTin'];?>">Đọc tiếp&raquo;</a></p>
            </div>
          </li>
          <?php } ?>
        </ul>
      </div>